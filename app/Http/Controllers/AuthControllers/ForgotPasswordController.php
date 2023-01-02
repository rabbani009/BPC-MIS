<?php

namespace App\Http\Controllers\AuthControllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use PhpParser\Node\Expr\Array_;
use App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use Symfony\Component\HttpFoundation\Request;


class ForgotPasswordController extends Controller
{
    public function __construct()
    {

    }

    public function getForgotPassword(){

        return view('auth.forgot_password');

    }

    public function postForgotPassword(ForgotPasswordRequest $request)

        {
            $request->validate([
                'email' => 'required|email|exists:users',
            ]);
    
            $token = Str::random(64);
    
            DB::table('password_resets')->insert([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => Carbon::now()
              ]);
    
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
    
            return back()->with('message', 'We have e-mailed your password reset link!');
        }



      public function getResetPassword($token) 
      
      { 
        // dd($token);
         return view('auth.reset_password', ['token' => $token]);

      }


    public function postResetPassword(ResetPasswordRequest $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email, 
                              'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('success', 'Your password has been changed!');
    }




}
