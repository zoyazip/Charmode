<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function readProducts() {
        $products = Product::all();
        return $products;
    }

    public function readProduct(Request $request) {
        $product = Product::find($request->id);
        return $product;
    }

    public function createProduct(Request $request) {
        $product = new Product;
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->category_id = $request->category_id;
        // $product->old_price = $request->old_price;
        // $product->name = $request->name;
        // $product->name = $request->name;
        // $product->name = $request->name;
        // $product->name = $request->name;
        // $product->name = $request->name;
        $product->save();
        return "Success";
    }

    public function updateProduct(Request $request) {
        $product = Product::find($request->id);
        $product->update([
            // 'name' => $request->name,
            // 'hex' => $request->hex,
        ]);
        return "Success";
    }

    public function deleteProduct(Request $request) {
        $product = Product::find($request->id);
        $product->delete();
        return "Success";
    }
}
