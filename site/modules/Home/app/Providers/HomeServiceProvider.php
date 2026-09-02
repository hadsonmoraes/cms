<?php

namespace Site\Home\Providers;

use Illuminate\Support\ServiceProvider;

class HomeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'Site-Home'
        );
    }
}
