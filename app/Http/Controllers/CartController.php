<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\CartItem;

use Illuminate\Support\Facades\Auth;



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
            $productPriceSum += ($product->newPrice * $product->quantity);
            $deliveryPriceSum += $product->shippingCost;
            $productCountSum += $product->quantity;
        }

        return view('web.pages.cart')->with('cartWithProducts', $cartWithProducts)->with('productPriceSum', $productPriceSum)->with('deliveryPriceSum', $deliveryPriceSum)->with('productCountSum', $productCountSum);
    }

    public function store(Request $request, $product_id)
    {
        if (!$product_id) {
            return response()->json(['message' => 'product id was not provided'], 400);
        }

        if (Auth::check()) {
            $review = new CartItem();
            $review->user_id = Auth::id(); // Get the authenticated user's ID
            $review->product_id = $product_id;
            $review->color_id = $request->color_id;
            $review->quantity = 1;
            $review->save();
        }
        return redirect()->back();
    }

    public function updateList()
    {
    }

    public function removeItem($id)
    {
    }

    public function removeAllItems($id)
    {
    }

    public function setUpForCheckout($id)
    {
    }
}
