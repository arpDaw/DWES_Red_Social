<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function usuarios(){
        $users = User::orderBy('id')->get();
        $solicitudesPendientes = auth()->user()->getPendingFriendships();

        return view('usuarios', [
            'users' => $users,
            'solicitudes' => $solicitudesPendientes
        ]);
    }
    public function viewUser($user_id){
        $carbon = new Carbon();
        $user = User::find($user_id);


        $images = Image::orderBy('id')->where('user_id', '=', $user_id)->get();

        return view('viewUser', [
            'images' => $images,
            'user' => $user,
            'carbon' => $carbon
        ]);

    }
    public function search(Request $request){
    $users = User::orderBy('name')->where('username', 'LIKE', '%'. $request->user. '%')
        ->orWhere('name', 'LIKE', '%'. $request->user. '%')
        ->orWhere('surname', 'LIKE', '%'. $request->user. '%')
        ->get();
    return view('usuarios', [
        'users'=> $users
    ]);

    }

    public function addFriend(Request $request){

        $user_id = $request->input('friend');
        $recipient = User::find($user_id);

        auth()->user()->befriend($recipient);

        $users = User::orderBy('id')->get();
        return redirect()->route('usuarios');
    }

    public function cancelRequest(Request $request){

        $solicitud = $request->input('solicitud');


    }

    public function acceptFriend(Request $request){

        $user_id = $request->input('sender');
        $sender = User::find($user_id);

        auth()->user()->acceptFriendRequest($sender);

        $images = Image::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $carbon = new Carbon();
        $solicitudesPendientes = auth()->user()->getPendingFriendships();
        $usuarios = User::orderBy('id')->get();
        return view('perfil', [
            'usuarios' => $usuarios,
            'images' => $images,
            'carbon' => $carbon,
            'solicitudes' => $solicitudesPendientes,
        ]);
    }

    public function denyFriend(Request $request){
        $sender_id = $request->input('sender');
        $sender = User::find($sender_id);
        auth()->user()->denyFriendRequest($sender);
        return redirect()->route('perfil');
    }

}
