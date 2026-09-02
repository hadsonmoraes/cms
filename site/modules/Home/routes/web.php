<?php

use Illuminate\Support\Facades\Route;
use Site\Home\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])
    ->name('Site.Home.index');
