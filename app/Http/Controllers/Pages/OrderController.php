<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('user_id', Auth::id())
            ->with(['orderItems', 'user', 'orderItems.product', 'orderItems.product.images', 'orderItems.color'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        // dd($orders);
        return view('web.pages.orders')->with("orders", $orders);
    }

    // admin side function
    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|max:255',
        ]);
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);
        return redirect()->back();
    }
}
