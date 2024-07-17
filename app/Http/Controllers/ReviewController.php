<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function delete(Request $request) {
        $review = Review::find($request->id);
        $review->delete();
        return redirect()->back();
    }
}
