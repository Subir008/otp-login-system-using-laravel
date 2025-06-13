<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class AuthController extends Controller
{

    // Sign up page redirect
    public function signup_pg(){
        return view('signup');
    }

    // Login page redirect
    public function login_pg(){
        return view('login');
    } 

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
            'password' => 'required|min:5'
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
                'password' => 'required'
            ]
        );

        if($validate->fails()){
            return redirect('login')
                ->withInput()
                ->withErrors($validate);
        }else if($validate->passes()){
            if(Auth::attempt(['email' => $request->email , 'password' => $request->password])){
                $log_user = User::where('email' , $request->email)->first();
                $request->session()->put('login','loggedin');
                Auth::login($log_user);
                return redirect('home')
                    ->with('success', 'Login Successfull');
            }else{
                return redirect('login')
                        ->with('fail', 'Wrong Credentials');
            }
        }

    }

    // Logout functionality
    public function logout(){
        Auth::logout();
        Session::pull('login');
        return redirect('login');
    }

    // Home page redirect
    public function home(){
        return view('home');
    }

}
