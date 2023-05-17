<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function home() {
        $posts = Post::with('user')->latest()->get();

        return view('home', [
            'posts' => $posts
        ]);
    }
}

