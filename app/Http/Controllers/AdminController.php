<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    // see all products
    public function openAllProductPage() {
        $products = Product::all();
        return view('web/pages/admin')->with("products", $products);
    }

    // add new product
        // if neccessary add new color and new category and subcategory

     // edit product
        // probably delete color or category or subcategory

     // delete product
        // probably delete color or category or subcategory

     // see one product

     // delete review

     // edit color or category or subcategory


}
