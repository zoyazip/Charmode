<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function openRegistrationPage() {
        return view('web.pages.registration');
    }

    public function register(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
        ]);
    }
}
