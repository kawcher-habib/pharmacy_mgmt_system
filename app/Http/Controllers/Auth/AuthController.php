<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Get Login Form
    public function loginForm()
    {
        return view('auth.login');
    }

    //Login Submit Form
    public function loginSubmit(Request $request)
    {
        dd($request);
    }

    //Forgot Password
    public function forgotpass()
    {
        return view('auth.forgotpassword');
    }

    //Get Register Form
    public function register()
    {
        return view('auth.register');
    }

    // Registration Submit 
    public function registerSubmit(Request $request)
    {
        dd($request);
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try {

            User::create([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => 1
            ]);
            return redirect()->route('/login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Pleaser try again']);
        }
    }
}
