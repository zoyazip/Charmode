<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;

use function PHPUnit\Framework\isEmpty;

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
            // dd($orders);
            $filteredOrders = collect();
            foreach ($orders as $order) {
                if($order->user_id == Auth::id()){
                    $filteredOrders->push($order);
                }
                // dd($order->user_id);

            }
            // dump($orders);
            // dd($filteredOrders);
            return view('web/pages/orderlist')->with("orders", $filteredOrders);
        } else {
            return redirect()->back();
        }

    }

    // client side function
    public function createOrder(Request $request) {

    }

}
