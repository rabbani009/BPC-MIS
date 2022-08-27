<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PhpParser\Node\Expr\Array_;
use App\Http\Requests\AuthRequests\RegisterRequest;
use Webpatser\Countries\Countries;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function __construct()
    {

    }

    /*show register form*/
    public function getRegister(){
        /*check if user logged in then return to dashboard*/
        if(Auth::user()){
            return redirect()->route('dashboard')
                ->with('warning', 'You are already logged in');
        }

        /*create & set common data array*/
        $common_data = new Array_();
        $common_data->title = 'Register';
        $common_data->sub_title = '';
        $common_data->main_menu = '';
        $common_data->sub_menu = '';
        $common_data->current_menu = '';

        /*fetch all countries*/
        $countries = Countries::all();

        /*return register page with data*/
        return view('auth.user_register')
            ->with(compact('common_data', 'countries'));
    }

    /*process register form*/
    public function postRegister(RegisterRequest $request){

        /*create new store object and set data */
        $store = new Store();
        $store->name = $request->store_name;
        $store->contact = $request->contact;
        $store->subscription_id = 1; //1=free
        $store->subscribed_at = Carbon::now();
        $store->currency = $request->currency;
        $store->status = 1;
        $store->created_at = Carbon::now();

        /*save a store*/
        if($store->save()){

            /*create new user object and set data*/
            $user = new User();
            $user->store_id = $store->id;
            $user->role_id = 2; // 2=store-admin
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->status = 1;
            $user->created_at = Carbon::now();

            /*save user*/
            if($user->save()){
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => 1], $request->remember)) {
                    // The user is active, not suspended, and exists.
                    return redirect()->route('dashboard')
                        ->with('success', 'You have successfully registered an created your store');
                } else {
                    // The user is not activated, suspended, and not exists.
                    return redirect()->route('login')
                        ->with('error', 'The user is not activated/suspended/not exists');
                }
            }

            return redirect()->route('register')
                ->with('error', 'Store created but user not created.');

        }

        return redirect()->route('register')
            ->with('error', 'Register store operation failed.s');
    }
}
