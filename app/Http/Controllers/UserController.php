<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function openRegistrationPage() {
        return view('web.pages.registration');
    }

    public function register(Request $request): RedirectResponse {
        $request->validate([
            'full_name' => 'nullable|max:255',
            'email' => 'required|unique:users,email|max:255|email:rfc',
            'firstPassword' => 'required|max:255|min:5',
            're-password' => 'required|max:255|min:5|same:firstPassword',
            'phone' => 'nullable|numeric|digits:8',
            'city' => 'nullable|max:255',
            'address' => 'nullable|max:255',
        ]);

        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->firstPassword);
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();

        if (Auth::attempt([
            'email' => $user->email, 
            'password' => $request->firstPassword,
        ])) {
            $request->session()->regenerate();
            return redirect('/checkout'); // '/checkout' must be replaced
        }

        return back()->withErrors([
            'registrationFailed' => 'Registration failed',
        ]);    
    }
}
