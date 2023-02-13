<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{

    public function usuarios(){
        $users = User::orderBy('id')->get();
        return view('usuarios', [
            'users' => $users
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
}
