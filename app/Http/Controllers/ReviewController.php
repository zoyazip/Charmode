<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Review;
use App\Models\Product;


class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        // dd($request);
        
        $product = Product::findOrFail($id);

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
