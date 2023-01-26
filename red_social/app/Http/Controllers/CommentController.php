<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
}
