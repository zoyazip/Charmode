<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function updateStatus(Request $request) {
        $request->validate([
            'status' => 'required|max:255',
        ]);
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);
        return redirect()->back();
    }
}
