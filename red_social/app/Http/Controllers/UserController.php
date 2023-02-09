<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function usuarios(){
        $users = User::orderBy('id')->get();
        return view('usuarios', [
            'users' => $users
        ]);
    }
    public function gente(){

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
