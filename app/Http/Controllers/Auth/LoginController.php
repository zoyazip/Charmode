<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['string', 'required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember_me'); // Checks if "Remember Me" checkbox is checked

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            return redirect()->back();
        }

        return back()->withInput()->withErrors([
            'email' => 'Unable to sign in with given credentials'
        ]);
    }
}
