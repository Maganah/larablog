<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function displayUsers(Request $request){
        
        $user = User::all();

        return view('users', ['users' => $user]);
    }//
}
