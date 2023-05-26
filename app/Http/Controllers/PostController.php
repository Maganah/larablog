<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
            'body' => 'required|string|max:1000'
        ]);

        $user = Auth()->user();
        $path = $request->file('photo')->store('photo');
        $post = Post::create([
            'title' => $request->input('title'),
            'image' => $path,
            'body' => $request->input('body'),
            'user_id' =>$request->user()->id,
        ]);

        session()->flash('success', "Post created successfully!!!");
        return back();
    }
    public function  show(Request $request, $post)
    {
        $post = Post::with(['comments'])->Find($post);
        if(is_null($post)){
            return response('', status:404);
        }
        return view('posts/show', ['post'=>$post]);
    }
}
