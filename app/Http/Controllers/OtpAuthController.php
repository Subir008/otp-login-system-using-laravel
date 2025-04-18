<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vertificationcode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return redirect()->route('otpVerification', ['user_id' => $verificationCode->user_id])->with('success', $successMsg);

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

    public function verification($user_id){
        return view('otp-verification')->with([
            'user_id' => $user_id
        ]);
    }

    public function loginWithOtp(Request  $request){
        Validator::make(
            $request->all(),
            [
                'user_id' => 'required|exists:users,id',
                'otp' => 'required'
            ]);

            #
            $verificationCode = Vertificationcode::where('user_id' , $request->user_id)->where('otp' , $request->otp)->first();

            $now = Carbon::now();

            if(!$verificationCode){
                return redirect()->back()->with('error' , 'Wrong OTP !!!!!!');
            }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
                return redirect()->route('otplogin')->with('error' , 'Your OTP is Expired.');
            }

            $user = User::whereId($request->user_id)->first();

            if($user){
                $verificationCode->destroy($user->id);
                Auth::login($user);
                return redirect('home');
            }

            return redirect()->route('otplogin')->with('error' , 'Wrong OTP !!!!!!');


    }

}
