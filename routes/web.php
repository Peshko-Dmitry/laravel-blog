<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('news', [PostController::class, 'allNews'])->name('news');
Route::get('news/{id}', [PostController::class, 'oneNews'])->name('one_news');
Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::post('contact_form_process', [ContactController::class, 'contact_form'])->name('contact_form_process');


Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('news/comment/{id}', [PostController::class, 'comment'])->name('comment');

});
Route::middleware('guest')->group(function(){
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login_process', [AuthController::class, 'login'])->name('login_process');
    
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register_process', [AuthController::class, 'register'])->name('register_process');

    Route::get('forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('forgot_process', [AuthController::class, 'forgot'])->name('forgot_process');   
});

