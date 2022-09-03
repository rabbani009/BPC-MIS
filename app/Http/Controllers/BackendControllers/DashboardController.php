<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboard(){
        //dd(Auth::user()->role->slug);
        return view('backend.pages.dashboard');
    }
}
