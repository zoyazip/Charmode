<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColors;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\SubCategory;
use App\Models\Specification;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ColorController;

use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // see all products
    public function openAllProductPage() {
        $products = Product::all();
        return view('web/pages/admin')->with("products", $products);
    }


    public function openOneProductPage(Request $request) {
        $product = Product::find($request->id);
        return view('web/pages/adminproduct')->with("product", $product);
    }

    public function openOneOrderPage(Request $request) {
        $order = Order::find($request->id);
        return view('web/pages/order')->with("order", $order);
    }

    public function openOrdersPage(Request $request) {
        $orders = Order::all();
        return view('web/pages/orderlist')->with("orders", $orders);
    }


    public function getSubcategories() {
        $subCategories = SubCategory::all();
        return $subCategories;
    }
    // add new product
        // if neccessary add new color and new category and subcategory
    public function openAddProductPage() {
        $colors = Color::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        // session()->put('allCategories', $categories);
        // session()->put('allSubCategories', $subCategories);
        // session()->put('allColors', $colors);

        // return view('web/pages/addproduct');
        return view('web/pages/addproduct')->with([
            "categories" => $categories,
            "subcategories" => $subCategories,
            "colors" => $colors,
        ]);
    }

    


    public function addProduct(Request $request) {
        // validate data
        $request->validate([
            'product_code' => 'required|max:255',
            'name' => 'required|max:255',
            'oldPrice' => 'required|decimal:0,2',
            'newPrice' => 'required|decimal:0,2',
            'discount' => 'required|integer',
            'stockQuantity' => 'required|integer',
            'shippingCost' => 'required|decimal:0,2',
            'description' => 'required|string',
        ]);
    
        // add category
        $category = $request->category;
        if (!ctype_digit($category)) {
            $categoryController = new CategoryController;
            $category = $categoryController->createCategory($category);
        }

        // add subcategory
        $subCategory = $request->subcategory;
        if (!ctype_digit($subCategory)) {
            $subCategoryController = new SubCategoryController;
            $subCategory = $subCategoryController->createSubCategory($subCategory, $category);
        }

        // add product
        $productController = new ProductController;
        $productID = $productController->createProduct($request, $subCategory);

        // add colors and productcolors
        $colors = $request->checked_colors;
        if (isset($colors)) {
            $colorController = new ColorController;
            $colorController->createProductColors($colors, $productID);
        }

        //add specification
        $specKeys = $request->key;
        $specValues = $request->value;
        if (isset($specKeys)) {
            $specificationController = new SpecificationController;
            $specificationController->createSpecification($specKeys, $specValues, $productID);
        }

        // add images
        $images = $request->image;
        if (isset($images)) {
            $imageController = new ImageController;
            $imageController->storeImages($images, $productID);
        }

        return redirect('/adminproducts');
    }

   

     // edit product
        // probably delete color or category or subcategory
        public function updateProduct(Request $request) {
            // validate data
            $request->validate([
                'product_code' => 'required|max:255',
                'name' => 'required|max:255',
                'oldPrice' => 'required|decimal:0,2',
                'newPrice' => 'required|decimal:0,2',
                'discount' => 'required|integer',
                'stockQuantity' => 'required|integer',
                'shippingCost' => 'required|decimal:0,2',
                'description' => 'required|string',
            ]);
        
            // add category
            $category = $request->category;
            if (!ctype_digit($category)) {
                $categoryController = new CategoryController;
                $category = $categoryController->createCategory($category);
            }
    
            // add subcategory
            $subCategory = $request->subcategory;
            if (!ctype_digit($subCategory)) {
                $subCategoryController = new SubCategoryController;
                $subCategory = $subCategoryController->createSubCategory($subCategory, $category);
            }
    
            // add product
            $productController = new ProductController;
            $productID = $productController->updateProduct($request, $subCategory);
    
            // add colors and productcolors
            $colors = $request->checked_colors;
            if (isset($colors)) {
                $colorController = new ColorController;
                // sākumā izdzēš iepriekšējās
                $colorController->deleteProductColors($productID);
                // tad izveido jaunas
                $colorController->createProductColors($colors, $productID);
            }
    
            //add specification
            $specKeys = $request->key;
            $specValues = $request->value;
            if (isset($specKeys)) {
                $specificationController = new SpecificationController;
                // sākumā izdzēš iepriekšējās
                $specificationController->deleteSpecification($productID);
                // tad izveido jaunas
                $specificationController->createSpecification($specKeys, $specValues, $productID);
            }
    
            // add images
            $images = $request->image;
            if (isset($images)) {
                $imageController = new ImageController;
                $imageController->storeImages($images, $productID);
            }
    
            return redirect('/adminproducts/'.$productID);
        }

     // delete product
        // probably delete color or category or subcategory

     // see one product

     // delete review

     // edit color or category or subcategory


     
     // get products
     public function getProducts() {
        $products = Product::all();
        return $products;
     }

     // get specifications
     public function getSpecifications() {
        $products = Specification::all();
        return $products;
     }

     // get productColors
     public function getProductColors() {
        $products = ProductColors::all();
        return $products;
     }

     // get images
     public function getImages() {
        $images = Image::all();
        return $images;
     }

     public function editProduct(Request $request) {
        $product = Product::find($request->id);
        $colors = Color::all();
        $categories = Category::all();
        $subCategories = DB::table('sub_categories')->where('category_id', '=', $product->subCategory->category_id)->get();

        // session()->put('allCategories', $categories);
        // session()->put('allSubCategories', $subCategories);
        // session()->put('allColors', $colors);

        return view('web/pages/editproduct')->with([
            'product' => $product,
            'colors' => $colors,
            'categories' => $categories,
            'subCategories' => $subCategories,
        ]);
     }



}
