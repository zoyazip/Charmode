<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('images')->paginate(12);

        // Get the total count of products
        $currentPage = $products->currentPage();
        $lastPage = $products->lastPage();
        $nextPages = collect(range($currentPage + 1, min($currentPage + 3, $lastPage)))->filter(function($page) use ($lastPage) {
            return $page <= $lastPage;
        });
        $previousPage = $currentPage > 1 ? $currentPage - 1 : null;

        // Pass the paginated products and pagination details to the view
        return view('web.pages.home', [
            'products' => $products,
            'currentPage' => $currentPage,
            'nextPages' => $nextPages,
            'previousPage' => $previousPage,
        ]);
    }
}
