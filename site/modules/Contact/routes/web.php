<?php

use Illuminate\Support\Facades\Route;
use Site\Contact\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])
    ->name('Site.Contact.index');
