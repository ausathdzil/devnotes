<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('home', 'home')
    ->name('home');

Route::view('posts/create', 'posts.create')
    ->middleware(['auth'])
    ->name('posts.create');

Route::view('posts/{post}', 'posts.show')
    ->name('posts.show');

Route::view('posts/{post}/edit', 'posts.edit')
    ->middleware(['auth'])
    ->name('posts.edit');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('profile/settings', 'profile.settings')
    ->middleware(['auth'])
    ->name('profile.settings');

Route::view('profile/{profile}', 'profile.show')
    ->name('profile.show');

Route::view('about', 'about')
    ->name('about');

require __DIR__ . '/auth.php';
