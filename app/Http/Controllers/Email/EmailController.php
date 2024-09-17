<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordEmail;

class EmailController extends Controller
{
    public function sendForgotPasswordEmail($email){
        $toEmail = $email;
        $message = "Hello this email form pharmacy mgmnt system";
        $subject = "Reset new Passwrod";
        $rendomPassword =  Str::password(12, symbols:true);

        Mail::to($toEmail)->send(new ForgotPasswordEmail($message, $subject, $rendomPassword));

        return redirect()->route('login');
    }
}
