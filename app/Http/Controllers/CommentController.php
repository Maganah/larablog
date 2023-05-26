<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
     public function store(Request $request, $post)
    {
        $validatedData = $request->validate([
            'body' => 'required|string'
        ]);

        $user = Auth()->user();
        Comment::create([
            'body' => $request->input('body'),
            'user_id' =>$request->user()->id,
            'post-id' =>$post
        ]);

        session()->flash('success', "Comment created successfully!!!");
        return back();
    }
}
