<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('Sistema-Dashboard::index');
})->middleware(['auth', 'verified', 'module.access:Dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('sistema::profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('sistema::profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('sistema::profile.destroy');
});

require __DIR__ . '/auth.php';
