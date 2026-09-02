<?php

use Illuminate\Support\Facades\Route;
use Sistema\Usuarios\Http\Controllers\UsuariosController;

Route::middleware(['web', 'auth', 'module.access:Usuarios'])->group(function () {
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('Sistema.Usuarios.index');
    Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('Sistema.Usuarios.create');
    Route::post('/usuarios', [UsuariosController::class, 'store'])->name('Sistema.Usuarios.store');
    Route::get('/usuarios/{user}/edit', [UsuariosController::class, 'edit'])->name('Sistema.Usuarios.edit');
    Route::put('/usuarios/{user}', [UsuariosController::class, 'update'])->name('Sistema.Usuarios.update');
});
