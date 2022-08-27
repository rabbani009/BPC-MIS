<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {

    }

    /*show login form*/
    public function getLogin(){
        /*check if user logged in then return to dashboard*/
//        if(Auth::user()){
//            return redirect()->route('dashboard')
//                ->with('warning', 'You are already logged in');
//        }

        $common_data['title'] = 'Login';
        $common_data['sub_title'] = 'Login';
        $common_data['main_menu'] = 'Login';
        $common_data['sub_menu'] = 'Login';
        $common_data['current_menu'] = 'Login';

        return view('auth.login')
            ->with(compact('common_data'));
    }

    /*process login form*/
    public function postLogin(LoginRequest $request){
        /*set user credentials as array*/
        if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {

            $login_credentials = [
                'email' => $request->username,
                'password' => $request->password,
                'status' => 1,
                'deleted' => 0
            ];
        } else {
            $login_credentials = [
                'username' => $request->username,
                'password' => $request->password,
                'status' => 1,
                'deleted' => 0
            ];
        }


        /*check if user data is valid*/
        if (Auth::attempt($login_credentials, $request->remember)) {
            // Authentication passed...
            return redirect()->route('dashboard')
                ->with('success', 'You are successfully logged in.');
        }

        /*if user data is invalid then return redirect back with error message and input*/
        return redirect()->route('login')
            ->with('failed', 'Wrong Password Or User not activated/Deleted yet!')->withInput($request->all());
    }
}
