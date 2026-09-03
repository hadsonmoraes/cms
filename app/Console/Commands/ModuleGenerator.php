<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ModuleGenerator
{
    public function create(
        string $moduleName,
        string $context,
        string $namespace
    ): int {
        $name = Str::studly($moduleName);

        $basePath = base_path(
            "{$context}/modules/{$name}"
        );
        $modelPath = app_path("Models/{$name}Content.php");

        if (File::exists($basePath)) {
            $this->error(
                "O módulo {$name} já existe em {$basePath}."
            );

            return 1;
        }

        if (File::exists($modelPath)) {
            $this->error(
                "O model {$name}Content já existe em {$modelPath}."
            );

            return 1;
        }

        $this->createDirectories($basePath);

        $this->createFiles($basePath, $name, $context, $namespace);

        $this->info(
            "Módulo {$name} criado com sucesso!"
        );

        $this->line(
            "Local: {$context}/modules/{$name}"
        );

        $this->line(
            "Model: app/Models/{$name}Content.php"
        );

        $this->line(
            "Namespace: {$namespace}\\{$name}"
        );

        return 0;
    }

    private function createDirectories(string $basePath): void
    {
        $directories = [
            'app/Providers',
            'app/Http/Controllers',
            'routes',
            'resources/views',
        ];

        foreach ($directories as $directory) {
            File::makeDirectory(
                "{$basePath}/{$directory}",
                0755,
                true
            );
        }
    }

    private function createFiles(
        string $basePath,
        string $name,
        string $context,
        string $namespace
    ): void {
        $replacements = [
            '{{ module }}' => $name,
            '{{ namespace }}' => $namespace,
            '{{ route }}' => Str::kebab($name),
            '{{ layout }}' => $context === 'site' ? 'site::layouts.app' : 'sistema::layouts.admin',
        ];

        $files = [
            'app/Providers/{{ module }}ServiceProvider.php' => 'app/Providers/ModuleServiceProvider.php.stub',
            'app/Http/Controllers/{{ module }}Controller.php' => 'app/Http/Controllers/ModuleController.php.stub',
            'routes/web.php' => 'routes/web.php.stub',
            'resources/views/index.blade.php' => 'resources/views/index.blade.php.stub',
        ];

        foreach ($files as $target => $stub) {
            $target = str_replace('{{ module }}', $name, $target);
            $content = File::get(base_path("stubs/module/{$stub}"));
            File::put("{$basePath}/{$target}", str_replace(array_keys($replacements), array_values($replacements), $content));
        }

        File::ensureDirectoryExists(app_path('Models'));

        $modelStub = File::get(base_path('stubs/module/app/models/ModuleModels.php.stub'));
        $modelContent = str_replace(
            ['{{ module }}', '{{ namespace }}'],
            [$name, 'App\\Models'],
            $modelStub
        );

        File::put(app_path("Models/{$name}Content.php"), $modelContent);
    }

    private function error(string $message): void
    {
        $this->output(
            $message,
            '31'
        );
    }

    private function info(string $message): void
    {
        $this->output(
            $message,
            '32'
        );
    }

    private function line(string $message): void
    {
        echo $message . PHP_EOL;
    }

    private function output(
        string $message,
        string $color
    ): void {
        echo "\033[{$color}m{$message}\033[0m" . PHP_EOL;
    }
}
