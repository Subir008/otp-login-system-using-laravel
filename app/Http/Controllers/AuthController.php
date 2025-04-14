<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request){
        $user = new User();

        $validator = Validator::make(
            $request->all(),
            [
            'contact' => 'required|max:10|unique',
            'email' =>'required|unique',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'fail' => $request->session()->flash('failed' , $validator->errors())
            ]);
        }


        $user = User::create([

        ]);
    }
}
