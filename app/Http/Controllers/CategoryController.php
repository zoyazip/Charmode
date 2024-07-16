<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function readCategories() {
        $categories = Category::all();
        return view('web.layout.header')->with(["categories" => $categories]);
    }

    public function readCategory(Request $request) {
        $category = Category::find($request->id);
        return $category;
    }

    public function createCategory($name) {
        $category = new Category;
        $category->name = $name;
        $category->save();
        return $category->id;
    }

    public function updateCategory(Request $request) {
        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name,
            'sub_category' => $request->sub_category,
        ]);
        return "Success";
    }

    public function deleteCategory(Request $request) {
        $category = Category::find($request->id);
        $category->delete();
        return "Success";
    }
}
