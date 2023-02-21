<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function perfil(){
        $images = Image::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $usuarios = User::orderBy('id')->get();
        $carbon = new Carbon();
        $solicitudesPendientes = auth()->user()->getPendingFriendships();
        $amigos = auth()->user()->getFriends();

        return view('perfil', [
            'images' => $images,
            'carbon' => $carbon,
            'solicitudes' => $solicitudesPendientes,
            'usuarios' => $usuarios,
            'amigos' => $amigos

        ]);
    }
}
