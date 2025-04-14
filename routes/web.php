<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('signup', 'signup')->name('signup');
Route::view('login', 'login')->name('login');
Route::view('otp-login', 'otp-login')->name('otplogin');


Route::controller(AuthController::class)->group(function () {
    Route::post('signup' , 'signup');

});
