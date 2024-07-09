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
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->old_price = $request->old_price;
        $product->new_price = $request->new_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->specifications = $request->specifications;
        $product->color_id = $request->color_id;
        $product->delivery_cost = $request->delivery_cost;
        $product->save();
        return "Success";
    }

    public function updateProduct(Request $request) {
        $product = Product::find($request->id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->desccategory_idiption,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'stock_quantity' => $request->stock_quantity,
            'specifications' => $request->specifications,
            'color_id' => $request->color_id,
            'delivery_cost' => $request->delivery_cost,
        ]);
        return "Success";
    }

    public function deleteProduct(Request $request) {
        $product = Product::find($request->id);
        $product->delete();
        return "Success";
    }
}