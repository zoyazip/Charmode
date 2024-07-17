<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $userId = 1;
        $productPriceSum = 0;
        $deliveryPriceSum = 0;
        $productCountSum = 0;
        $cartWithProducts = DB::table('cart_items')->join('products', 'cart_items.product_id', '=', 'products.id')->where('cart_items.user_id', $userId)->get();

        foreach ($cartWithProducts as $product) {
            $productPriceSum += ($product->newPrice*$product->quantity);
            $deliveryPriceSum += $product->shippingCost;
            $productCountSum += $product->quantity;
        }

        return view('web.pages.cart')->with('cartWithProducts', $cartWithProducts)->
                with('productPriceSum', $productPriceSum)->with('deliveryPriceSum', $deliveryPriceSum)->
                with('productCountSum', $productCountSum);
    }

    public function updateList(Request $request){

        $allrequest = $request->input();

        unset($allrequest['_token']);
        unset($allrequest['_method']);

        $userId = Auth::id();
        $userId = 1;


        foreach ($allrequest as $key => $value) {
        DB::table('cart_items')->where('user_id', $userId)->
        where('product_id', $key)->update(['quantity' => $value]);
        }

        $userId = 1;
        return Redirect::refresh();

    }

    public function removeItem($id)
    {

    }

    public function removeAllItems($id){

    }

    public function setUpForCheckout($id){

    }


}
