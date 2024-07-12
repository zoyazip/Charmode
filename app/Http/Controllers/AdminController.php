<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;
use App\Models\SubCategory;

class AdminController extends Controller
{
    // see all products
    public function openAllProductPage() {
        $products = Product::all();
        return view('web/pages/admin')->with("products", $products);
    }

    // add new product
        // if neccessary add new color and new category and subcategory
    public function openAddProductPage() {
        $colors = Color::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('web/pages/addproduct')->with([
            "categories" => $categories,
            "subcategories" => $subCategories,
            "colors" => $colors,
        ]);
    }
     // edit product
        // probably delete color or category or subcategory

     // delete product
        // probably delete color or category or subcategory

     // see one product

     // delete review

     // edit color or category or subcategory


}
