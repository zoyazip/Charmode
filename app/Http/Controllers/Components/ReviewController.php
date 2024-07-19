<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $review = new Review();
        $review->user_id = Auth::id();  // Get the authenticated user's ID
        $review->product_id = $product->id;
        $review->comment = $request->comment;
        $review->rating = $request->star;
        $review->save();

        return redirect()->back();
    }

    public function delete(Request $request) {
          $review = Review::find($request->id);
          $review->delete();
          return redirect()->back();
      }
}
