<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('home', 'home')
    ->name('home');

Route::view('posts/{id}', 'posts.show')
    ->name('posts.show');

Route::view('posts/{id}/edit', 'posts.edit')
    ->middleware(['auth'])
    ->name('posts.edit');

Route::view('create', 'posts.create')
    ->middleware(['auth'])
    ->name('posts.create');

Route::view('help', 'help')
    ->name('help');

Route::view('about', 'about')
    ->name('about');

Route::view('profile/{id}', 'profile.show')
    ->name('profile.show');

Route::view('settings', 'profile.settings')
    ->middleware(['auth'])
    ->name('profile.settings');

require __DIR__ . '/auth.php';
