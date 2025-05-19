<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpAuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    
    Route::view('signup', 'signup')->name('signup');
    Route::view('login', 'login')->name('login');

    Route::controller(AuthController::class)->group(function () {
        Route::post('signup' , 'signup')->name('signup');
        Route::post('login' , 'login')->name('login');
    });
    
});

Route::group(['middleware' => 'auth'] , function(){
    Route::view('home' , 'home')->name('home');

    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});


Route::controller(OtpAuthController::class)->group(function(){
    Route::get('otp-login', 'login')->name('otplogin');
    Route::post('otp-generate','generate')->name('generate');
    Route::get('otp-verification/{user_id}'  , 'verification')->name('otpVerification');
    Route::post('otp-verify' , 'loginWithOtp')->name('otpVerify');
});