<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Composer\Autoload\ClassLoader;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class ModulesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerModulesAutoload();
    }

    public function boot(): void
    {

        Blade::anonymousComponentPath(
            base_path('sistema/resources/views/components'),
            'sistema'
        );

        View::addNamespace(
            'sistema',
            base_path('sistema/resources/views')
        );

        View::addNamespace(
            'site',
            base_path('site/resources/views')
        );

        $this->loadModules('site');
        $this->loadModules('sistema');
    }

    private function registerModulesAutoload(): void
    {
        $autoloaders = spl_autoload_functions();

        foreach ($autoloaders as $autoload) {
            if (
                is_array($autoload) &&
                isset($autoload[0]) &&
                $autoload[0] instanceof ClassLoader
            ) {
                $loader = $autoload[0];

                $loader->addPsr4(
                    'Sistema\\',
                    base_path('sistema/app')
                );

                $this->registerContextModules(
                    $loader,
                    'site',
                    'Site'
                );

                $this->registerContextModules(
                    $loader,
                    'sistema',
                    'Sistema'
                );

                break;
            }
        }
    }

    private function registerContextModules(
        ClassLoader $loader,
        string $context,
        string $namespace
    ): void {
        $modulesPath = base_path("{$context}/modules");

        if (!File::isDirectory($modulesPath)) {
            return;
        }

        foreach (File::directories($modulesPath) as $modulePath) {
            $moduleName = basename($modulePath);

            $appPath = $modulePath . '/app';

            if (!File::isDirectory($appPath)) {
                continue;
            }

            $loader->addPsr4(
                "{$namespace}\\{$moduleName}\\",
                $appPath
            );
        }
    }

    private function loadModules(string $context): void
    {
        $modulesPath = base_path("{$context}/modules");

        if (!File::isDirectory($modulesPath)) {
            return;
        }

        foreach (File::directories($modulesPath) as $modulePath) {
            $moduleName = basename($modulePath);

            $provider = $this->getProviderClass(
                $context,
                $moduleName
            );

            if ($provider && class_exists($provider)) {
                $this->app->register($provider);
            }
        }
    }

    private function getProviderClass(
        string $context,
        string $moduleName
    ): ?string {
        $namespace = ucfirst($context);

        return "{$namespace}\\{$moduleName}\\Providers\\{$moduleName}ServiceProvider";
    }
}
