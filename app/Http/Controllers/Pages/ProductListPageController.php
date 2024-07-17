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
        // $product = Product::first();
        // dd($product->productColors);

        $products = Product::all();


        $filteredProducts = collect();
        foreach ($products as $product) {
            if ($request->has('min_price')) {
                $minPrice = $request->query('min_price');
                $maxPrice = $request->query('max_price');
                $thePrice = $product->newPrice;
                if ($thePrice < $minPrice || $thePrice > $maxPrice) {
                    continue;
                }
            }
            if ($request->has('is_available') && $product->stockQuantity <= 0) {
                continue;
            }
            if ($request->has('is_discount') && $product->discount <= 0) {
                continue;
            }
            if ($request->has('free_delivery') && $product->shippingCost != 0) {
                continue;
            }
            if ($request->has('min_width')) {
                $minWidth = $request->query('min_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value < $minWidth) {
                    continue;
                }
            }
            if ($request->has('max_width')) {
                $maxWidth = $request->query('max_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value > $maxWidth) {
                    continue;
                }
            }

            // Height filtering
            if ($request->has('min_height')) {
                $minHeight = $request->query('min_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value < $minHeight) {
                    continue;
                }
            }

            if ($request->has('max_height')) {
                $maxHeight = $request->query('max_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value > $maxHeight) {
                    continue;
                }
            }

            // Depth filtering
            if ($request->has('min_depth')) {
                $minDepth = $request->query('min_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value < $minDepth) {
                    continue;
                }
            }

            if ($request->has('max_depth')) {
                $maxDepth = $request->query('max_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value > $maxDepth) {
                    continue;
                }
            }
            $selectedColors = $request->query('colors');
            if(!empty($selectedColors)>0){
                if ($product->productColors) {
                    foreach ($product->productColors as $productColor) {
                        if (in_array($productColor->color_id, $selectedColors)) {
                            $filteredProducts->push($product);
                            break;
                        }
                    }
                }
            } else {
                $filteredProducts->push($product);
            }
        }
        // dd("output: ",$filteredProducts);


        $allParams = request()->all();

        // Sorting
        $sortBy = $request->query('sort_by', 'name'); // Default sorting by name
        $sortOrder = $request->query('sort_order', 'asc'); // Default order ascending

        if ($sortBy === 'price') {
            $filteredProducts = $filteredProducts->sortBy(function ($product) {
                return $product->newPrice;
            }, SORT_REGULAR, $sortOrder === 'desc');
        } elseif ($sortBy === 'name') {
            $filteredProducts = $filteredProducts->sortBy(function ($product) {
                return $product->name;
            }, SORT_REGULAR, $sortOrder === 'desc');
        }


        // additional params for filter form
        $allColors = Color::all();
        // dd($colors);
        $categories = Category::all();

        return view('web.pages.plp')->with([
            "data" => $allParams,
            "products" => $filteredProducts,
            "colors" => $allColors,
            "categories" => $categories
        ]);
    }

    public function categoryIndex(Request $request, $subcat = null)
    {
        // $product = Product::first();
        // dd($product->productColors);

        $products = Product::all();


        $filteredProducts = collect();
        foreach ($products as $product) {
            if (!(is_null($subcat)) && ($subcat != $product->subcategory_id)){
                // dump("here", $product->subcategory_id);
                continue;
            }

            if ($request->has('min_price')) {
                $minPrice = $request->query('min_price');
                $maxPrice = $request->query('max_price');
                $thePrice = $product->newPrice;
                if ($thePrice < $minPrice || $thePrice > $maxPrice) {
                    continue;
                }
            }
            if ($request->has('is_available') && $product->stockQuantity <= 0) {
                continue;
            }
            if ($request->has('is_discount') && $product->discount <= 0) {
                continue;
            }
            if ($request->has('free_delivery') && $product->shippingCost != 0) {
                continue;
            }
            if ($request->has('min_width')) {
                $minWidth = $request->query('min_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value < $minWidth) {
                    continue;
                }
            }
            if ($request->has('max_width')) {
                $maxWidth = $request->query('max_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value > $maxWidth) {
                    continue;
                }
            }

            // Height filtering
            if ($request->has('min_height')) {
                $minHeight = $request->query('min_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value < $minHeight) {
                    continue;
                }
            }

            if ($request->has('max_height')) {
                $maxHeight = $request->query('max_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value > $maxHeight) {
                    continue;
                }
            }

            // Depth filtering
            if ($request->has('min_depth')) {
                $minDepth = $request->query('min_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value < $minDepth) {
                    continue;
                }
            }

            if ($request->has('max_depth')) {
                $maxDepth = $request->query('max_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value > $maxDepth) {
                    continue;
                }
            }
            $selectedColors = $request->query('colors');
            if(!empty($selectedColors)>0){
                if ($product->productColors) {
                    foreach ($product->productColors as $productColor) {
                        if (in_array($productColor->color_id, $selectedColors)) {
                            $filteredProducts->push($product);
                            break;
                        }
                    }
                }
            } else {
                $filteredProducts->push($product);
            }
        }
        // dd("output: ",$filteredProducts);


        $allParams = request()->all();

        // Sorting
        $sortBy = $request->query('sort_by', 'name'); // Default sorting by name
        $sortOrder = $request->query('sort_order', 'asc'); // Default order ascending

        if ($sortBy === 'price') {
            $filteredProducts = $filteredProducts->sortBy(function ($product) {
                return $product->newPrice;
            }, SORT_REGULAR, $sortOrder === 'desc');
        } elseif ($sortBy === 'name') {
            $filteredProducts = $filteredProducts->sortBy(function ($product) {
                return $product->name;
            }, SORT_REGULAR, $sortOrder === 'desc');
        }


        // additional params for filter form
        $allColors = Color::all();
        // dd($colors);
        $categories = Category::all();

        return view('web.pages.plp')->with([
            'subcat' => $subcat,
            "data" => $allParams,
            "products" => $filteredProducts,
            "colors" => $allColors,
            "categories" => $categories
        ]);
    }
}
