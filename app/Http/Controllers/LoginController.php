<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function showLoginPage(){
        return view('/login');//
    }

    public function loginUser(Request $request){
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);
    $user = User::where('email', '=', $request->email);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication was successful
        return redirect()->intended('/users');
    } else {
        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}

}