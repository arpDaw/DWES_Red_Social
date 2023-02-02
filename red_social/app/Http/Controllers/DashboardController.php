<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Type\Integer;


class DashboardController extends Controller
{
    public function index(){
        $images = Image::orderBy('id', 'desc')->paginate(1);
        $carbon = new Carbon();
        $carbon->setlocale('ES');
        $comments = Comment::orderBy('id')->get();
        $users = User::orderBy('id')->get();
        $commentAuthor = '';
        $likes = Like::orderBy('id')->get();

        return view('dashboard', [
            'images' => $images,
            'carbon' => $carbon,
            'comments'=>$comments,
            'commentAuthor'=>$commentAuthor,
            'users'=>$users,
            'likes'=>$likes,
        ]);
    }
}
