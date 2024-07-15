<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColors;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Specification;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    // see all products
    public function openAllProductPage() {
        $products = Product::all();
        return view('web/pages/admin')->with("products", $products);
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
        $subCategories = []; //SubCategory::all();

        session()->put('allCategories', $categories);
        session()->put('allSubCategories', $subCategories);
        session()->put('allColors', $colors);

        return view('web/pages/addproduct');
        // return view('web/pages/addproduct')->with([
        //     "categories" => $categories,
        //     "subcategories" => $subCategories,
        //     "colors" => $colors,
        // ]);
    }

    public function createProductColor($color, $productID) {
        $newProductColor = new ProductColors;
        $newProductColor->productID = $productID;
        $newProductColor->colorID = $color;
        $newProductColor->save();
    }


    public function addProduct(Request $request) {
        // validate data
    
        // add category
        $category = $request->category;
        if (!ctype_digit($category)) {
            // new category
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->save();
            $category = $newCategory->id;
        }

        // add subcategory
        $subcategory = $request->subcategory;
        if (!ctype_digit($subcategory)) {
            // new category
            $newSubCategory = new SubCategory;
            $newSubCategory->name = $subcategory;
            $newSubCategory->categoryID = $category;
            $newSubCategory->save();
            $subcategory = $newSubCategory->id;
        }

        // add product
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->subcategoryID = $subcategory;
        $product->oldPrice = $request->oldPrice;
        $product->newPrice = $request->newPrice;
        $product->discount = $request->discount;
        $product->stockQuantity = $request->stockQuantity;
        $product->save();
        $productID = $product->id;

        // add colors and productcolors
        $colors = $request->checked_colors;
        if (isset($colors)) {
            foreach($colors as $color) {
                if(!ctype_digit($color)) {
                    $colorDecoded = json_decode($color);
                    $newColor = new Color;
                    $newColor->name = $colorDecoded->name;
                    $newColor->hex = $colorDecoded->hex;
                    $newColor->save();
                    $color = $newColor->id;
                }
                $this->createProductColor($color, $productID);
            }
        }

        //add specification
        $specKeys = $request->key;
        $specValues = $request->value;
        if (isset($specKeys)) {
            for ($x = 0; $x < sizeof($specKeys); $x++) {
                $specification = new Specification;
                $specification->key = $specKeys[$x];
                $specification->value = $specValues[$x];
                $specification->productID = $productID;
                $specification->save();
            }
        }

        // add images

        // redirect

    }

   

     // edit product
        // probably delete color or category or subcategory

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



}
