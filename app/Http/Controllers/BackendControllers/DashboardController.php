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
        $commons['page_title'] = 'Dashboard';
        $commons['content_title'] = 'Show dashboard';
        $commons['main_menu'] = 'dashboard';
        $commons['current_menu'] = 'dashboard';

        return view('backend.pages.dashboard', compact('commons'));
    }
}
