<?php

namespace App\Http\Controllers;

use App\Mail\Otp_Verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    // Sending otp to the mail with the help of mailer class
    public function send_mail( $email, $otp){
        $to = $email;

        Mail::to($to)->send(new Otp_Verify($otp));
    }
}
