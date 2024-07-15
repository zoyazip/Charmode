<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

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

        return view('web.pages.plp', compact('data'));
    }

    public function testInput(Request $request) {
        $data = $request->all();
        // dd($data);
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

        return view('web.pages.plp', compact('data'));
    }
}
