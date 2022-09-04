<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Council;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getDashboard(){
        //dd(Auth::user()->role);
        $commons['page_title'] = '';
        $commons['page_sub_title'] = '';
        $commons['main_menu'] = '';
        $commons['current_menu'] = '';

        return view('backend.pages.dashboard', compact('commons'));
    }
}
