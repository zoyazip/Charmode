<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Color;
use Illuminate\Support\Facades\Cookie;
use App\Models\CartItem;

class CartService
{
    // index helper
    public function getGuestCartItems()
    {
        $alldata = json_decode(Cookie::get('cartitems') ?? '[]', true);
        $cartItems = collect();

        if ($alldata !== NULL) {
            foreach ($alldata as $itemData) {
                $product = Product::find($itemData['product_id']);
                $color = Color::find($itemData['color_id']);

                // Create a new CartItem instance and populate it
                $cartItem = new CartItem();
                $cartItem->product_id = $product->id;
                $cartItem->color_id = $color->id;
                $cartItem->user_id = null; // Or some identifier for guest users
                $cartItem->quantity = $itemData['quantity'];
                $cartItem->exists = true; // Indicate that this is a retrieved model instance

                // Assign the relationships
                $cartItem->setRelation('product', $product);
                $cartItem->setRelation('color', $color);

                $cartItems->push($cartItem);
            }
        }

        return $cartItems;
    }

    // index helper
    public function calculateCartTotals($items)
    {
        $productPriceSum = 0;
        $deliveryPriceSum = 0;
        $productTotalCount = 0;

        foreach ($items as $item) {
            $productPriceSum += $item['product']->newPrice * $item['quantity'];
            $deliveryPriceSum += $item['product']->shippingCost;
            $productTotalCount += $item['quantity'];
        }

        return [$productPriceSum, $deliveryPriceSum, $productTotalCount];
    }
}
