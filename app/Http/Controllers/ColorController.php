<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\ProductColor;

class ColorController extends Controller
{

    public function createProductColor($color, $productID) {
        $newProductColor = new ProductColor;
        $newProductColor->product_id = $productID;
        $newProductColor->color_id = $color;
        $newProductColor->save();
    }

    public function createProductColors($colors, $productID) {
        foreach($colors as $color) {
            if(!ctype_digit($color)) {
                $colorDecoded = json_decode($color);
                $newColor = new Color;
                $newColor->name = $colorDecoded->name;
                $newColor->hex = $colorDecoded->hex;
                $newColor->save();
                $color = $newColor->id;
            }
            $this->createProductColor($color, $productID);
        }
    }

    public function readColors() {
        $colors = Color::all();
        return $colors;
    }

    public function readColor(Request $request) {
        $color = Color::find($request->id);
        return $color;
    }

    public function createColor(Request $request) {
        $color = new Color;
        $color->color_name = $request->color_name;
        $color->hex = $request->hex;
        $color->save();
        return "Success";
    }

    public function updateColor(Request $request) {
        $color = Color::find($request->id);
        $color->update([
            'color_name' => $request->color_name,
            'hex' => $request->hex,
        ]);
        return "Success";
    }

    public function deleteColor(Request $request) {
        $color = Color::find($request->id);
        $color->delete();
        return "Success";
    }
}
