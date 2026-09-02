<?php

use Illuminate\Support\Facades\Route;
use Sistema\Configuracoes\Http\Controllers\ConfiguracoesController;

Route::middleware(['web', 'auth', 'module.access:Configuracoes'])->group(function () {
    Route::get('/configuracoes', [ConfiguracoesController::class, 'index'])->name('Sistema.Configuracoes.index');
    Route::put('/configuracoes', [ConfiguracoesController::class, 'update'])->name('Sistema.Configuracoes.update');
});
