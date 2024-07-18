<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $products = CartItem::where('user_id', Auth::id())->with(['product', 'user', 'color'])->get();
            $productPriceSum = 0;
            $deliveryPriceSum = 0;
            $productTotalcount = 0;

            foreach ($products as $entry) {
                $productPriceSum += $entry->product->newPrice * $entry->quantity + $entry->product->shippingCost;
                $deliveryPriceSum += $entry->product->shippingCost;
                $productTotalcount += $entry->quantity;
            }
            return view('web.pages.cart', [
                "cartItems" => $products,
                "productPriceSum" => $productPriceSum,
                "productCountSum" => $productTotalcount,
                "deliveryPriceSum" => $deliveryPriceSum,
            ]);
        } else {
            $alldata = json_decode(Cookie::get('cartitems') ?? '[]', true);

            $productPriceSum = 0;
            $deliveryPriceSum = 0;
            $productTotalcount = 0;

            if ($alldata!==NULL){
                for ($i = 0; $i < count($alldata); $i++) {
//                dd(DB::table("colors")->where("id", $alldata[$i]['color_id'])->get());
                    $product_id = $alldata[$i]['product_id'];
                    $products = Product::where(["id" => $product_id])->get();
                    $alldata[$i]['products'] = $products[0];
                    $productPriceSum += $alldata[$i]['products']->newPrice * $alldata[$i]['quantity'] + $alldata[$i]['products']->shippingCost;
                    $deliveryPriceSum += $alldata[$i]['products']->shippingCost;
                    $productTotalcount += $alldata[$i]['quantity'];
                    $colortable= DB::table("colors")->where("id", $alldata[$i]['color_id'])->get();
                    $alldata[$i]['hexColor'] = $colortable[0]->hex;
                }

            }

//            dd($alldata);

            return view('web.pages.cart', [
                "cartItems" => $alldata,
                "productPriceSum" => $productPriceSum,
                "deliveryPriceSum" => $deliveryPriceSum,
                "productCountSum" => $productTotalcount,
                ]);
        }
    }

    public function storeAuth(Request $request)
    {
        // user is logged in
        $cartItem = CartItem::where(['user_id' => Auth::id(), 'product_id' => $request->product_id, 'color_id' => $request->color_id])->with('product')->first();
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


    // function helper for storeGuest method
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
//        dd(json_encode($addedItems));
        Cookie::queue('cartitems', json_encode($addedItems), 60 * 24);
        return redirect('/cart');
    }


    public function removeItem(Request $request)
    {
        $allRequest = $request->all();
        $product_id = $allRequest['product_id'];
        $color_id = $allRequest['color_id'];
        if (Auth::check()) { // user is logged in
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
            if(!empty($addedItems)){

                foreach ($addedItems as $index => $item) {
                    if ($item->product_id === $product_id && $item->color_id === $request->color_id) {
                        // item with same color already has added, so we change quantity
                        array_splice($addedItems, $index, 1);
                        break;
                    }
                }
                Cookie::queue('cartitems', json_encode($addedItems));
            } else {
                // return view('web.pages.cart');
            }
        }
        return redirect()->back();
    }

    public function removeAllItems(Request $request)
    {
        if (Auth::check()) {
            DB::table('cart_items')->where(['user_id' => Auth::id()])->delete();  // user is logged in
        } else {
            Cookie::queue(Cookie::forget('cartitems'));  // cookies
        }
        return redirect()->back();
    }


    public function updateList(Request $request){

        $allrequest = $request->input();
        // TODO pievienot validāciju
        unset($allrequest['_token']);
        unset($allrequest['_method']);

        if (Auth::check()) {
            $userId = Auth::id();
//        $userId = 1;

            foreach ($allrequest as $key => $value) {
                $ids = explode("-", $key);
                $productId = $ids[0];
                $colorId = $ids[1];


                DB::table('cart_items')->where(['user_id' => $userId , 'product_id'=> $productId, 'color_id' => $colorId])->
                update(['quantity' => $value]);
            }

            return Redirect::refresh();
        } else{
            $cookieData = json_decode(Cookie::get('cartitems'), true);
            $newCookie = [];


//            dd($cookieData);
            Cookie::forget('cartitems');
//            dd($cookieData);
            $loopMax = count($cookieData);

            for ($i = 0, $j=0; $i < $loopMax; $i++) {

                $quantity = 0;
                $productId = "";
                $colorId = "";
                foreach ($allrequest as $key => $value) {

                    $data = explode("-", $key);
                    $productId = $data[0];
                    $colorId = $data[1];
                    $quantity = $value;


                    if ($cookieData[$i]['product_id'] == $productId && $cookieData[$i]['color_id'] == $colorId) {
                        $newCookie[$j]['user_id'] = $cookieData[$i]['user_id'];
                        $newCookie[$j]['product_id'] = $cookieData[$i]['product_id'];
                        $newCookie[$j]['color_id'] = $cookieData[$i]['color_id'];
                        $newCookie[$j]['quantity'] = $quantity;
                        $j++;

                    }




                }



            }




            Cookie::queue('cartitems', json_encode($newCookie), 60 * 24);



            return Redirect::refresh();

        }



    }
}
