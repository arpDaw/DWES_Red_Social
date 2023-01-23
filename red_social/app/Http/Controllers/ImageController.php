<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showUpForm(){

    }
    public function storeImage(Request $request){
        $image_path = $request->file('image');
        $titulo = $request->file('titulo');
        $user = \Auth::user();

        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $titulo;

        if($image_path){
            $image_path_name = time().$image_path;
            Storage::disk('images')->put($image_path_name, File::get($image_path));
        }


    }
    public function showImages(){

    }
}
