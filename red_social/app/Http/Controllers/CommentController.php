<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request){
        $comment = new Comment();

        $user_id = Auth::id();
//        $image_id = $image->id;
        $comment->user_id = $user_id;
        $comment->content = $request->input('content');
        $comment->image_id = $request->input('image_id');
        $comment->save();
        return redirect()->route('dashboard');
    }

    public function deleteComment(Request $request){
        $comment = Comment::find($request->input('aBorrar'));

        if($comment === null){
            return response(
                "El comentario con id {$comment->id} no fue encontrado",
                Response::HTTP_NOT_FOUND
            );
        }
        if($comment->delete() === false){
            return response(
                "No pudo eliminarse el usuario con el id {$comment->id}",
                Response::HTTP_BAD_REQUEST
            );
        }
//        return response(["id" => $request->id, "deleted"=>true], Response::HTTP_OK);
        return redirect()->route('dashboard');
    }
}
