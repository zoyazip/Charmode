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
            'name' => 'nullable|max:255',
            'surname' => 'nullable|max:255',
            'email_address' => 'required|unique:users,email|max:255|email:rfc',
            'first_password' => 'required|max:255|min:8',
            're-password' => 'required|max:255|min:8|same:first_password',
            'phone_number' => 'required|string|digits_between:8,11|unique:users,phone',
            'city' => 'nullable|max:255',
            'address' => 'nullable|max:255',
        ]);

        // new user creating logic
        $user = new User;
        $user->full_name = "{$request->name} {$request->surname}";
        $user->email = $request->email_address;
        $user->password = Hash::make($request->first_password);
        $user->phone = $request->phone_number;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->save();

        if (Auth::attempt( ['email' => $user->email, 'password' => $request->first_password] )) {
            $request->session()->regenerate();
            return redirect('/checkout'); // '/checkout' must be replaced
        }

        return back()->withErrors([
            'registration_failed' => 'Something went wrong during registration',
        ]);    
    }
}
