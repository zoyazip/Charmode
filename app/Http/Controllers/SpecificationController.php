<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specification;

use Illuminate\Support\Facades\DB;

class SpecificationController extends Controller
{
    //

    public function createSpecification($keys, $values, $productID) {
        for ($x = 0; $x < sizeof($keys); $x++) {
            $specification = new Specification;
            $specification->key = $keys[$x];
            $specification->value = $values[$x];
            $specification->product_id = $productID;
            $specification->save();
        }
    }

    public function deleteSpecification($product_id) {
        $specifications = DB::table('specifications')
            ->where('product_id', '=', $product_id)
            ->delete();
            // dd()
        // foreach($specifications as $specification) {
        //     $specification->delete();
        // }
    }
}
