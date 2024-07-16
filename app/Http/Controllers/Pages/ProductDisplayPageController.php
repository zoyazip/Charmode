<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\DB;



class ProductDisplayPageController extends Controller
{
    public function index(Request $request, int $id)
    {
        $product = Product::with(['images', "specification", "productColors.color", "reviews.user"])->find($id);

        $recomendations = DB::table('products')->where("subcategory_id");

        dd($recomendations);


        // dd($product);

        // Check if the product exists
        if (!$product) {
            abort(404);
        }

        // Return a view with the product data, or return JSON for an API
        return view('web.pages.pdp', ["product" => $product]);
    }
}
