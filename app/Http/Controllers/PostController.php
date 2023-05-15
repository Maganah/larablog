<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function posts(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000'
        ]);

        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' =>$request->user()->id
        ]);

        session()->flash('success', "Post created successfully!!!");
        return back();
    }
}
