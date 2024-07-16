<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specification;

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
}
