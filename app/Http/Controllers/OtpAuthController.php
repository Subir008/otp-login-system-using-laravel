<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vertificationcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OtpAuthController extends Controller
{
    //
    public function login(){
        return view('otp-login');
    }

   public function generate(Request $request){
        # Data Validate
        $validate = Validator::make(
                $request->all(),
                [
            'email' => "required|exists:users,email"
        ]);

        if( $validate->fails()){
            return back()->with('error',$validate->errors()->first());
        }

        # Generate Otp
        $verificationCode = $this->generateOtp($request->email);

        $successMsg = "Your OTP is : " . $verificationCode->otp ;
        # Return Otp
        return redirect()->route('otpVerification')->with('success', $successMsg);

    }

    public function generateOtp ($email){
        $user = User::where('email' , $email)->first();
        
        $verificationCode = Vertificationcode::where('user_id' , $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        $code = Vertificationcode::create([
            'user_id' => $user->id,
            'otp' => rand(12345 , 99999),
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);

        return $code;
    }

    public function verification(){
        return view('otp-verification');
    }

}
