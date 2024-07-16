<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;

class FilterController extends Controller
{
    public function noInput(Request $request){
        // initialize the data if it doesn't exist
        $data = $request->session()->get('filter_data', [
            'min_price' => null,
            'max_price' => null,
            'min_width' => null,
            'max_width' => null,
            'min_height' => null,
            'max_height' => null,
            'min_depth' => null,
            'max_depth' => null,
            'colors' => [],
            'is_available' => false,
            'is_discount' => false,
            'free_delivery' => false,
        ]);

        $products = Product::all();
        $colors = Color::all();
        $categories = Category::all();
        // dd($products);
        return view('web.pages.plp')->with(["products" => $products, "data" => $data, "colors" => $colors, "categories" => $categories]);
        // return view('web.pages.plp', compact('data'));
    }

    public function testInput(Request $request) {
        $data = $request->all();
        if(array_key_exists('is_reset', $data)){
            $data = $request->session()->get('filter_data', [
                'min_price' => null,
                'max_price' => null,
                'min_width' => null,
                'max_width' => null,
                'min_height' => null,
                'max_height' => null,
                'min_depth' => null,
                'max_depth' => null,
                'colors' => [],
                'is_available' => false,
                'is_discount' => false,
                'free_delivery' => false,
            ]);
        } else {
            $request->validate([
                'min_price' => 'nullable|numeric|min:0',
                'max_price' => 'nullable|numeric|min:0',
                'min_width'=> 'nullable|numeric|min:0',
                'max_width'=> 'nullable|numeric|min:0',
                'min_height'=> 'nullable|numeric|min:0',
                'max_height'=> 'nullable|numeric|min:0',
                'min_depth'=> 'nullable|numeric|min:0',
                'max_depth'=> 'nullable|numeric|min:0',
                'colors' => 'nullable|array',
            ]);
        }
        $products = Product::all();
        $colors = Color::all();
        $categories = Category::all();
        return view('web.pages.plp')->with(["products" => $products, "data" => $data, "colors" => $colors, "categories" => $categories]);
        // return view('web.pages.plp', compact('data'));
    }
}
