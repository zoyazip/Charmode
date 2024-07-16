<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Review;


class ProductDisplayPageController extends Controller
{
    public function index(Request $request, int $id)
    {
        $product = Product::with(['images', "specifications", "productColors.color", "reviews.user"])->find($id);
        // Check if the product exists
        if (!$product) {
            abort(404);
        }

        $reviews = Review::where("product_id", $product->id)->get();

        $rating = 0;
        if (count($reviews) > 0) {
            foreach ($reviews as &$value) {
                $rating += $value->rating;
            }
            $rating /= count($reviews);
        }

        return view('web.pages.pdp', [
            "product" => $product,
            "rating" => $rating
        ]);
    }
}
