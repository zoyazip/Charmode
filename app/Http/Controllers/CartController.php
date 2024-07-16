<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $userId = 1;

        $cartWithProducts = DB::table('cart_items')->join('products', 'cart_items.product_id', '=', 'products.id')->where('cart_items.user_id', $userId)->get();

        return view('web.pages.cart')->with('cartWithProducts', $cartWithProducts);
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
