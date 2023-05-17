<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    /**
     * restrict logged in users from accessing the login page
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
       
        // Redirect to the desired page after logout
        return redirect('/home');
    }



    public function show(){
        return view('/auth.login');//
    }

    public function loginUser(Request $request){
    $validatedData = $request->validate([
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ]);
    $user = User::where('email', '=', $request->email);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->input('remember', default:false))) {
        // Authentication was successful
        return redirect('/home')->with('success', 'Welcome ' . Auth::user()->name . '! You have successfully logged in.');
    } else {
        // Authentication failed
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}

}