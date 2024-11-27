<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('home', [PostController::class, 'index'])
    ->name('home');

Route::get('posts', [PostController::class, 'posts'])
    ->middleware(['auth'])
    ->name('posts');

Route::get('posts/new', [PostController::class, 'new'])
    ->middleware(['auth'])
    ->name('posts.new');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
