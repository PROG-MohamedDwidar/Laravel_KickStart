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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



// Route::get('/',[UserController::class, 'home']);

// ---------------------------user----------------------------------------------
Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::get('users/create',[UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users',[UserController::class, 'store'])->name('users.store');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('users/{id}/detail', [UserController::class, 'details'])->name('users.details');

// ---------------------------post----------------------------------------------
Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/deletedPosts',[PostController::class, 'restore'])->name('posts.restore');
Route::put('/deletedPosts/{id}',[PostController::class, 'restore4real'])->name('posts.restore4real');


Route::get('posts/{id}/view', [PostController::class, 'view'])->name('posts.view');
// route::get('/register',function(){
//     return view('auth/register');
// })->name('users.register');
Route::get('/logout',[UserController::class, 'logout'])->name('users.logout');

Route::fallback(function () {
    return 'This is the fallback route';
    });