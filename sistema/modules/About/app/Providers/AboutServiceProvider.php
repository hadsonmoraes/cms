<?php

namespace Sistema\About\Providers;

use Illuminate\Support\ServiceProvider;

class AboutServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'Sistema-About'
        );
    }
}
