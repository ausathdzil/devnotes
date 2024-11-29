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

    public function create(): View
    {
        return view('posts/create', [
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
