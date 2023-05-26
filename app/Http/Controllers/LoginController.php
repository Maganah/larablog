<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * restrict logged in users from accessing the login page
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function show()
    {
        return view('/auth.login'); //
    }

    public function loginUser(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $user = User::where('email', '=', $request->email);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->input('remember', default: false))) {
            // Authentication was successful
            return redirect('/home')->with('success', 'Welcome ' . Auth::user()->name . '! You have successfully logged in.');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }


    public function logout()
    {

        Session:flush();

        Auth::logout();

        return view('/auth/login');
    }
}
