<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function uploadForm(){
        return view('upload-image');
}
    public function showUpForm(){

    }
    public function storeImage(Request $request){
        $image_path = $request->file('image');

        $user_id = Auth::id();
        $image = new Image();
        $image->user_id = $user_id;
        $image->description = $request->input('description');


        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();
            $image->image_path = $image_path_name;
                Storage::disk('images_rrss')->put($image_path_name, File::get($image_path));
            $image->save();
        }
        return redirect()->route('upload-image');

    }
    public function deleteImage($image_id){

        $target = Image::where('id', $image_id);

        if($target->delete()===false){
            return response(
                "No pudo eliminarse el usuario con el id {$target->id}",
                Response::HTTP_BAD_REQUEST
            );
        }
        return redirect()->route('perfil');
    }
}
