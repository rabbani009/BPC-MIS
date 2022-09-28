<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['logged']);
    }

    /*show login form*/
    public function getLogin(){
        $commons['title'] = 'Login';
        $commons['sub_title'] = 'Login';
        $commons['main_menu'] = 'Login';
        $commons['sub_menu'] = 'Login';
        $commons['current_menu'] = 'Login';

        return view('auth.login')
            ->with(compact('commons'));
    }

    public function postLogin(LoginRequest $request){
        $valid_credentials = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
            'status' => 1
        ];

        if (Auth::attempt($valid_credentials, $request->remember_me)){
            return redirect()->route('get.dashboard')
                ->with('success', 'You are successfully logged in.');
        }

        return redirect()->route('get.login')
            ->with('failed', 'Wrong password!!!')->withInput($request->all());

    }
}
