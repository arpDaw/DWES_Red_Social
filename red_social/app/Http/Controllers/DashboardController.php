<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){
        $images = Image::orderBy('id', 'desc')->get();

        return view('dashboard', [
            'images' => $images
        ]);
    }
}
