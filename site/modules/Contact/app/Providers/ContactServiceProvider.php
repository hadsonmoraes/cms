<?php

namespace Site\Contact\Providers;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'Site-Contact'
        );
    }
}
