<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function index(Request $request)
    {
        dd(json_decode(Cookie::get('cartitems'), true));
        if (Auth::check()) {
            $products = CartItem::where('user_id', Auth::id())->with(['product', 'user'])->get();
            $productPriceSum = 0;
            $deliveryPriceSum = 0;
            $productTotalcount = 0;
            foreach ($products as $entry) {
                $productPriceSum += $entry->product->newPrice * $entry->quantity + $entry->product->shippingCost;
                $deliveryPriceSum += $entry->product->shippingCost;
                $productTotalcount += $entry->quantity;
            }
//            dd($products);
            return view('web.pages.cart', [
                "cartItems" => $products,
                "productPriceSum" => $productPriceSum,
                "productCountSum" => $productTotalcount,
                "deliveryPriceSum" => $deliveryPriceSum,
            ]);
        } else {
            dd(json_decode(Cookie::get('cartitems'), true));
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

        return redirect('/cart');
    }


    // function helper for storeGuest mehtod 
    private function findItemIndex($items, $productId, $colorId)
    {
        foreach ($items as $index => $item) {
            if ($item['product_id'] === $productId && $item['color_id'] === $colorId) {
                return $index;
            }
        }
        return -1;
    }

    public function storeGuest(Request $request)
    {
        // Get existing cart items from cookies
        $addedItems = json_decode(Cookie::get('cartitems'), true) ?? [];
        $index = $this->findItemIndex($addedItems, $request->product_id, $request->color_id);

        if ($index !== -1) {
            // Item found, update quantity
            $addedItems[$index]['quantity']++;
        } else {
            // Item not found, add new item
            $addedItems[] = [
                'user_id' => null,
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'quantity' => $request->quantity,
            ];
        }
        Cookie::queue('cartitems', json_encode($addedItems), 60 * 24);
        return redirect('/cart');
    }


    public function removeItem(Request $request)
    {
        $allRequest = $request->all();
        $product_id = $allRequest['product_id'];
        $color_id = $allRequest['color_id'];
        if (Auth::check()) { // user is logged in
//            dd($allRequest['product_id']);
            DB::table('cart_items')
                ->where([
                    'product_id' => $product_id,
                    'user_id' => Auth::id(),
                    'color_id' => $color_id,
                ])
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


    public function updateList(Request $request){

        $allrequest = $request->input();
        // TODO pievienot validāciju
        unset($allrequest['_token']);
        unset($allrequest['_method']);

        $userId = Auth::id();
//        $userId = 1;


        foreach ($allrequest as $key => $value) {
//            dd($key);
//            dd(DB::table('cart_items')->where(['user_id' => $userId , 'product_id'=> $key])->
//            get());
            DB::table('cart_items')->where('user_id', $userId)->
            where('product_id', $key)->update(['quantity' => $value]);
        }

        return Redirect::refresh();

    }
}
