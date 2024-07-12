<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function noInput(Request $request){
        $data = $request->session()->get('filter_data', [
            'min_price' => null,
            'max_price' => null,
            'product_width' => null,
            'product_height' => null,
            'product_depth' => null,
            'colors' => [],
            'is_available' => false,
        ]);

        return view('web.pages.plp', compact('data'));
    }

    public function testInput(Request $request) {
        $data = $request->all();
        // dd($data);
        if(array_key_exists('is_reset', $data)){
            $data = $request->session()->get('filter_data', [
                'min_price' => null,
                'max_price' => null,
                'product_width' => null,
                'product_height' => null,
                'product_depth' => null,
                'colors' => [],
                'is_available' => false,
            ]);
        } else {
            $request->validate([
                'min_price' => 'nullable|numeric|min:0',
                'max_price' => 'nullable|numeric|min:0',
                'product_width' => 'nullable|numeric|min:0',
                'product_height' => 'nullable|numeric|min:0',
                'product_depth' => 'nullable|numeric|min:0',
                'colors' => 'nullable|array',
            ]);
            // dd($data);
            // $colors = $request->input('colors', []);
            // dd($colors);

        }
        // dd($data);
        // $minPrice = $request->input('min_price');
        // $maxPrice = $request->input('max_price');
        // $productWidth = $request->input('product_width');
        // $productHeight = $request->input('product_height');
        // $productDepth = $request->input('product_depth');
        // $colors = $request->input('colors', []);
        // $isAvailable = $request->input('is_available');
        // dd($data);

        return view('web.pages.plp', compact('data'));
    }
}
