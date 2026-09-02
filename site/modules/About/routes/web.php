<?php

use Illuminate\Support\Facades\Route;
use Site\About\Http\Controllers\AboutController;

Route::get('/quem-somos', [AboutController::class, 'index'])
    ->name('Site.About.index');
