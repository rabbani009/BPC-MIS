<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\Council;
use App\Models\Trainee;
use App\Models\Trainer;
use App\Models\Activity;
use App\Models\Association;


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

        $activity = Activity::where('status', 1)->count() ?? 0;

        $councils = Council::count() ?? 0;

        $trainees_male = Trainee::where('status', 1)->where('gender','male')->count() ?? 0;

        $trainees_female = Trainee::where('status', 1)->where('gender','female')->count() ?? 0;

        $trainees_others = Trainee::where('status', 1)->where('gender','others')->count() ?? 0;

        $trainees_total = Trainee::where('status', 1)->count() ?? 0;

        $trainer  = Trainer::where('status', 1)->count() ?? 0;

        $male_trainer = Trainer::where('status', 1)->where('gender','=','male')->count() ?? 0;

        $female_trainer = Trainer::where('status', 1)->where('gender','=','female')->count() ?? 0;


        


//council belongs_To Associations

        $iBPC = Association::where('status', 1)->where('belongs_to',1)->count() ?? 0;
        $lSBPC = Association::where('status', 1)->where('belongs_to', 2)->count() ?? 0;
        $lEPBPC = Association::where('status', 1)->where('belongs_to', 3)->count() ?? 0;
        $mPHPBPC = Association::where('status', 1)->where('belongs_to', 4)->count() ?? 0;
        $fPBPC = Association::where('status', 1)->where('belongs_to', 5)->count() ?? 0;
        $aPBPC = Association::where('status', 1)->where('belongs_to', 6)->count() ?? 0;
        $pPBPC = Association::where('status', 1)->where('belongs_to', 7)->count() ?? 0;
        // dd($pPBPC);

//Trainer belongs_To councils

        $iBPC_trainers = Trainer::where('status', 1)->where('council',1)->count() ?? 0;
        $lSBPC_trainers = Trainer::where('status', 1)->where('council', 2)->count() ?? 0;
        $lEPBPC_trainers = Trainer::where('status', 1)->where('council', 3)->count() ?? 0;
        // dd($lEPBPC_trainers);
        $mPHPBPC_trainers = Trainer::where('status', 1)->where('council', 4)->count() ?? 0;
        $fPBPC_trainers = Trainer::where('status', 1)->where('council', 5)->count() ?? 0;
        $aPBPC_trainers = Trainer::where('status', 1)->where('council', 6)->count() ?? 0;
        $pPBPC_trainers = Trainer::where('status', 1)->where('council', 7)->count() ?? 0;

// Activity belongs to councils

        $iBPC_activity = Activity::where('status', 1)->where('council',1)->count() ?? 0;
        $lSBPC_activity = Activity::where('status', 1)->where('council', 2)->count() ?? 0;
        $lEPBPC_activity = Activity::where('status', 1)->where('council', 3)->count() ?? 0;
        $mPHPBPC_activity = Activity::where('status', 1)->where('council', 4)->count() ?? 0;
        $fPBPC_activity = Activity::where('status', 1)->where('council', 5)->count() ?? 0;
        $aPBPC_activity = Activity::where('status', 1)->where('council', 6)->count() ?? 0;
        // dd($aPBPC_activity);
        $pPBPC_activity = Activity::where('status', 1)->where('council', 7)->count() ?? 0;

//Trainee sum


        $iBPC_trainees = Activity::select('number_of_trainees')->where('council','=','1')->sum('number_of_trainees');

        $lSBPC_trainees = Activity::select('number_of_trainees')->where('council','=','2')->sum('number_of_trainees');

        $lEPBPC_trainees = Activity::select('number_of_trainees')->where('council','=','3')->sum('number_of_trainees');


        $mPHPBPC_trainees = Activity::select('number_of_trainees')->where('council','=','4')->sum('number_of_trainees');


        $fPBPC_trainees = Activity::select('number_of_trainees')->where('council','=','5')->sum('number_of_trainees');

        $aPBPC_trainees = Activity::select('number_of_trainees')->where('council','=','6')->sum('number_of_trainees');

        $pPBPC_trainees = Activity::select('number_of_trainees')->where('council','=','7')->sum('number_of_trainees');

        // dd($iBPC_trainees);







        return view('backend.pages.dashboard',
            compact(
                'commons',
                'users',
                'programs',
                'councils',
                'trainees_male',
                'trainees_female',
                'trainees_others',
                'trainees_total',
                'trainer',
                'male_trainer',
                'female_trainer',
                'iBPC',
                'lSBPC',
                'lEPBPC',
                'mPHPBPC',
                'fPBPC',
                'aPBPC',
                'pPBPC',
                'iBPC_trainers',
                'lSBPC_trainers',
                'lEPBPC_trainers',
                'mPHPBPC_trainers',
                'fPBPC_trainers',
                'aPBPC_trainers',
                'pPBPC_trainers',
                'iBPC_activity',
                'lSBPC_activity',
                'lEPBPC_activity',
                'mPHPBPC_activity',
                'fPBPC_activity',
                'aPBPC_activity',
                'pPBPC_activity',
                'iBPC_trainees',
                'lSBPC_trainees',
                'lEPBPC_trainees',
                'mPHPBPC_trainees',
                'fPBPC_trainees',
                'aPBPC_trainees',
                'pPBPC_trainees',
                'activity'



            )
        );

    }

}
