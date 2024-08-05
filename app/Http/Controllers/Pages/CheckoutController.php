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

    public function index()
    {
        $countryCode = null;
        if (Auth::check()) {
            $user = Auth::user();
            $countryCode = $user->countryCode;
        }

        $products = Auth::check()
            ? CartItem::where('user_id', Auth::id())->with(['product', 'user', 'color'])->get()
            : $this->cartService->getGuestCartItems();

        if (count($products) < 1) return redirect('/cart');

        [$productPriceSum, $deliveryPriceSum, $productTotalCount] = $this->cartService->calculateCartTotals($products);
        return view('web.pages.checkout', [
            "products" => $products,
            "productPriceSum" => $productPriceSum,
            "deliveryPriceSum" => $deliveryPriceSum,
            "productCountSum" => $productTotalCount,
            "countryCode" => $countryCode,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'checkout_email' => 'required|email',
            'checkout_fullname' => 'required|string|max:255',
            'checkout_phonefull' => 'required|string|max:20|regex:/^\+[1-9]\d{1,14}$/',
            'checkout_countrycode' => 'required|string|max:3',
            'checkout_comment' => 'nullable|string|max:1000',
            'checkout_country' => 'required|string|max:100',
            'checkout_city' => 'required|string|max:100',
            'checkout_zip' => 'required|string|max:10',
            'checkout_address' => 'required|string|max:255',
            'checkout_optional' => 'nullable|string|max:255',
            'checkout_payment' => 'required|string|max:50',
            'chekout_confirm' => 'required|in:on',
        ];

        // Validate the request
        $request->validate($rules);

        $products = Auth::check()
            ? CartItem::where('user_id', Auth::id())->with(['product'])->get()
            : $this->cartService->getGuestCartItems();
        [$productPriceSum, $deliveryPriceSum, $productTotalCount] = $this->cartService->calculateCartTotals($products);


        $order = new Order();
        $order->totalCost = $productPriceSum;
        $order->deliveryCost = $deliveryPriceSum;

        $order->countryCode = $request->checkout_countrycode;
        $order->phoneFull = $request->checkout_phonefull;

        $order->user_id = Auth::id();
        $order->email = $request->checkout_email;
        $order->fullname = $request->checkout_fullname;

        $order->city = $request->checkout_city;
        $order->address = $request->checkout_address;
        $order->addressOptional = $request->checkout_optional;
        $order->zip = $request->checkout_zip;
        $order->country = $request->checkout_country;

        $order->payment = $request->checkout_payment;
        $order->status = 'confirmed';
        $order->save();


        $order_id = $order->id;
        if ($products !== NULL) {
            foreach ($products as $item) {
                $orderItem = new OrderItem;
                $orderItem->order_id = $order_id;
                $orderItem->product_id = $item->product->id;
                $orderItem->color_id = $item->color_id;
                $orderItem->quantity = $item->quantity;
                $orderItem->oldPrice = $item->product->oldPrice;
                $orderItem->newPrice = $item->product->newPrice;
                $orderItem->save();
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


        return view('components.success')->with([
            'totalCost' => $productPriceSum + $deliveryPriceSum,
            'paymentMethod' => ucfirst($order->payment),
            'name' => $name,
            'date' => $currentDateTime,
            'refnumber' => $order->trackingNumber,
        ]);
    }
}
