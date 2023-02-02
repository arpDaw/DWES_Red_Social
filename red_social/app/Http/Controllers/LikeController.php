<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($image_id){
        // Añade un like
        $like = new Like();
        $user_id = Auth::id();

        $like->user_id = $user_id;
        $like->image_id = $image_id;
        $like->save();
        return redirect()->route('dashboard');
    }
    public function dislike($like_id){
        // Elimina un like

        $like = Like::find($like_id);

        if($like->delete()===false){
            return response(
                "No pudo eliminarse el usuario con el id {$like->id}",
                Response::HTTP_BAD_REQUEST
            );
        }
        return redirect()->route('dashboard');
    }
}
