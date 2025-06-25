<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
         // Check if the user is logged out
         if(auth()->user()) {
            return redirect()->route('programacao');
        }
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        $authenticated = Auth::attempt($credentials);

        if (!$authenticated) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email or password invalid']);
        }

        return redirect()->route('programacao')->with([
            'success'=>'Logged in',
            ''=> 'show'
        ]);
    }
    
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
