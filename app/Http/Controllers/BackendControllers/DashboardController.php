<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\Council;


class DashboardController extends Controller
{
    public function __construct(){

    }

    public function getDashboard(){
        $commons['page_title'] = 'Dashboard';
        $commons['content_title'] = 'Show dashboard';
        $commons['main_menu'] = 'dashboard';
        $commons['current_menu'] = 'dashboard';

        $users = User::where('status', 1)->where('user_type', '!=', 'system')->count() ?? 0;

        $programs = Program::count() ?? 0;

        $councils = Council::count() ?? 0;



        return view('backend.pages.dashboard', compact('commons',
        'users','programs','councils'));
    }















}
