<?php

namespace App\Http\View\Composers;

use App\Models\CartItem;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::with('subcategories')->get();

        if (Auth::check()) {
            $count = count(CartItem::where("user_id", Auth::id())->get());
        } else {
            $cart_items = json_decode(Cookie::get('cartitems'), true);
            $count = 0;
            if(is_null($cart_items)){

            }

//            if (count($cart_items) > 0) {
//                $count = count($cart_items);
//            }
        }

        $view->with('categories', $categories)->with('count', $count);
    }
}
