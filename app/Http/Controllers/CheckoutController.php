<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function openCheckoutPage() {
        return view('web.pages.checkout');
    }

    public function checkInput(Request $request): RedirectResponse {

        // dd($request);
        $checkoutemail = "";
        $city = "";
        $address = "";
        // if(!Auth::check()) {
            $request->validate([
                'checkoutemail' => 'required|max:255|email:rfc',
                'city' => 'required|max:255',
                'address' => 'required|max:255',
            ]);

            $checkoutemail = $request->checkoutemail;
            $city = $request->city;
            $address = $request->address;
        // } else {
            // $user = DB::table('users')->where('id','=',Auth::id())->first();
            // $checkoutemail = $user->email;
            // $city = $user->city;
            // $address = $user->address;
            // if ($city == "") {
            //     $city = "City";
            // }
            // if ($address == "") {
            //     $address = "Address";
            // }
        // }


        // dd($request);

        $products = Product::all();

        $user_id = NULL;
        $addedItems = NULL;

        $totalCost = 0;
        $deliveryCost = 0;
        if (Auth::check()) {
            $user_id = Auth::id();
            $addedItems = DB::table('cart_items')->where('user_id', '=', Auth::id())->get();
            if($addedItems !== NULL){
                foreach($addedItems as $item) {
                    $matchingProduct = $products->firstWhere('id', $item->product_id);
                    $totalCost = $totalCost + $matchingProduct->newPrice;
                    $deliveryCost = $deliveryCost + $matchingProduct->shippingCost;
                }
            }
        } else {
            // dd($request);
            $addedItems = json_decode(Cookie::get('cartitems'), true);
            if($addedItems !== NULL){
                foreach($addedItems as $item) {
                    $product = DB::table('products')->where('product_id', '=', $item['product_id'])->get();
                    $totalCost = $totalCost + $product->newPrice;
                    $deliveryCost = $deliveryCost + $product->shippingCost;
                }
            }
        }

        $deliveryPlace = "";
        if ($request->deliveryMethod === "dpd") {
            $deliveryPlace = $request->deliveryPlace_dpd;
        } elseif ($request->deliveryMethod === "omniva") {
            $deliveryPlace = $request->deliveryPlace_omniva;
        }
        $order = new Order;
        $order->user_id = $user_id;
        $order->totalCost = $totalCost;
        $order->deliveryCost = $deliveryCost;
        $order->email = $checkoutemail;
        $order->city = $city;
        $order->address = $address;
        $order->deliveryMethod = $request->deliveryMethod;
        $order->deliveryPlace = $deliveryPlace;
        $order->paymentMethod = $request->paymentMethod;
        $order->status = 'confirmed';
        $order->save();
        $order_id = $order->id;

        if (Auth::check()) {
            $user_id = Auth::id();
            $addedItems = DB::table('cart_items')->where('user_id', '=', Auth::id())->get();
            if($addedItems !== NULL){
                foreach($addedItems as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $order_id;
                    $orderItem->product_id = $item->product_id;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->save();
                }
            }
        } else {
            $addedItems = json_decode(Cookie::get('cartitems'), true);
            if($addedItems !== NULL){
                foreach($addedItems as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $order_id;
                    $orderItem->product_id = $item['product_id'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->save();
                }
            }
        }

        // dd($order);
        if (Auth::check()) {
            $user_id = Auth::id();
            DB::table('cart_items')->where('user_id', '=', Auth::id())->delete();
        } else {
            Cookie::forget('cartitems');
        }

        // dd($order);
        return redirect('/');
    }
}
