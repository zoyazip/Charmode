<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

use App\Models\CartItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


use App\Services\CartService;


class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $products = Auth::check()
            ? CartItem::where('user_id', Auth::id())->with(['product', 'user', 'color'])->get()
            : $this->cartService->getGuestCartItems();

            [$productPriceSum, $deliveryPriceSum, $productTotalCount] = $this->cartService->calculateCartTotals($products);

        return view('web.pages.cart', [
            "cartItems" => $products,
            "productPriceSum" => $productPriceSum,
            "deliveryPriceSum" => $deliveryPriceSum,
            "productCountSum" => $productTotalCount,
        ]);
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

    public function removeItem(Request $request)
    {
        $product_id = $request->input('product_id');
        $color_id = $request->input('color_id');

        if (Auth::check()) {
            // User is logged in
            DB::table('cart_items')
                ->where([
                    'product_id' => $product_id,
                    'user_id' => Auth::id(),
                    'color_id' => $color_id,
                ])
                ->delete();
        } else {
            // Handle guest users with cookies
            $addedItems = json_decode($request->cookie('cartitems'), true) ?? [];

            // Find and remove the matching item
            $addedItems = array_filter($addedItems, function ($item) use ($product_id, $color_id) {
                return !($item['product_id'] === $product_id && $item['color_id'] === $color_id);
            });
            $addedItems = array_values($addedItems);
            Cookie::queue('cartitems', json_encode($addedItems));
        }

        return Redirect::refresh();
    }

    public function removeAllItems(Request $request)
    {
        if (Auth::check()) {
            DB::table('cart_items')->where(['user_id' => Auth::id()])->delete();  // user is logged in
        } else {
            Cookie::queue(Cookie::forget('cartitems'));  // cookies
        }
        return Redirect::refresh();
    }

    public function updateList(Request $request)
    {
        $updates = $request->except(['_token', '_method']);

        if (Auth::check()) {
            $userId = Auth::id();
            foreach ($updates as $key => $quantity) {
                [$productId, $colorId] = explode("-", $key);
                DB::table('cart_items')
                    ->where(['user_id' => $userId, 'product_id' => $productId, 'color_id' => $colorId])
                    ->update(['quantity' => $quantity]);
            }
        } else {
            $cookieData = json_decode($request->cookie('cartitems'), true) ?? [];
            $updatedItems = [];

            foreach ($cookieData as $item) {
                $key = "{$item['product_id']}-{$item['color_id']}";
                if (isset($updates[$key])) {
                    $item['quantity'] = $updates[$key];
                }
                $updatedItems[] = $item;
            }

            Cookie::queue('cartitems', json_encode($updatedItems), 60 * 24);
        }

        return Redirect::refresh();
    }
}
