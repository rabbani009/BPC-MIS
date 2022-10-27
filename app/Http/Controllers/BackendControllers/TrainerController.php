<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerStoreRequest;
use App\Http\Requests\TrainerUpdateRequest;
use App\Models\Activity;
use App\Models\Association;
use App\Models\Council;
use App\Models\Trainee;
use App\Models\Trainer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Trainer';
        $commons['content_title'] = 'List of All Trainer';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_index';

        $trainers = Trainer::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainer.index',
            compact(
                'commons',
                'trainers'
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
        $commons['page_title'] = 'Trainer';
        $commons['content_title'] = 'Add new Trainer';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_create';

        $councils = Council::where('status', 1)->get();
        $associations = Association::where('status', 1)->get();

        $trainers = Trainer::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainer.create',
            compact(
                'commons',
                'councils',
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
    public function store(TrainerStoreRequest $request)
    {
        $trainer = new Trainer();
        $trainer->council = $request->validated('council');
        $trainer->association = $request->validated('association');
        $trainer->name = $request->validated('trainer_name');
        $trainer->email = $request->validated('email');
        $trainer->mobile = $request->validated('mobile');
        $trainer->gender = $request->validated('gender');
        $trainer->area_of_expertise = $request->validated('area_of_expertise');
        $trainer->status = 1;
        $trainer->created_at = Carbon::now();
        $trainer->created_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->wasRecentlyCreated){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'Trainer created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Trainer cannot be created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'Trainer';
        $commons['content_title'] = 'Trainer information';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_create';

        $trainer = Trainer::with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->findOrFail($id);
        $trainers = Trainer::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainer.show',
            compact(
                'commons',
                'trainer',
                'trainers'
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
        $commons['page_title'] = 'Trainer';
        $commons['content_title'] = 'Edit Trainer';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_create';

        $councils = Council::where('status', 1)->get();

        $trainer = Trainer::with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->findOrFail($id);

        $trainers = Trainer::where('status', 1)->with(['getCouncil', 'getAssociation', 'createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainer.edit',
            compact(
                'commons',
                'trainer',
                'trainers',
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
    public function update(TrainerUpdateRequest $request, $id)
    {
        $trainer = Trainer::findOrFail($id);
        //dd($trainer);
        $trainer->council = $request->validated('council');
        $trainer->association = $request->validated('association');
        $trainer->name = $request->validated('trainer_name');
        $trainer->email = $request->validated('email');
        $trainer->mobile = $request->validated('mobile');
        $trainer->gender = $request->validated('gender');
        $trainer->area_of_expertise = $request->validated('area_of_expertise');
        $trainer->status = $request->validated('status');
        $trainer->updated_at = Carbon::now();
        $trainer->updated_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->getChanges()){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'Trainer updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Trainer cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);

        $trainer->status = 0;
        $trainer->deleted_at = Carbon::now();
        $trainer->deleted_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->getChanges()){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'Trainer deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Trainer cannot be deleted!');
    }
}
