<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function forgotpass(){
        return view('auth.forgotpassword');
    }
    public function register(){
        return view('auth.register');
    }
}
