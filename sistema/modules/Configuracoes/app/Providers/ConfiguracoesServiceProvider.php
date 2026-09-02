<?php

namespace Sistema\Configuracoes\Providers;

use Illuminate\Support\ServiceProvider;

class ConfiguracoesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'Sistema-Configuracoes');
    }
}