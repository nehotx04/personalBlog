<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
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
    #register routes
    Route::get('signup',[UserController::class, 'register'])->name('auth.register');
    Route::post('register',[UserController::class, 'store'])->name('auth.signup');
    
    #login routes
    Route::get('login',[AuthController::class, 'login'])->name('auth.login');
    Route::post('login', [AuthController::class, 'store'])->name('auth.signin');
});

Route::get('Contactanos',[ContactController::class, 'contact'])->name('contact.index');
Route::post('Contactanos',[ContactController::class, 'store'])->name('contact.store');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts',PostController::class);
    Route::get('/logout', [AuthController::class, 'destroy'])->name('auth.logout');
    Route::post('search', [PostController::class, 'search'])->name('search.browse');
    Route::get('search', [PostController::class, 'get_search'])->name('search');
    Route::get('profile/{user}', [UserController::class, 'profile'])->name('profile');
    Route::put('profile/{user}', [UserController::class, 'edit_profile'])->name('profile.edit');
    Route::post('follow', [FollowController::class, 'follow'])->name('follow');
});
