<?php

use Illuminate\Support\Facades\Route;
use Sistema\About\Http\Controllers\AboutController;

Route::middleware(['web', 'auth', 'module.access:About'])->group(function () {
    Route::get('/about', [AboutController::class, 'index'])->name('Sistema.About.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('Sistema.About.create');
    Route::post('/about', [AboutController::class, 'store'])->name('Sistema.About.store');
    Route::get('/about/{about}/edit', [AboutController::class, 'edit'])->name('Sistema.About.edit');
    Route::put('/about/{about}', [AboutController::class, 'update'])->name('Sistema.About.update');
});
