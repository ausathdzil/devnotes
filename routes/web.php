<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('home', [PostController::class, 'index'])
    ->name('home');

Route::get('posts/create', [PostController::class, 'create'])
    ->middleware(['auth'])
    ->name('posts.create');

Route::get('posts/{post}', [PostController::class, 'show'])
    ->name('posts.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
