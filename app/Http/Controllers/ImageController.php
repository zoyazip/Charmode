<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use File;

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
            // dd($images);
            $newImage = new Image;
            $newImage->url = '/images/'.$filename;
            $newImage->product_id = $productID;
            $newImage->save();
        }
    }

    // public function removeImages($imageNames) {
    //     foreach($imageNames as $imageName){
    //         Storage::delete($imageName);
    //     }
    // }

    public function delete(Request $request) {
        //
        $image = Image::find($request->id);
        // dd($image);
        if(File::exists($image->url)) {
            File::delete($image->url);
            // unlink($image->url);
        }
        $image->delete();
        return redirect()->back();
    }
}
