<?php

namespace App\Http\Controllers\BackendControllers;

use App\Models\Council;
use App\Models\Program;
use App\Models\Association;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;

class ReportController extends Controller
{
    
    public function ProgramReportView(){

        $commons['page_title'] = 'Report';
        $commons['content_title'] = 'Program Wise Report';
        $commons['main_menu'] = 'program';
        $commons['current_menu'] = 'program-wise-report';

        // $councils = Council::where('status', 1)->orderBy('name','ASC')->get();
        $councils = Council::where('status', 1)->pluck('name', 'id');
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->pluck('name', 'id');


        return view('backend.pages.report.programReport',
        compact(
            'commons',
            'councils',
            'programs',
            'associations',
         
        )
    );


    }


    public function traineeReportView(){

        $commons['page_title'] = 'Report';
        $commons['content_title'] = 'Trainee Report';
        $commons['main_menu'] = 'trainee';
        $commons['current_menu'] = 'trainee-report';

        $councils = Council::where('status', 1)->pluck('name', 'id');
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->pluck('name', 'id');





        return view('backend.pages.report.traineeReport',
        compact(
            'commons',
            'councils',
            'programs',
            'associations',
         
        )
    );


    }

    
    public function trainerReportView(){

        $commons['page_title'] = 'Report';
        $commons['content_title'] = 'Trainer Report';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer-report';

        $councils = Council::where('status', 1)->pluck('name', 'id');
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->pluck('name', 'id');
    

        return view('backend.pages.report.trainerReport',
        compact(
            'commons',
            'councils',
            'programs',
            'associations',
         
         
        )
    );


    }


    public function index(Request $request){

        $commons['page_title'] = 'Report';
        $commons['content_title'] = 'Trainer Report';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer-report';

        $councils = Council::where('status', 1)->pluck('name', 'id');
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->pluck('name', 'id');
        //dd($request->all());

        $activities = Activity::where('council', $request->council)
        ->where('association', $request->association)
        ->where('program', $request->program)
        ->get();

        // dd($activities);

        return view('backend.pages.report.programReport',
        compact(
            'commons',
            'activities',
            'councils',
            'programs',
            'associations'
        )
           
        );




    }








}
