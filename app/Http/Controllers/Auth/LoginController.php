<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function store(Request $request)
    {
        // $request->validate([
        //     'email' => ['string', 'required', 'email'],
        //     'password' => ['required', 'string', 'confirmed', 'min:8'],
        // ]);

        dd($request);
    }
}
