<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Http\Requests\TraineeAddFromConsoleRequest;
use App\Models\Activity;
use App\Models\ActivityTrainer;
use App\Models\Association;
use App\Models\Council;
use App\Models\Program;
use App\Models\Trainee;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'List of All Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_index';


        $users = auth()->user();

        if(!empty($users)){
            $user_type = $users->user_type;
            $user_name = $users->name;

        } else {
            $user_type = '';
            $user_name = '';
        }

        if($user_type=='bpc'){


            $activities = Activity::where('status', 1)
        
            ->with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->paginate(20);

        }else{

            $activities = Activity::where('status', 1)
            ->where('council', auth()->user()->belongs_to) 
            ->with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->paginate(20);
        }

        //dd($activities);
        return view('backend.pages.activity.index',
            compact(
                'commons',
                'activities'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Add new Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $councils = Council::where('status', 1)->pluck('name', 'id');
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->pluck('name', 'id');
        $trainers = Trainer::select('name', 'id')->where('status', 1)->get();

        return view('backend.pages.activity.create',
            compact(
                'commons',
                'councils',
                'programs',
                'associations',
                'trainers'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityStoreRequest $request)
    {
        // dd($request->all());
        $activity = new Activity();
        $activity->council = $request->validated('council');
        $activity->association = $request->validated('association');
        $activity->program = $request->validated('program');

        $activity->activity_title = $request->validated('activity_title');
        $activity->remarks = $request->validated('remarks');
        $activity->start_date = $request->validated('start_date');
        $activity->end_date = $request->validated('end_date');
        $activity->venue = $request->validated('venue');

        if (is_array($request->trainers)){
            $activity->number_of_trainers = count($request->validated('trainers'));
            $activity->trainers = implode(', ', $request->validated('trainers'));
        }else{
            $activity->number_of_trainers = null;
            $activity->trainers = null;
        }

        if (isset($request->number_of_trainees)){
            $activity->number_of_trainees = $request->validated('number_of_trainees');
            $activity->trainees = null;
        }else{
            $activity->number_of_trainees = null;
            $activity->trainees = null;
        }

        if (isset($request->source_of_fund)){
            $activity->source_of_fund = $request->validated('source_of_fund');

        }else{
          $activity->source_of_fund = null;
        }

        // $activity->source_of_fund = $request->validated('source_of_fund');
        $activity->budget_as_per_contract = $request->validated('budget_as_per_contract');
        $activity->actual_budget_as_per_expenditure = $request->validated('actual_budget_as_per_expenditure');
        $activity->actual_expenditure_as_per_actual_budget = $request->validated('actual_expenditure_as_per_actual_budget');

        $activity->status = 1;
        $activity->created_at = Carbon::now();
        $activity->created_by = Auth::user()->id;
        $activity->save();

        if ($activity->wasRecentlyCreated) {
            if ($activity->trainers != null){
                $trainers = explode(', ', $activity->trainers);

                foreach ($trainers as $t){
                    $data[] = [
                        'activity_id' => $activity->id,
                        'trainer_id' => $t,
                    ];
                }

                ActivityTrainer::insert($data);

                return redirect()
                    ->route('get.activity.console', $activity->id)
                    ->with('success', 'Activity created successfully with Activity=>Trainer relationship!');
            }

            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity created successfully! without trainers information!');
        }

        // something went wrong
        return redirect()
            ->back()
            ->with('Exception', 'Failed');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Edit Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $activity = Activity::where('status', 1)->with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->findOrFail($id);
        // dd($activity);

        return view('backend.pages.activity.show',
            compact(
                'commons',
                'activity',

            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Edit Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';


        $councils = Council::where('status', 1)->get();
        $associations = Association::where('status', 1)->pluck('name', 'id');
        $programs = Program::where('status', 1)->get();
        $trainers = Trainer::select('name', 'id')->where('status', 1)->get();

        $trainer = Trainer::with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->findOrFail($id);

        $trainees = Trainee::where('activity', $id)->get();

        // dd($trainees);

        $activity = Activity::where('status', 1)->with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->findOrFail($id);
        // dd($activity);

        return view('backend.pages.activity.edit',
            compact(
                'commons',
                'activity',
                'councils',
                'programs',
                'associations',
                'trainers',
                'trainer',
                'trainees'
            )
        );
    }


    public function getActivityConsole($id){
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Edit Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $activity = Activity::with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->findOrFail($id);
        //dd($activity);
        $activity_duration = Carbon::parse($activity->start_date)->diffInDays(Carbon::parse($activity->end_date))+1;

        return view('backend.pages.activity.console',
            compact(
                'commons',
                'activity',
                'activity_duration'
            )
        );
    }

    public function patchActivityConsole(TraineeAddFromConsoleRequest $request, $id){
        //dd($request->all());
        $activity = Activity::findOrFail($id);
        $activity_duration = Carbon::parse($activity->start_date)->diffInDays(Carbon::parse($activity->end_date))+1;
        //dd($activity->number_of_trainees);

        if ($request->input('activity_id') == $activity->id && $request->input('number_of_trainees') == $activity->number_of_trainees){
            for ($i = 1; $i <= $activity->number_of_trainees; $i++){

                for ($j = 1; $j <= $activity_duration; $j++){
                    $attendance[] = [
                        'day' => 'Day '.$j,
                        'status' => $request->input('trainee_'.$i.'_day_'.$j.'_attend'),
                    ];
                }

                $trainee = new Trainee();
                $trainee->activity = $activity->id;
                $trainee->name = $request->input('trainee_'.$i.'_name');
                $trainee->age = $request->input('trainee_'.$i.'_age');
                $trainee->gender = $request->input('trainee_'.$i.'_gender');
                $trainee->qualification = $request->input('trainee_'.$i.'_qualification');
                $trainee->organization = $request->input('trainee_'.$i.'_organization');
                $trainee->designation = $request->input('trainee_'.$i.'_designation');
                $trainee->phone = $request->input('trainee_'.$i.'_phone');
                $trainee->email = $request->input('trainee_'.$i.'_email');
                $trainee->covid_status = $request->input('trainee_'.$i.'_covid_status');

                if ($attendance != null){
                    $trainee->attendance = json_encode($attendance);
                }

                $trainee->status = 1;
                $trainee->created_at = Carbon::now();
                $trainee->created_by = Auth::user()->id;

                //dd($attendance);

                $trainee->save();
                $attendance = null;
            }

            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity updated successfully with trainees!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Failed operation!');


        return redirect()
            ->back()
            ->with('failed', 'Failed operation! Some data manipulation done manually!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityUpdateRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);

        // dd($activity);
        $activity->council = $request->validated('council');
        $activity->association = $request->validated('association');
        $activity->program = $request->validated('program');

        $activity->activity_title = $request->validated('activity_title');
        $activity->remarks = $request->validated('remarks');
        $activity->start_date = $request->validated('start_date');
        $activity->end_date = $request->validated('end_date');
        $activity->venue = $request->validated('venue');

        if (is_array($request->trainers)){
            $activity->number_of_trainers = count($request->validated('trainers'));
            $activity->trainers = implode(', ', $request->validated('trainers'));
        }else{
            $activity->number_of_trainers = null;
            $activity->trainers = null;
        }

        // if (isset($request->number_of_trainees)){
        //     $activity->number_of_trainees = $request->validated('number_of_trainees');
        //     $activity->trainees = null;
        // }else{
        //     $activity->number_of_trainees = null;
        //     $activity->trainees = null;
        // }

        if (isset($request->source_of_fund)){
            $activity->source_of_fund = $request->validated('source_of_fund');

        }else{
          $activity->source_of_fund = null;
        }


        // $activity->source_of_fund = $request->validated('source_of_fund');
        $activity->budget_as_per_contract = $request->validated('budget_as_per_contract');
        $activity->actual_budget_as_per_expenditure = $request->validated('actual_budget_as_per_expenditure');
        $activity->actual_expenditure_as_per_actual_budget = $request->validated('actual_expenditure_as_per_actual_budget');

        $activity->status = 1;
        $activity->updated_at = Carbon::now();
        $activity->updated_by = Auth::user()->id;
        $activity->save();

        if ($activity->getChanges()){
            return redirect()
                ->route('activity.index')
                ->with('success', 'Aitivity updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Activity cannot be updated!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $activity = Activity::findOrFail($id);
        $activity->status = 0;
        $activity->deleted_at = Carbon::now();
        $activity->deleted_by = Auth::user()->id;
        $activity->save();

        if ($activity->getChanges()){
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Activity cannot be deleted!');

    }
}
