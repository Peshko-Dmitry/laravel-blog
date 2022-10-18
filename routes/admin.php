<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Models\Post;
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
Route::get('/',[AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('login_process',[AdminAuthController::class, 'login'])->name('login_process');

Route::middleware('guest:admin')->group(function (){
    

});
Route::middleware('auth:admin')->group(function (){
    Route::resource('posts', AdminPostController::class);
    Route::get('logout',[AdminAuthController::class, 'logout'])->name('logout');
    Route::post('posts/{id}/edit_process',[AdminPostController::class, 'edit_process'])->name('posts.edit_process');
    Route::get('index',[AdminAuthController::class, 'index'])->name('index');
    Route::get('edit',[AdminAuthController::class, 'showEdit'])->name('edit');
    Route::post('edit_process',[AdminAuthController::class, 'edit'])->name('edit_process');

});