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
            $productPriceSum += ($product->newPrice * $product->quantity);
            $deliveryPriceSum += $product->shippingCost;
            $productCountSum += $product->quantity;
        }

        return view('web.pages.cart')->with('cartWithProducts', $cartWithProducts)->with('productPriceSum', $productPriceSum)->with('deliveryPriceSum', $deliveryPriceSum)->with('productCountSum', $productCountSum);
    }

    public function updateList(Request $request){

        $allrequest = $request->input();
        // TODO pievienot validāciju
        unset($allrequest['_token']);
        unset($allrequest['_method']);

        $userId = Auth::id();
        $userId = 1;


        foreach ($allrequest as $key => $value) {
        DB::table('cart_items')->where('user_id', $userId)->
        where('product_id', $key)->update(['quantity' => $value]);
        }

        return Redirect::refresh();

    }

    public function store(Request $request, $product_id, $color_id, $quantity) {
        if (Auth::check()) {
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
        return redirect()->back();
    }

    public function addOrRemoveItem(Request $request)
    {

        $itemId = $request->input('productID');
        $userId = Auth::id();
        $userId = 1;
        DB::table('cart_items')->where('user_id', $userId)->
        where('product_id', $itemId)->delete();


        return Redirect::refresh();


    }

    public function removeAllItems(){

        $userId = Auth::id();
        $userId = 1;
        DB::table('cart_items')->where('user_id', $userId)->delete();

        return Redirect::refresh();


    }




}
