<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    public function index(){
        $images = Image::orderBy('id', 'desc')->paginate(1);
        $carbon = new Carbon();
        $comments = Comment::orderBy('id')->get();

        return view('dashboard', [
            'images' => $images,
            'carbon' => $carbon,
            'comments'=>$comments
        ]);
    }
}
