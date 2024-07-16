<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class ProductListPageController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('products')
                    ->select('products.*')
                    ->join('product_colors', 'products.id', '=', 'product_colors.product_id', 'full outer');



        $allParams = request()->all();
        // dd($allParams);

        // search here

        //pagination??

        //filter by specs

        // Filtering by price range
        if ($request->has('min_price')) {
            $query->where('newPrice', '>=', $request->query('min_price'));
        }
        if ($request->has('max_price')) {
            $query->where('newPrice', '<=', $request->query('max_price'));
        }
        // Filter by selected colors
        if ($request->has('colors')) {
            $selectedColors = $request->query('colors'); // array of selected color IDs
            $query->whereIn('product_colors.color_id', $selectedColors);
        }
        // Filter by booleans
        if ($request->has('is_available')) {
            $query->where('stockQuantity', '>', '0');
        }
        if ($request->has('is_discount')) {
            $query->where('discount', '>', '0');
        }
        if ($request->has('free_delivery')) {
            $query->where('shippingCost', '=', '0');
        }
        // Filter by specifications
        // only the min values work, not the max and i don't know why
        // if ($request->has('min_width')) {
        //     $minWidthSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'width')
        //         ->where('specifications.value', '>=', $request->query('min_width'))
        //         ->select('products.id');
        //         // dd($minWidthSubquery->get());
        //     $query->whereIn('products.id', $minWidthSubquery);
        // }

        // if ($request->has('max_width')) {
        //     $maxWidthSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'width')
        //         ->where('specifications.value', '<=', $request->query('max_width'))
        //         ->select('products.id');
        //         dd($maxWidthSubquery->get());
        //     $query->whereIn('products.id', $maxWidthSubquery);
        // }

        // if ($request->has('min_height')) {
        //     $minHeightSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'height')
        //         ->where('specifications.value', '>=', $request->query('min_height'))
        //         ->select('products.id');
        //         // dd($minHeightSubquery->get());
        //     $query->whereIn('products.id', $minHeightSubquery);
        // }

        // if ($request->has('max_height')) {
        //     $maxHeightSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'height')
        //         ->where('specifications.value', '<=', $request->query('max_height'))
        //         ->select('products.id');
        //         dd($maxHeightSubquery->get());
        //     $query->whereIn('products.id', $maxHeightSubquery);
        // }

        // if ($request->has('min_depth')) {
        //     $minDepthSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'depth')
        //         ->where('specifications.value', '>=', $request->query('min_depth'))
        //         ->select('products.id');
        //     $query->whereIn('products.id', $minDepthSubquery);
        // }

        // if ($request->has('max_depth')) {
        //     $maxDepthSubquery = DB::table('products')
        //         ->join('specifications', 'products.id', '=', 'specifications.product_id')
        //         ->where('specifications.key', 'depth')
        //         ->where('specifications.value', '<=', $request->query('max_depth'))
        //         ->select('products.id');
        //     $query->whereIn('products.id', $maxDepthSubquery);
        // }




        // if ($request->has('min_width')) {
        //     $query->where('specifications.key', '=', 'width');
        //     $query->where('specifications.value', '>=', $request->query('min_width'));
        // }
        // if ($request->has('max_width')) {
        //     $query->where('width.value', '<=', $request->query('max_width'));
        // }
        // if ($request->has('min_height')) {
        //     $query->where('height.value', '>=', $request->query('min_height'));
        // }
        // if ($request->has('max_height')) {
        //     $query->where('height.value', '<=', $request->query('max_height'));
        // }
        // if ($request->has('min_depth')) {
        //     $query->where('depth.value', '>=', $request->query('min_depth'));
        // }
        // if ($request->has('max_depth')) {
        //     $query->where('depth.value', '<=', $request->query('max_depth'));
        // }

        // create a filter by dimensions

        // dd($query);
        $query->groupBy('products.id');
        $query->distinct();
        $products = $query->get();
        // dd($products);


        // sort



        // additional params for filter form
        $colors = Color::all();
        // dd($colors);
        $categories = Category::all();

        return view('web.pages.plp')->with([
            "data" => $allParams,
            "products" => $products,
            "colors" => $colors,
            "categories" => $categories
        ]);
    }
}
