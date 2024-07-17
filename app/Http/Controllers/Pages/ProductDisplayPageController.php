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
        // dd($product);

        $reviews = Review::where("product_id", $product->id)->paginate(3);

        $currentPage = $reviews->currentPage();
        $lastPage = $reviews->lastPage();
        $nextPages = collect(range($currentPage + 1, min($currentPage + 3, $lastPage)))->filter(function($page) use ($lastPage) {
            return $page <= $lastPage;
        });
        $previousPage = $currentPage > 1 ? $currentPage - 1 : null;

        $allReviews = Review::where("product_id", $product->id)->get();
        
        $rating = 0;
        if ($allReviews->count() > 0) {
            $rating = $allReviews->sum('rating') / $allReviews->count();
        }
        
        $similar = Product::where('subcategory_id', $product->subcategory_id)->limit(6)->get();

        return view('web.pages.pdp', [
            // main
            'product' => $product,
            'rating' => $rating,

            // collections
            'similar' => $similar,
            'reviews' => $reviews,

            // comment pagination
            'currentPage' => $currentPage,
            'nextPages' => $nextPages,
            'previousPage' => $previousPage,
        ]);
    }
}
