<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;
use App\Http\Requests\AuthRequests\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function __construct()
    {

    }

    /*show reset password form*/
    public function getResetPassword(Request $request)
    {
        /*check if user logged in then return to dashboard*/
        if (Auth::user()) {
            return redirect()->route('dashboard')
                ->with('warning', 'You are already logged in');
        }

        /*if token is invalid*/
        if (!isset($request->token)) {
            return redirect()->route('reset.password')->with('failed', 'Invalid Token');
        }

        /*get token column*/
        $checkToken = PasswordReset::where('token', $request->token)->first();
        if (empty($checkToken)) {
            return redirect()->route('forgot.password')->with('failed', 'Invalid Token');
        }

        /*check token is created in 1 hour or not*/
        if ($checkToken->created_at < Carbon::now()->subHour()) {
            return redirect()->route('forgot.password')->with('failed', 'Your Token has been expired.');
        }

        /*check user email is valid or not*/
        $user = User::where('email', $checkToken->email)->first();
        if (empty($user)) {
            return redirect()->route('forgot.password')->with('failed', 'Invalid User');
        }

        /*check user is deleted or not*/
        if ($user->deleted == 1) {
            return redirect()->route('forgot.password')->with('failed', 'Your Account has been deleted');
        }

        /*check user is active or not*/
        if ($user->status == 0) {
            return redirect()->route('forgot.password')->with('failed', 'In-Active Account');
        }

        /*create & set common data array*/
        $common_data = new Array_();
        $common_data->title = 'Reset Password';
        $common_data->sub_title = '';
        $common_data->main_menu = '';
        $common_data->sub_menu = '';
        $common_data->current_menu = '';

        return view('auth.reset_password')
            ->with(compact('common_data', 'checkToken'));
    }

    /*process reset password form*/
    public function postResetPassword(ResetPasswordRequest $request)
    {
        DB::beginTransaction();

        try {

            /*check token is available or not*/
            $checkToken = PasswordReset::where('token', $request->reset_token)->first();
            if (empty($checkToken)) {
                return redirect()->route('forgot.password')->with('failed', 'Invalid Token');
            }

            /*check token is created in 1 hour or not*/
            if ($checkToken->created_at < Carbon::now()->subHour()) {
                return redirect()->route('forgot.password')->with('failed', 'Your Token has been expired.');
            }

            /*check user email is valid or not*/
            $user = User::where('email', $checkToken->email)->first();
            if (empty($user)) {
                return redirect()->route('forgot.password')->with('failed', 'Invalid User');
            }

            /*check user is deleted or not*/
            if ($user->deleted == 1) {
                return redirect()->route('forgot.password')->with('failed', 'Your Account has been deleted');
            }

            /*check user is active or not*/
            if ($user->status == 0) {
                return redirect()->route('forgot.password')->with('failed', 'In-Active Account');
            }

            $user->password = bcrypt($request->password);

            $user->save();
            PasswordReset::where('token', $request->reset_token)->delete();

        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('failed', 'Something went wrong.' . $exception->getMessage());
        }

        DB::commit();
        return redirect()->route('login')->with('success', 'Password reset successfully completed....');
    }
}
