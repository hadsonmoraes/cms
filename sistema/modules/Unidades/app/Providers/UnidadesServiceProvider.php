<?php

namespace Sistema\Unidades\Providers;

use Illuminate\Support\ServiceProvider;

class UnidadesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'Sistema-Unidades');
    }
}