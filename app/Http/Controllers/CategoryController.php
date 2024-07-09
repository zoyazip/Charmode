<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function readCategories() {
        $categories = Category::all();
        return $categories;
    }

    public function readCategory(Request $request) {
        $category = Category::find($request->id);
        return $category;
    }

    public function createCategory(Request $request) {
        $category = new Category;
        $category->name = $request->name;
        $category->sub_category = $request->sub_category;
        $category->save();
        return "Success";
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