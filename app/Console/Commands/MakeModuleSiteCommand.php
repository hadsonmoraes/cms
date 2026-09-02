<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModuleSiteCommand extends Command
{
    protected $signature = 'make:module-site
                            {name : Nome do módulo}';

    protected $description = 'Cria um módulo para o site';

    public function handle(ModuleGenerator $generator): int
    {
        return $generator->create(
            $this->argument('name'),
            'site',
            'Site'
        );
    }
}
