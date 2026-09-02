<?php

use Illuminate\Support\Facades\Route;
use Sistema\Lgpd\Http\Controllers\LgpdController;

Route::get('/lgpd', [LgpdController::class, 'index'])->middleware(['web', 'auth', 'module.access:Lgpd'])->name('Sistema.Lgpd.index');
