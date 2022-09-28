<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TraineeStoreRequest;
use App\Models\Activity;
use App\Models\Association;
use App\Models\Council;
use App\Models\Trainee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Trainee';
        $commons['content_title'] = 'List of All Trainee';
        $commons['main_menu'] = 'trainee';
        $commons['current_menu'] = 'trainee_index';

        $trainees = Trainee::where('status', 1)
            ->with(['getActivity', 'createdBy', 'updatedBy'])
            ->latest()
            ->paginate(50);
        //dd($trainees);

        return view('backend.pages.trainee.index',
            compact(
                'commons',
                'trainees'
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
        $commons['page_title'] = 'Trainee';
        $commons['content_title'] = 'Add new Trainee';
        $commons['main_menu'] = 'trainee';
        $commons['current_menu'] = 'trainee_create';

        $councils = Council::select('name', 'id')->where('status', 1)->get();
        $associations = Association::select('name', 'id')->where('status', 1)->get();
        $activities = Activity::select('activity_title', 'id')->where('status', 1)->get();

        $trainees = Trainee::where('status', 1)->with(['getActivity', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainee.create',
            compact(
                'commons',
                'councils',
                'associations',
                'trainees',
                'activities'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TraineeStoreRequest $request)
    {
        //dd($request->all());
        DB::beginTransaction();

        try {
            $activity = Activity::find($request->activity);
            $activity_duration = Carbon::parse($activity->start_date)->diffInDays(Carbon::parse($activity->end_date))+1;

            for ($j = 1; $j <= $activity_duration; $j++){
                $attendance[] = [
                    'day' => 'Day '.$j,
                    'status' => $request->input('day_'.$j.'_attend'),
                ];
            }

            $trainee = new Trainee();
            $trainee->activity = $activity->id;
            $trainee->name = $request->input('name');
            $trainee->age = $request->input('age');
            $trainee->gender = $request->input('gender');
            $trainee->qualification = $request->input('qualification');
            $trainee->organization = $request->input('organization');
            $trainee->designation = $request->input('designation');
            $trainee->phone = $request->input('phone');
            $trainee->email = $request->input('email');
            $trainee->covid_status = $request->input('covid_status');

            if ($attendance != null){
                $trainee->attendance = json_encode($attendance);
            }else{
                $attendance = null;
            }

            $trainee->status = 1;
            $trainee->created_at = Carbon::now();
            $trainee->created_by = Auth::user()->id;

            //dd($trainee);

            $trainee->save();

            DB::commit();
            // all good
            if ($trainee->wasRecentlyCreated){
                return redirect()
                    ->route('trainee.index')
                    ->with('success', 'Trainee created successfully!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()
                ->back()
                ->with('failed', 'Trainee cannot be created! Due to DB issue');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'Trainee';
        $commons['content_title'] = 'Show Trainee';
        $commons['main_menu'] = 'Trainee';
        $commons['current_menu'] = 'Trainee_create';

        $trainee = Trainee::with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->findOrFail($id);
        $trainees = Trainee::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.Trainee.show',
            compact(
                'commons',
                'Trainee',
                'Trainees'
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
        $commons['page_title'] = 'Trainee';
        $commons['content_title'] = 'Edit Trainee';
        $commons['main_menu'] = 'Trainee';
        $commons['current_menu'] = 'Trainee_create';

        $councils = Council::where('status', 1)->get();

        $trainee = Trainee::with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->findOrFail($id);

        $trainees = Trainee::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.Trainee.edit',
            compact(
                'commons',
                'Trainee',
                'Trainees',
                'councils'
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
    public function update(TraineeUpdateRequest $request, $id)
    {
        $trainee = Trainee::findOrFail($id);
        //dd($trainee);
        $trainee->council = $request->validated('council');
        $trainee->association = $request->validated('association');
        $trainee->name = $request->validated('Trainee_name');
        $trainee->email = $request->validated('email');
        $trainee->mobile = $request->validated('mobile');
        $trainee->gender = $request->validated('gender');
        $trainee->area_of_expertise = $request->validated('area_of_expertise');
        $trainee->status = $request->validated('status');
        $trainee->updated_at = Carbon::now();
        $trainee->updated_by = Auth::user()->id;
        $trainee->save();

        if ($trainee->getChanges()){
            return redirect()
                ->route('Trainee.index')
                ->with('success', 'Trainee updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Trainee cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $trainee_has_activities = Activity::all();

        if($trainee_has_association){
            return redirect()
                ->back()
                ->with('failed', 'Trainee cannot be deleted, becasue it has some association dependency. If you want to delete this, you must delete the dependent associations first.');
        }

        $trainee = Trainee::findOrFail($id);
        $trainee->status = 0;
        $trainee->deleted_at = Carbon::now();
        $trainee->deleted_by = Auth::user()->id;
        $trainee->save();

        if ($trainee->getChanges()){
            return redirect()
                ->route('Trainee.index')
                ->with('success', 'Trainee deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Trainee cannot be deleted!');

    }
}
