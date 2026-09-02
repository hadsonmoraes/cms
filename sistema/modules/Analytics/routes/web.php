<?php

use Illuminate\Support\Facades\Route;
use Sistema\Analytics\Http\Controllers\AnalyticsController;

Route::get('/analytics', [AnalyticsController::class, 'index'])->middleware(['web', 'auth', 'module.access:Analytics'])->name('Sistema.Analytics.index');
