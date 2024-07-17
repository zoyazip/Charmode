<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;


class CartController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $products = CartItem::where('user_id', Auth::id())->with(['product', 'user'])->get();

            $productPriceSum = 0;
            $deliveryPriceSum = 0;
            foreach ($products as $entry) {
                $productPriceSum += $entry->product->newPrice * $entry->quantity + $entry->product->shippingCost;
                $deliveryPriceSum += $entry->product->shippingCost;
            }

            return view('web.pages.cart', [
                "cartItems" => $products,
                "productPriceSum" => $productPriceSum,
                "productCountSum" => count($products),
                "deliveryPriceSum" => $deliveryPriceSum,
            ]);
        } else {
            // here comes the logic for non-authorized users
        }
    }

    public function storeAuth(Request $request)
    {
        // user is logged in
        $cartItem = CartItem::where(['user_id' => Auth::id(), 'product_id' => $request->product_id])->with('product')->first();
        if (!$cartItem) {
            // create new
            $newCartItem = new CartItem;
            $newCartItem->user_id = Auth::id();
            $newCartItem->product_id = $request->product_id;
            $newCartItem->color_id = $request->color_id;
            $newCartItem->quantity = $request->quantity;
            $newCartItem->save();
        } else {
            $cartItem->quantity++;
            $cartItem->save();
        }

        return redirect()->back();
    }

    public function storeGuest(Request $request)
    {
        // here comes the logic for non-auth users
        // cookies
        $addedItems = json_decode(Cookie::get('cartitems'), true);
        $found = false;
        foreach ($addedItems as $item) {
            if ($item->product_id === $request->product_id && $item->color_id === $request->color_id) {
                // item with same color already has added, so we change quantity
                $item->quantity = $request->quantity;
                $found = true;
                break;
            }
        }
        if (!$found) {
            // item is not added, so we add new item
            $newItem = [
                'user_id' => null,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'quantity' => $request->quantity,
            ];
            array_push($addedItems, $newItem);
        }
        Cookie::queue('cartitems', json_encode($addedItems), 60 * 24);
    }


    public function removeItem(Request $request, $product_id)
    {
        if (Auth::check()) { // user is logged in
            DB::table('cart_items')
                ->where([
                    'product_id' => $product_id,
                    'user_id' => Auth::id(),
                    'color_id' => $request->color_id,
                ])
                ->first()
                ->delete();
        } else {
            // cookies
            $addedItems = json_decode($request->cookie('cartitems'), true);
            $found = false;
            foreach ($addedItems as $index => $item) {
                if ($item->product_id === $product_id && $item->color_id === $request->color_id) {
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
            DB::table('cart_items')->where(['user_id' => Auth::id()])->delete();  // user is logged in
        } else {
            Cookie::forget('cartitems');  // cookies
        }
        return redirect()->back();
    }

}
