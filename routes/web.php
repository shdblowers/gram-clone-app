<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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

Auth::routes();

Route::get('/profile/{user}', [Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}/edit', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/post/create', [Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post', [Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.show');
