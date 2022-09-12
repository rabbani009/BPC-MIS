<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Models\Activity;
use App\Models\ActivityTrainer;
use App\Models\Association;
use App\Models\Council;
use App\Models\Program;
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

        $activities = Activity::where('status', 1)->with(['getCouncil', 'getAssociation', 'getProgram', 'createdBy', 'updatedBy'])->paginate(20);
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

        if (is_array($request->trainers)){
            $activity->number_of_trainees = count($request->validated('trainers'));
            $activity->trainees = implode(', ', $request->validated('trainers'));
        }else{
            $activity->number_of_trainees = null;
            $activity->trainees = null;
        }

        $activity->source_of_fund = $request->validated('source_of_fund');
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
        $activity = Activity::findOrFail($id);
        dd($activity);

        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Show Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $activity = Activity::findOrFail($id);
        $activities = Activity::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.activity.show',
            compact(
                'commons',
                'activity',
                            'activities'
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
        $commons['page_title'] = 'Activity';
        $commons['content_title'] = 'Edit Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $activity = Activity::with(['getCouncil', 'getAssociation', 'getProgram', 'getTrainers', 'getTrainees', 'createdBy', 'updatedBy'])->findOrFail($id);
        //dd($activity);

        return view('backend.pages.activity.edit',
            compact(
                'commons',
                'activity'
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

        return view('backend.pages.activity.console',
            compact(
                'commons',
                'activity'
            )
        );
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
        $activity->name = $request->validated('activity_name');
        $activity->slug = strtolower(str_replace(' ', '_', $request->validated('activity_name')));
        $activity->status = $request->validated('status');
        $activity->updated_at = Carbon::now();
        $activity->updated_by = Auth::user()->id;
        $activity->save();

        if ($activity->getChanges()){
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity updated successfully!');
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
        $activity_has_ = Activity::where('belongs_to', $id)->first();

        if($activity_has_activity){
            return redirect()
                ->back()
                ->with('failed', 'Activity cannot be deleted, becasue it has some activity dependency. If you want to delete this, you must delete the dependent activitys first.');
        }

        $activity = Activity::findOrFail($id);
        $activity->status = 0;
        $activity->deleted_at = Carbon::now();
        $activity->deleted_by = Auth::user()->id;
        $activity->save();

        if ($activity->getChanges()){
            return redirect()
                ->route('Activity.index')
                ->with('success', 'Activity deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Activity cannot be deleted!');

    }
}
