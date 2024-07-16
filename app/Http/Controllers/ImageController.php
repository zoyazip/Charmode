<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function storeImages($images, $productID) {
        foreach($images as $image){
            // $disk = Storage::disk('images');
            // $imageName = time().$image->getClientOriginalExtension();
            // // $disk->put($imageName, $image);
            // // Storage::disk('images')->put($imageName, $image);
            // Storage::disk('public')->put('filename.png', $image);
            // // $imageName = $path;
            // $filename = 'img.png';
            $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(base_path('public/images'), $filename);
            // $User->image = $fileName;

            $newImage = new Image;
            $newImage->url = '/images/'.$filename;
            $newImage->product_id = $productID;
            $newImage->save();
        }
    }

    public function removeImages($imageNames) {
        foreach($imageNames as $imageName){
            Storage::delete($imageName);
            // $disk = Storage::build([
            //     'driver' => 'local',
            //     'root' => storage_path().'/images/'.$productID,
            // ]);
            // $imageName = time().$image->getClientOriginalExtension();
            // $disk->put($imageName, $image);
            // $newImage = new Image;
            // $newImage->url = '/images/'.$productID.'/'.$imageName;
            // $newImage->productID = $productID;
            // $newImage->save();
        }
    }
}
