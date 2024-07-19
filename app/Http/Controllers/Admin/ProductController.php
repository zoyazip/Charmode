<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function readProducts() {
    //     $products = Product::all(); //Color::all();//
    //     return view('plp')->with("products", $products);
    // }

    public function readProducts()
    {
        $products = Product::all();
        $colors = Color::all();
        $categories = Category::all();
        $data = [
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
        ];
        return view('web/pages/plp')->with(["products" => $products, "data" => $data, "colors" => $colors, "categories" => $categories]);
    }

    public function readProduct(Request $request)
    {
        $product = Product::find($request->id);
        return $product;
    }

    public function createProduct($request, $subCategory) {
        $product = new Product;
        $product->product_code = $request->product_code;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->subcategory_id = $subCategory;
        $product->oldPrice = $request->oldPrice;
        $product->newPrice = $request->newPrice;
        $product->discount = $request->discount;
        $product->stockQuantity = $request->stockQuantity;
        $product->shippingCost = $request->shippingCost;
        $product->save();
        return $product->id;
    }

    public function updateProduct(Request $request, $subCategory)
    {
        $product = Product::find($request->id);
        $product->update([
            'product_code' => $request->product_code,
            'name' => $request->name,
            'description' => $request->description,
            'subcategory_id' => $subCategory,
            'oldPrice' => $request->oldPrice,
            'newPrice' => $request->newPrice,
            'discount' => $request->discount,
            'stockQuantity' => $request->stockQuantity,
            'shippingCost' => $request->shippingCost,
        ]);
        return $product->id;
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();
        return redirect('/adminproducts');
    }
}
