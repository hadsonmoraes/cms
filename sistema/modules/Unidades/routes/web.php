<?php

use Illuminate\Support\Facades\Route;
use Sistema\Unidades\Http\Controllers\UnidadesController;

Route::middleware(['web', 'auth', 'module.access:Unidades'])->group(function () {
    Route::get('/unidades', [UnidadesController::class, 'index'])->name('Sistema.Unidades.index');
    Route::post('/unidades', [UnidadesController::class, 'store'])->name('Sistema.Unidades.store');
});
