<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // admin side function
    public function updateStatus(Request $request) {
        $request->validate([
            'status' => 'required|max:255',
        ]);
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);
        return redirect()->back();
    }

    // client side function
    public function createOrder(Request $request) {
        
    }

}
