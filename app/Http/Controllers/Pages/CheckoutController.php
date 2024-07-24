<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use App\Models\CartItem;


// services
use App\Services\CartService;


class CheckoutController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function openCheckoutPage()
    {
        $products = Auth::check()
            ? CartItem::where('user_id', Auth::id())->with(['product', 'user', 'color'])->get()
            : $this->cartService->getGuestCartItems();

        [$productPriceSum, $deliveryPriceSum, $productTotalCount] = $this->cartService->calculateCartTotals($products);
        return view('web.pages.checkout', [
            "products" => $products,
            "productPriceSum" => $productPriceSum,
            "deliveryPriceSum" => $deliveryPriceSum,
            "productCountSum" => $productTotalCount,
        ]);
    }

    public function checkInput(Request $request)
    {
        $checkoutemail = "";
        $city = "";
        $address = "";
        $request->validate([
            'checkoutemail' => 'required|max:255|email:rfc',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $checkoutemail = $request->checkoutemail;
        $city = $request->city;
        $address = $request->address;

        $products = Product::all();

        $user_id = NULL;
        $addedItems = NULL;

        $totalCost = 0;
        $deliveryCost = 0;
        if (Auth::check()) {
            $user_id = Auth::id();
            $addedItems = DB::table('cart_items')->where('user_id', '=', Auth::id())->get();
            if ($addedItems !== NULL) {
                foreach ($addedItems as $item) {
                    $matchingProduct = $products->firstWhere('id', $item->product_id);
                    $totalCost = $totalCost + $matchingProduct->newPrice;
                    $deliveryCost = $deliveryCost + $matchingProduct->shippingCost;
                }
            }
        } else {
            $addedItems = json_decode(Cookie::get('cartitems'), true);
            if ($addedItems !== NULL) {
                foreach ($addedItems as $item) {
                    $product = DB::table('products')->where('id', '=', $item['product_id'])->first();
                    $totalCost = $totalCost + $product->newPrice;
                    $deliveryCost = $deliveryCost + $product->shippingCost;
                }
            }
        }

        $deliveryPlace = "";
        if ($request->deliveryMethod === "dpd") {
            $deliveryPlace = $request->deliveryPlace_dpd;
        } elseif ($request->deliveryMethod === "omniva") {
            $deliveryPlace = $request->deliveryPlace_omniva;
        }
        $order = new Order;
        $order->user_id = $user_id;
        $order->totalCost = $totalCost;
        $order->deliveryCost = $deliveryCost;
        $order->email = $checkoutemail;
        $order->city = $city;
        $order->address = $address;
        $order->deliveryMethod = $request->deliveryMethod;
        $order->deliveryPlace = $deliveryPlace;
        $order->paymentMethod = $request->paymentMethod;
        $order->status = 'confirmed';
        $order->save();
        $order_id = $order->id;
        if (Auth::check()) {
            $user_id = Auth::id();
            $addedItems = DB::table('cart_items')->where('user_id', '=', Auth::id())->get();
            if ($addedItems !== NULL) {
                foreach ($addedItems as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $order_id;
                    $orderItem->color_id = $item->color_id;
                    $orderItem->product_id = $item->product_id;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->save();
                }
            }
        } else {
            $addedItems = json_decode(Cookie::get('cartitems'), true);
            if ($addedItems !== NULL) {
                foreach ($addedItems as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $order_id;
                    $orderItem->product_id = $item['product_id'];
                    $orderItem->color_id = $item['color_id'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->save();
                }
            }
        }
        if (Auth::check()) {
            $user_id = Auth::id();
            DB::table('cart_items')->where('user_id', '=', Auth::id())->delete();
        } else {
            Cookie::queue(Cookie::forget('cartitems'));
        }
        if (isset($order->user_id)) {

            $user = DB::table('users')->where('id', '=', $user_id)->first();
            $name = $user->full_name;

        } else {
            $name = $order->email;
        }
        $order->full_name = $name;

        $currentDateTime = date('Y-m-d H:i');
        $hash = substr(md5($name . $order->deliveryMethod . $currentDateTime), 0, 7);
        $refnumber = strtoupper($hash); // Convert to uppercase for consistency

        return view('components.success')->with([
            'totalCost' => $totalCost,
            'payMethod' => $order->paymentMethod,
            'name' => $name,
            'date' => $currentDateTime,
            'refnumber' => $refnumber
        ]);
    }
}
