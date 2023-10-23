<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FollowingsPostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::redirect('login', 'auth/create')->name('login');

Route::resource('auth', AuthController::class)
    ->only(['create', 'store', 'destroy']);

Route::resource('register', RegisterController::class)
    ->only(['create', 'store']);

Route::get('likes', [LikeController::class, 'index'])->middleware('auth')->name('likes.index');

Route::get('followings-posts', [FollowingsPostController::class, 'index'])->middleware('auth')->name('following-posts.index');