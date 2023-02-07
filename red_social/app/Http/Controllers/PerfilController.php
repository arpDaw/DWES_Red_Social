<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PerfilController extends Controller
{
    public function perfil(){
        $images = Image::orderBy('id', 'desc')->get();
        $carbon = new Carbon();

        return view('perfil', [
        'images' => $images,
            'carbon' => $carbon,
        ]);
    }
}
