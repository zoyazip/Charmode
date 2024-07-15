<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Color;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
// use Intervention\Image\Facades\Image;

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


    public function addProduct(Request $request) {
    // public function addProduct(Request $request): RedirectResponse {
        // dd($request);

        // $request->validate([
        //     'name' => 'nullable|max:255',
            // 'surname' => 'nullable|max:255',
            // 'email_address' => 'required|unique:users,email|max:255|email:rfc',
            // 'first_password' => 'required|max:255|min:8',
            // 're-password' => 'required|max:255|min:8|same:first_password',
            // 'phone_number' => 'required|string|digits_between:8,11|unique:users,phone',
            // 'city' => 'nullable|max:255',
            // 'address' => 'nullable|max:255',
        // ]);

        // create specification json

        // $specificationsJSON = '{"specifications" : [';
        $specificationsJSON = '[';

        $specKeys = $request->key;
        $specValues = $request->value;
        if (isset($specKeys)) {
            for ($x = 0; $x < sizeof($specKeys); $x++) {
                $specificationsJSON = $specificationsJSON.'{'.$specKeys[$x]." : ".$specValues[$x].'},';
            }

        }
        $specificationsJSON = $specificationsJSON.']';
        $specificationsJSON = json_encode($specificationsJSON);
        // $specificationsJSON = $specificationsJSON.']}';
        // dd($specificationsJSON);


        // create colors and create new!!!
        // dd($request->checked_colors);
        $colorID = [];
        
        $colors = $request->checked_colors;
        if (isset($colors)) {
            foreach($colors as $color) {
                // dd($color);
                if(ctype_digit($color)) {
                    array_push($colorID, intval($color));
                } else {
                    // new color
                    // dd(json_decode($color)->name);
                    $colorDecoded = json_decode($color);
                    $newColor = new Color;
                    $newColor->name = $colorDecoded->name;
                    $newColor->hex = $colorDecoded->hex;
                    $newColor->save();
                    $newColorId = $newColor->id;
                    // dd($newColorId);
                    array_push($colorID, $newColorId);
                }
            }
            // dd($colorID);

        }
        $colorIdJson = '[';

        if (isset($colorID)) {
            for ($x = 0; $x < sizeof($colorID); $x++) {
                $colorIdJson = $colorIdJson.'{'.$x." : ".$colorID[$x].'},';
            }

        }
        $colorIdJson = $colorIdJson.']';
        $colorIdJson = json_encode($colorIdJson);

        // check categories and subcategories and cretae new


       
        $category = $request->category;
        if (!ctype_digit($category)) {
            // new category
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->save();
            $category = $newCategory->id;
        }

        $subcategory = $request->subcategory;
        dd($subcategory);
        if(!ctype_digit($subcategory)) {
            // new subcategory
            $newSubCategory = new Subcategory;
            $newSubcategory->name = $subcategory;
            $newSubCategory->categoryID = $categoryId;
            $newSubCategory->save();
            $subcategory = $newSubCategory->id;
        }

        $imagesArray = [];

        $imagesJson = '[';

        if (isset($imagesArray)) {
            for ($x = 0; $x < sizeof($imagesArray); $x++) {
                $imagesJson = $imagesJson.'{'.$x." : ".$imagesArray[$x].'},';
            }

        }
        $imagesJson = $imagesJson.']';
        $imagesJson = json_encode($imagesJson);



        

    
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->subcategoryID = $subcategory;
        $product->oldPrice = $request->oldPrice;
        $product->newPrice = $request->newPrice;
        $product->discount = $request->discount;
        $product->stockQuantity = $request->stockQuantity;
        $product->save();
    }
     // edit product
        // probably delete color or category or subcategory

     // delete product
        // probably delete color or category or subcategory

     // see one product

     // delete review

     // edit color or category or subcategory

     public function getProducts() {
        $products = Product::all();
        return $products;
     }

}
