<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function home() {

        return view('home', [
            'posts' => Post::with([ 'user' ])->withCount(['comments'])->latest()->get()
        ]);
    }
}

