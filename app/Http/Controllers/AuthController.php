<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup(Request $request){
        echo "<pre>";
        echo $request;
        echo "</pre>";
    }
}
