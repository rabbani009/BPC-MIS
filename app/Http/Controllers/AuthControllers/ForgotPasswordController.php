<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\ForgotPasswordRequest;
use App\Mail\ForgotPasswordEmail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Array_;

class ForgotPasswordController extends Controller
{
    public function __construct()
    {

    }

    /*show forgot password page*/
    public function getForgotPassword(){
        /*check if user logged in then return to dashboard*/
        if(Auth::user()){
            return redirect()->route('dashboard')
                ->with('warning', 'You are already logged in');
        }

        /*create & set common data array*/
        $common_data = new Array_();
        $common_data->title = 'Forgot password';
        $common_data->sub_title = '';
        $common_data->main_menu = '';
        $common_data->sub_menu = '';
        $common_data->current_menu = '';

        /*return view page with data*/
        return view('auth.forgot_password')
            ->with(compact('common_data'));
    }

    /*process forgot password form*/
    public function postForgotPassword(ForgotPasswordRequest $request){
        /*start database transaction*/
        DB::beginTransaction();
        try {
            /*check user email is valid or not*/
            $checkUser = User::where('email', $request->email)->first();

            /*if email is valid*/
            if (!empty($checkUser)) {

                /*create new password reset object, set data and save it*/
                $password_reset = new PasswordReset();
                $token = Auth::id().time().random_int(1000,9999).Auth::id().random_int(100,999);
                $password_reset->email = $request->email;
                $password_reset->token = $token;
                $password_reset->created_at = Carbon::now();

                $password_reset->save();

                /*send password reset email to requested user email*/
                Mail::to($request->email)->send(new  ForgotPasswordEmail($password_reset));
            } else {
                /*if user is invalid then return */
                return redirect()->back()->with('danger', 'Can\'t find your account');
            }


        } catch (\Exception $exception) {
            /*if found any exception then rollback database transaction and return back with error message*/
            DB::rollBack();
            return redirect()->back()->with('danger', 'Something went wrong.' . $exception->getMessage());
        }

        /*if everything is ok then commit database transaction and return back with success message*/
        DB::commit();
        return redirect()->back()->with('success', 'Email sent successful to your email....');
    }
}
