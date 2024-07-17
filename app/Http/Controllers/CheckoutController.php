<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    
    public function openCheckoutPage() {
        return view('web.pages.checkout');
    }

    public function checkInput(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            // continue with input validation
        ]);

        // get cartItems
        // greate guest user
        // create order
        // create orderItems
        // delete cartItems

        // return to page X
    }
}
