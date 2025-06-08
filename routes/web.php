<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpAuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    
    Route::get('/' , function(){
        return redirect('login');
    });
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login_pg')->name('login');
        Route::get('signup', 'signup_pg')->name('signup');
        Route::post('signup' , 'signup')->name('signup');
        Route::post('login' , 'login')->name('login');
    });
    
});

// 
Route::group(['middleware' => 'auth'] , function(){
    Route::get('home' , 'home')->name('home');

    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});

// Otp Handling Controller
Route::controller(OtpAuthController::class)->group(function(){
    Route::get('otp-login', 'login')->name('otplogin');
    Route::post('otp-generate','generate')->name('generate');
    Route::get('otp-verification/{user_id}'  , 'verification')->name('otpVerification');
    Route::post('otp-verify' , 'loginWithOtp')->name('otpVerify');
});

// Error page redirect
Route::fallback(function(){
    return view('error');
});