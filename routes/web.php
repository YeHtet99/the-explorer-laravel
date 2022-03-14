<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;

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

Route::get('/',[PageController::class,'index'])->name('index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('post.detail');
Route::get('job-test',[PageController::class,'jobtest']);

Auth::routes(['verify'=>true]);


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('post',\App\Http\Controllers\PostController::class);
    Route::resource('comment',\App\Http\Controllers\CommentController::class);
    Route::resource('gallery',\App\Http\Controllers\GalleryController::class);
    Route::get('edit-Profile',[HomeController::class,'editProfile'])->name('edit-Profile');
    Route::post('update-Profile',[HomeController::class,'updateProfile'])->name('update-Profile');
    Route::get('change-Password',[HomeController::class,'changePassword'])->name('change-Password');
    Route::post('update-Password',[HomeController::class,'updatePassword'])->name('update-Password');




