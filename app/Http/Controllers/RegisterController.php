<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * restrict logged in users from accessing the register page
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * redirect users to register page from the views
     */
    public function show() {
        return view('/auth/register');
    }
    
    /**
     * validate the user credentials before sending to the database
     */
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
        $user->save();

        
        // save user to db
        //redirect user to login
        session()->flash('success', "Account created successfully!!!");
         return redirect()->route('login');

   }

       
}
