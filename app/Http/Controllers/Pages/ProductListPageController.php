<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;


class ProductListPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        $allParams = request()->all();
        if (count($allParams) > 0) {
            // Filtering by price range
            if ($request->has('min_price')) {
                $query->where('newPrice', '>=', $request->query('min_price'));
            }
            if ($request->has('max_price')) {
                $query->where('newPrice', '<=', $request->query('max_price'));
            }
            $products = $query->get();
        } else {
            $products = Product::all();
        }


        // additional params for filtring
        $colors = Color::all();
        // dd($colors);
        $categories = Category::all();

        return view('web.pages.plp')->with([
            "products" => $products,
            "colors" => $colors,
            "categories" => $categories
        ]);
    }
}
