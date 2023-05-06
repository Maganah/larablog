<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterPage() {
        return view('/register');
    }
    
        
   public function store(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required'
    ]);
    
    // Create user and save to database
        $user = new user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = hash::make($request->password);
        $res = $user->save();

        if($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
        // save user to db
        //redirect user to login
    
         return redirect('/login');

   }

       
}
