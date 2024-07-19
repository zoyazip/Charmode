<?php

namespace App\Http\Controllers\Components;

use App\Http\Controllers\Controller;
use App\Models\Image;
use File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    //

    public function storeImages($images, $name, $productID) {
        $i = 0;
        foreach($images as $image){
            $filename = $name.$i.'.'.$image->getClientOriginalExtension();
            $image->move(base_path('public/assets/webp/products/'.$name), $filename);
            $newImage = new Image;
            $newImage->url = 'assets/webp/products/'.$name.'/'.$filename;
            $newImage->product_id = $productID;
            $newImage->save();
            // dd($newImage->url);
            $i=$i+1;
        }
    }

    public function delete(Request $request) {
        $image = Image::find($request->id);
        if(File::exists($image->url)) {
            File::delete($image->url);
        }
        $image->delete();
        return redirect()->back();
    }
}
