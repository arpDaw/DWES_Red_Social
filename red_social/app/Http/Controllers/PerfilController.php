<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil(){
        $images = Image::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $carbon = new Carbon();

        return view('perfil', [
        'images' => $images,
            'carbon' => $carbon,
        ]);
    }
}
