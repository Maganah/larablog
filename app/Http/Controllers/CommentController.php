<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function comments(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string|email|max:500'
        ]);

        Comment::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' =>$request->user()->id
        ]);

        session()->flash('success', "Comment created successfully!!!");

        return back();
    }
}
