<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('home', [
            //
        ]);
    }

    public function posts(): View
    {
        return view('posts/index', [
            //
        ]);
    }

    public function new(): View
    {
        return view('posts/new', [
            //
        ]);
    }

    public function show(): View
    {
        return view('posts/show', [
            //
        ]);
    }
}
