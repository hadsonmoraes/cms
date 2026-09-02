<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeModuleSistemaCommand extends Command
{
    protected $signature = 'make:module-sistema
                            {name : Nome do módulo}';

    protected $description = 'Cria um módulo para o sistema';

    public function handle(ModuleGenerator $generator): int
    {
        return $generator->create(
            $this->argument('name'),
            'sistema',
            'Sistema'
        );
    }
}
