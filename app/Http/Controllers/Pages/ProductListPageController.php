<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\RedirectResponse;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;

use Illuminate\Support\Facades\DB;

class ProductListPageController extends Controller
{
    public function categoryIndex(Request $request, $subcat = null)
    {
        // $products = Product::with('images')->paginate(12);

        // // Get the total count of products
        // $currentPage = $products->currentPage();
        // $lastPage = $products->lastPage();
        // $nextPages = collect(range($currentPage + 1, min($currentPage + 3, $lastPage)))->filter(function($page) use ($lastPage) {
        //     return $page <= $lastPage;
        // });
        // $previousPage = $currentPage > 1 ? $currentPage - 1 : null;

        // // Pass the paginated products and pagination details to the view
        // return view('web.pages.home', [
        //     'products' => $products,
        //     'currentPage' => $currentPage,
        //     'nextPages' => $nextPages,
        //     'previousPage' => $previousPage,
        // ]);
        $products = Product::all();


        $filteredProducts = collect();
        foreach ($products as $product) {
            if (!(is_null($subcat)) && ($subcat != $product->subcategory_id)){
                // dump("here", $product->subcategory_id);
                continue;
            }

            if ($request->filled('min_price')) {
                $minPrice = $request->query('min_price');
                $maxPrice = $request->query('max_price');
                $thePrice = $product->newPrice;
                if ($thePrice < $minPrice || $thePrice > $maxPrice) {
                    continue;
                }
            }
            if ($request->filled('is_available') && $product->stockQuantity <= 0) {
                continue;
            }
            if ($request->filled('is_discount') && $product->discount <= 0) {
                continue;
            }
            if ($request->filled('free_delivery') && $product->shippingCost != 0) {
                continue;
            }
            if ($request->filled('min_width')) {
                $minWidth = $request->query('min_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value < $minWidth) {
                    continue;
                }
            }
            if ($request->filled('max_width')) {
                $maxWidth = $request->query('max_width');
                $specification = $product->specifications->firstWhere('key', 'width');
                if (!$specification || $specification->value > $maxWidth) {
                    continue;
                }
            }

            // Height filtering
            if ($request->filled('min_height')) {
                $minHeight = $request->query('min_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value < $minHeight) {
                    continue;
                }
            }

            if ($request->filled('max_height')) {
                $maxHeight = $request->query('max_height');
                $specification = $product->specifications->firstWhere('key', 'height');
                if (!$specification || $specification->value > $maxHeight) {
                    continue;
                }
            }

            // Depth filtering
            if ($request->filled('min_depth')) {
                $minDepth = $request->query('min_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value < $minDepth) {
                    continue;
                }
            }

            if ($request->filled('max_depth')) {
                $maxDepth = $request->query('max_depth');
                $specification = $product->specifications->firstWhere('key', 'depth');
                if (!$specification || $specification->value > $maxDepth) {
                    continue;
                }
            }
            $isGoodProduct = false;

            if ($request->filled('search')) {
                $searchKeys = explode(' ', $request->query('search'));

                foreach ($searchKeys as $searchKey) {
                    $searchKey = strtolower($searchKey);
                    // check for name
                    if (strtolower($product->name) == $searchKey) {
                        $isGoodProduct = true;
                        break;
                    }
                    // check for description
                    if (!$isGoodProduct){
                        $productContainingString = Product::where('id', $product->id)
                            ->where('description', 'LIKE', '%' . $searchKey . '%')
                            ->first();
                        if ($productContainingString) {
                            $isGoodProduct = true;
                            break;
                        }
                    }
                    if ($isGoodProduct) {
                        break;
                    }
                }
                if (!$isGoodProduct) {
                    continue;
                }
            }

            $selectedColors = $request->query('colors');
            if (!empty($selectedColors)) {
                $selectedColorsArray = explode(',', $selectedColors);

                if ($product->productColors) {
                    foreach ($product->productColors as $productColor) {
                        if (in_array($productColor->color_id, $selectedColorsArray)) {
                            $filteredProducts->push($product);
                            break;
                        }
                    }
                }
            } else {
                $filteredProducts->push($product);
            }
        }

        $allParams = request()->all();

        if (isset($allParams['colors']) && !empty($allParams['colors'])) {
            $allParams['colors'] = explode(',', $allParams['colors']);
        }

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

        // Pagination

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 12;
        $currentPageItems = $filteredProducts->slice(($currentPage - 1) * $perPage, $perPage)->values();
        // $paginatedProducts = new LengthAwarePaginator($currentPageItems, $filteredProducts->count(), $perPage, $currentPage, [
        //     'path' => LengthAwarePaginator::resolveCurrentPath(),
        //     'query' => $request->query(),
        // ]);
        $paginatedFilteredProducts = new LengthAwarePaginator($currentPageItems, count($filteredProducts), $perPage);
        $paginatedFilteredProducts->setPath($request->url());
        $paginatedFilteredProducts->appends($request->query());
        // dd($paginatedFilteredProducts);

        // additional params for filter form
        $allColors = Color::all();
        // dd($colors);
        $categories = Category::all();

        return view('web.pages.plp')->with([
            'subcat' => $subcat,
            "data" => $allParams,
            "products" => $paginatedFilteredProducts,
            "colors" => $allColors,
            "categories" => $categories
        ]);
    }
}
