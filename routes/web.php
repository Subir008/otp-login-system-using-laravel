<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpAuthController;
use Illuminate\Support\Facades\Route;


Route::view('signup', 'signup')->name('signup');
Route::view('login', 'login')->name('login');
Route::view('otp-login', 'otp-login')->name('otplogin');
Route::view('home' , 'home')->name('home');


Route::controller(AuthController::class)->group(function () {
    Route::post('signup' , 'signup')->name('signup');
    Route::get('logout', 'logout')->name('logout');

});
