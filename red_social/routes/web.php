<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PerfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('dashboard')->group(function(){

        Route::get('', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('upload-image', [ImageController::class, 'uploadForm'])
            ->name('upload-image');

        Route::get('perfil', [PerfilController::class, 'perfil'])
            ->name('perfil');

        Route::post('uploaded', [ImageController::class, 'storeImage'])
        ->name('uploaded');

        Route::post('upload-comment', [CommentController::class, 'storeComment'])
            ->name('upload-comment');
        Route::post('delete-comment', [CommentController::class, 'deleteComment'])
            ->name('delete-comment');

        Route::get('like/{image_id}', [LikeController::class, 'like'])
            ->name('like');
        Route::get('dislike/{like_id}', [LikeController::class, 'dislike'])
            ->name('dislike');


    });


});


