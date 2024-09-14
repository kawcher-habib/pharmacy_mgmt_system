<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Email\EmailController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected  $forgotPasswordEmailSending;

    public function __construct(EmailController $forgotPasswordEmailSending){
        $this->forgotPasswordEmailSending = $forgotPasswordEmailSending;
    }


    //Get Login Form
    public function loginForm()
    {
        return view('auth.login');
    }

    //Login Submit Form
    public function loginSubmit(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()], 400);
        }

        $user = User::where('email', $request->email)->first();

        if ($user->status == 'pending' &&  !empty($user)) {


            if ($user && Hash::check($request->password, $user->password) && $user->role == 1) {
           
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('login')->with(['error' => "Email or Password is incorrect"]);
            }
        } else {
            return redirect()->back()->with(['error' => "Your account is $user->status"]);
        }
    }

    //Forgot Password
    public function forgotpass()
    {
        return view('auth.forgotpassword');
    }
    public function forgotPassSubmit(Request $request){

        //Get Proveding Email
        $request->validate([
            'email'=> 'required',

        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();
        if($user){

            // Send new rendom password by email
            $emailSender = new EmailController();
            return $emailSender->sendForgotPasswordEmail($email);

        }else{
            return redirect()->back()->with(['error'=> "Email not founde in this systme"]);
        }

        

    }

    //Get Register Form
    public function register()
    {
        return view('auth.register');
    }

    // Registration Submit 
    public function registerSubmit(Request $request)
    {

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
            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong. Pleaser try again']);
        }
    }
}
