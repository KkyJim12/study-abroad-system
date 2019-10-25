<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Reference;

class ImageController extends Controller
{
    public function ImageUpload(Request $request) {

        

        $image = $request->file('file');
        $imageName = uniqid().$image->getClientOriginalName();
        $image = Storage::disk('local')->put($imageName, 'Contents');
        $imageUpload = new Image;
        $imageUpload->name = $imageName;
        $imageUpload->ref = uniqid();
        $imageUpload->save();
        

        return response()->json($imageUpload);
    }
}
