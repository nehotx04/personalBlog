<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['guest']], function() {
    /*ADD HERE THE GUEST ROUTES*/
    Route::get('Contactanos',[ContactController::class, 'contact'])->name('contact.index');
    Route::post('Contactanos',[ContactController::class, 'store'])->name('contact.store');
    #register routes
    Route::get('signup',[UserController::class, 'register'])->name('auth.register');
    Route::post('register',[UserController::class, 'store'])->name('auth.signup');
    
    #login routes
    Route::get('login',[AuthController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthController::class, 'store'])->name('auth.signin');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts',PostController::class);
    Route::get('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
});
