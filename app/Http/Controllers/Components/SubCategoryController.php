<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    //

    public function createSubCategory($subcategory, $category) {
        $newSubCategory = new SubCategory;
        $newSubCategory->name = $subcategory;
        $newSubCategory->category_id = $category;
        $newSubCategory->save();
        return $newSubCategory->id;
    }
}
