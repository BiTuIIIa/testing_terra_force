<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\XhrPostController;
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
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
    Route::get('/registration', [RegistrationController::class, 'index'])->name('index.registration');
    Route::post('/registration',[RegistrationController::class, 'registration'])->name('registration');
});


Route::middleware(['auth'])->group(function () {
    Route::name('user.')->group(function () {
        Route::view('home', 'home')->name('home');
    });
    Route::resource('posts', PostController::class);

    Route::group(['prefix' => 'xhr'], function() {
        Route::get('/posts/', [XhrPostController::class, 'index']);
    });
});
