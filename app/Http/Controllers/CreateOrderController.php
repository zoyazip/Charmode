<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CreateOrderController extends Controller
{
    //
    public function addItem(Request $request, $product_id, $color_id, $quantity) {
        if (Auth::check) {
            // user is logged in
            $cartItem = DB::table('cart_items')
            ->where([
                'product_id' => $product_id,
                'user_id' => Auth::id(),
                'color_id' => $color_id,])
            ->first();
            if(!$cartItem) {
                // create new
                $newCartItem = new CartItem;
                $newCartItem->user_id = Auth::id();
                $newCartItem->product_id = $product_id;
                $newCartItem->color_id = $color_id;
                $newCartItem->quantity = $quantity;
                $newCartItem->save();
            } else {
                // update count
                $cartItem->update([
                    'quantity' => $quantity,
                ]);
            }

        } else {
            // cookies
            $addedItems = json_decode($request->cookie('cartitems'), true);
            $found = false;
            foreach($addedItems as $item) {
                if($item->product_id === $product_id && $item->color_id === $color_id) {
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
                    'color_id' => $color_id,
                    'quantity' => $quantity,
                ];
                array_push($addedItems, $newItem);
            }
            Cookie::queue('cartitems', json_encode($addedItems));
        }
    }
}
