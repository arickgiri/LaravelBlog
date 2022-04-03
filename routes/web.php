<?php

use App\Http\Controllers\PostController;
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
    return view('layouts.index');
});

Auth::routes();


Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('post');
Route::get('/blog/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create.post');
Route::post('/blog', [\App\Http\Controllers\PostController::class, 'store'])->name('store.post');
Route::get('/blog/show/{slug}' , [PostController::class , 'show'])->name('post.show');
Route::get('/blog/edit/{slug}' , [PostController::class , 'edit'])->name('post.edit');
Route::post('/blog/edit/{slug}' , [PostController::class , 'update'])->name('post.update');
Route::post('/blog/delete/{slug}' , [PostController::class , 'delete'])->name('post.delete');
Route::get('/blog/delete/{id}' , [PostController::class , 'delete'])->name('post.delete');



