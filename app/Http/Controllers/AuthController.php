<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // User signup process
    public function signup(Request $request){
        $user = new User();

        // Validation Checking
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|min:4',
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

        // Create new user
        $user = User::create([
            'name' => $request->input('name'),
            'contact_no' => $request->input('contact_no'),
            'email' => $request->input('email'),
            'password' => Hash::make( $request->input('password')),
        ]);

        return redirect('login');
    }

    public function login(Request $request){

        // Data validation
        $validate =  Validator::make(
            $request->all(),
            [
                'email' => 'required|email' ,
                'password' => 'required|min:5'
            ]
        );

        if($validate->fails()){
            return redirect('login')
                ->withInput()
                ->withErrors($validate);
        }



    }

    public function logout(){
        return redirect('login');
    }

}
