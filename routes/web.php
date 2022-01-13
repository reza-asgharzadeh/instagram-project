<?php

use App\Http\Controllers\FollowsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
    return view('profiles.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::get('/profile/{user}', [ProfileController::class,'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class,'update'])->name('profile.update');

    Route::get('/post/create', [PostController::class,'create'])->name('post.create');
    Route::post('/post', [PostController::class,'store'])->name('post.store');
    Route::get('/post/{post}', [PostController::class,'show'])->name('post.show');

    Route::post('follow/{user}', [FollowsController::class,'store']);
});

Auth::routes();
