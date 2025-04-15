<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request){
        $user = new User();

        // Validation Checking
        $validator = Validator::make(
            $request->all(),
            [
            'contact_no' => 'required|max:10|unique:users',
            'email' =>'required|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            // Storing the value of the user input
            $contact = $validator->errors()->first('contact_no');
            $password = $validator->errors()->first('password');
            $email = $validator->errors()->first('email');

            // If error occurs return the error for that particular field
            $request->session()->flash('contact' , $contact);
            $request->session()->flash('email' , $email);
            $request->session()->flash('password' , $password);

            // Returning with the user input
            return back()->withInput();
        }


        $user = User::create([

        ]);
    }
}
