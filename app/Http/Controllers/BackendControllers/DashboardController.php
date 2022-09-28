<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function __construct(){

    }

    public function getDashboard(){
        $commons['page_title'] = 'Dashboard';
        $commons['content_title'] = 'Show dashboard';
        $commons['main_menu'] = 'dashboard';
        $commons['current_menu'] = 'dashboard';

        return view('backend.pages.dashboard', compact('commons'));
    }
}
