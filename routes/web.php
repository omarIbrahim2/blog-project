<?php

use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use GuzzleHttp\Middleware;

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


Auth::routes();

Route::group(['prefix' => '/' , "middleware" => ['auth']] , function(){
    
    Route::get('' , [HomeController::class , 'home'])->name('home');

    Route::get('add/post' , [PostsController::class , 'create'])->name('add-post');

    Route::get('post/{postId}' ,[PostsController::class , 'show'])->name('single-post');
    
    Route::post('add/post' , [PostsController::class , 'save'])->name('add-post');
     
    Route::get('edit/post/{postId}' , [PostsController::class , 'edit'])->name('edit-post');

    Route::post('edit/post' , [PostsController::class , 'update'])->name('update-post');

    Route::get('post/delete/{postId}' , [PostsController::class , 'delete'])->name('delete-post');

    Route::post('add/comment' , [CommentsController::class , 'save'])->name('add-comment');

    Route::post('edit/comment' , [CommentsController::class , 'update'])->name('comment-update');

    Route::get('commwnt/delete/{commentId}' , [CommentsController::class , 'delete'])->name('delete-comment');

});