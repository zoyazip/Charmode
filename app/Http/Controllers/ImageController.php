<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use File;

class ImageController extends Controller
{
    //

    public function storeImages($images, $name, $productID) {
        foreach($images as $image){
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(base_path('public/assets/webp/products/'.$name), $filename);
            $newImage = new Image;
            $newImage->url = 'assets/webp/products/'.$name.'/'.$filename;
            $newImage->product_id = $productID;
            $newImage->save();
            // dd($newImage->url);
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
