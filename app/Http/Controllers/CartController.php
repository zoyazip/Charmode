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

    public function store(Request $request, $product_id, $quantity) {
        if (Auth::check()) {
            // user is logged in
            $cartItem = DB::table('cart_items')
            ->where([
                'product_id' => $product_id,
                'user_id' => Auth::id(),
                'color_id' => $request->color_id,])
            ->first();
            if(!$cartItem) {
                // create new
                $newCartItem = new CartItem;
                $newCartItem->user_id = Auth::id();
                $newCartItem->product_id = $product_id;
                $newCartItem->color_id = $request->color_id;
                $newCartItem->quantity = $quantity;
                $newCartItem->save();
            } else {
                DB::table('cart_items')
                    ->where([
                        'product_id' => $product_id,
                        'user_id' => Auth::id(),
                        'color_id' => $request->color_id,])
                    ->update(['quantity' => $quantity]);
            }

        } else {
            // cookies
            // $addedItems = json_decode($request->cookie('cartitems'), true);
            $addedItems = json_decode(Cookie::get('cartitems'), true);
            $found = false;
            foreach($addedItems as $item) {
                if($item->product_id === $product_id && $item->color_id === $request->color_id) {
                    // item with same color already has added, so we change quantity
                    $item->quantity = $quantity;
                    $found = true;
                    break;
                }
            }
            if(!$found) {
                // item is not added, so we add new item
                $newItem = [
                    'user_id' => null,
                    'product_id' => $product_id,
                    'color_id' => $request->color_id,
                    'quantity' => $quantity,
                ];
                array_push($addedItems, $newItem);
            }
            Cookie::queue('cartitems', json_encode($addedItems), 60 * 24);
        }
        return redirect()->back();
    }

    public function updateList()
    {
    }

    public function removeItem(Request $request, $product_id)
    {
        if (Auth::check()) {
            // user is logged in
            $cartItem = DB::table('cart_items')
            ->where([
                'product_id' => $product_id,
                'user_id' => Auth::id(),
                'color_id' => $request->color_id,])
            ->first()->delete();

        } else {
            // cookies
            $addedItems = json_decode($request->cookie('cartitems'), true);
            $found = false;
            foreach($addedItems as $index => $item) {
                if($item->product_id === $product_id && $item->color_id === $request->color_id) {
                    // item with same color already has added, so we change quantity
                    array_splice($addedItems, $index, 1);
                    break;
                }
            }
            Cookie::queue('cartitems', json_encode($addedItems));
        }
        return redirect()->back();
    }

    public function removeAllItems(Request $request)
    {
        if (Auth::check()) {
            // user is logged in
            DB::table('cart_items')->where(['user_id' => Auth::id(),])->delete();
        } else {
            // cookies
            Cookie::forget('cartitems');
        }
        return redirect()->back();
    }

    public function setUpForCheckout($id)
    {
    }
}
