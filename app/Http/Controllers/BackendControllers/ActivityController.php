<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityStoreRequest;
use App\Http\Requests\ActivityUpdateRequest;
use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $activities = Activity::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
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

        $activities = Activity::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.activity.create',
            compact(
                'commons',
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
    public function store(ActivityStoreRequest $request)
    {
        $activity = new Activity();
        $activity->name = $request->validated('activity_name');
        $activity->slug = strtolower(str_replace(' ', '_', $request->validated('activity_name')));
        $activity->status = 1;
        $activity->created_at = Carbon::now();
        $activity->created_by = Auth::user()->id;
        $activity->save();

        if ($activity->wasRecentlyCreated){
            return redirect()
                ->route('activity.index')
                ->with('success', 'Activity created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Activity cannot be created!');

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
        $commons['content_title'] = 'Show Activity';
        $commons['main_menu'] = 'activity';
        $commons['current_menu'] = 'activity_create';

        $activity = Activity::findOrFail($id);
        $activities = Activity::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.Activity.show',
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

        $activity = Activity::findOrFail($id);
        $activities = Activity::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.Activity.edit',
            compact(
                'commons',
                'activity',
                            'activities'
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
