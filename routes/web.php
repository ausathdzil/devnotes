<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('home', [PostController::class, 'index'])
    ->name('home');

Route::view('library', 'library')
    ->middleware(['auth'])
    ->name('library');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



require __DIR__ . '/auth.php';
