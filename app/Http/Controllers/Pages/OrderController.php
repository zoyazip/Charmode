<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function openMyOrdersPage(Request $request) {
        if (Auth::check()) {
            $orders = Order::all();
            $filteredOrders = collect();
            foreach ($orders as $order) {
                if($order->user_id == Auth::id()){
                    $filteredOrders->push($order);
                }

            }
            return view('web/pages/userOrdersList')->with("orders", $filteredOrders);
        } else {
            return redirect()->back();
        }

    }

    // client side function
    public function createOrder(Request $request) {

    }

}
