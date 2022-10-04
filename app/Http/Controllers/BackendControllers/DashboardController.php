<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\Council;
use App\Models\Trainee;
use App\Models\Trainer;

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

        $trainees_male = Trainee::where('gender','male')->count() ?? 0;

        $trainees_female = Trainee::where('gender','female')->count() ?? 0;

        $trainees_others = Trainee::where('gender','others')->count() ?? 0;

        $trainees_total = Trainee::count() ?? 0;

        $trainer  = Trainer::count() ?? 0;

        $male_trainer = Trainer::where('gender','=','male')->count() ?? 0;

        $female_trainer = Trainer::where('gender','=','female')->count() ?? 0;


        return view('backend.pages.dashboard', compact('commons',
        'users','programs','councils','trainees_male','trainees_female','trainees_others','trainees_total','trainer','male_trainer','female_trainer'));
        }


}
