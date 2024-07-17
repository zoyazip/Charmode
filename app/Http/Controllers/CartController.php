<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
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

    public function updateList(){




    }

    public function removeItem($id)
    {

    }

    public function removeAllItems($id){

    }

    public function setUpForCheckout($id){

    }


}
