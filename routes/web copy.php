<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

// Route::get('/index', function () {
//     return view('index');
// })->name('index');
// Route::get('/create', function () {
//     return view('create');
// })->name('create');

// Route::post('edit/{id}', function ($id) {
//     return view('update', ['id' => $id]);
// });
// ('/edit/{id}',[UserController::class, 'edit'])->where('id','[0-9]+');

Route::get('/',[UserController::class, 'home'])->name('welcome');

// ---------------------------user----------------------------------------------
Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::get('users/create',[UserController::class, 'create'])->name('users.create');
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}/detail', [UserController::class, 'details'])->name('users.details');

// ---------------------------post----------------------------------------------
Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('posts/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/deletedPosts',[PostController::class, 'restore'])->name('posts.restore');
Route::put('/deletedPosts/{id}',[PostController::class, 'restore4real'])->name('posts.restore4real');