<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Council;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Http\Request;

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

        $trainers = Trainer::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($commons);
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

        $trainers = Trainer::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

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
    public function store(trainerStoreRequest $request)
    {
        $trainer = new trainer();
        $trainer->name = $request->validated('trainer_name');
        $trainer->slug = strtolower(str_replace(' ', '_', $request->validated('trainer_name')));
        $trainer->status = 1;
        $trainer->created_at = Carbon::now();
        $trainer->created_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->wasRecentlyCreated){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'trainer created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'trainer cannot be created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'trainer';
        $commons['content_title'] = 'Show trainer';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_create';

        $trainer = trainer::findOrFail($id);
        $trainers = trainer::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

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
        $commons['page_title'] = 'trainer';
        $commons['content_title'] = 'Edit trainer';
        $commons['main_menu'] = 'trainer';
        $commons['current_menu'] = 'trainer_create';

        $trainer = trainer::findOrFail($id);
        $trainers = trainer::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.trainer.edit',
            compact(
                'commons',
                'trainer',
                'trainers'
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
    public function update(trainerUpdateRequest $request, $id)
    {
        $trainer = trainer::findOrFail($id);
        $trainer->name = $request->validated('trainer_name');
        $trainer->slug = strtolower(str_replace(' ', '_', $request->validated('trainer_name')));
        $trainer->status = $request->validated('status');
        $trainer->updated_at = Carbon::now();
        $trainer->updated_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->getChanges()){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'trainer updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'trainer cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer_has_association = Association::where('belongs_to', $id)->first();

        if($trainer_has_association){
            return redirect()
                ->back()
                ->with('failed', 'trainer cannot be deleted, becasue it has some association dependency. If you want to delete this, you must delete the dependent associations first.');
        }

        $trainer = trainer::findOrFail($id);
        $trainer->status = 0;
        $trainer->deleted_at = Carbon::now();
        $trainer->deleted_by = Auth::user()->id;
        $trainer->save();

        if ($trainer->getChanges()){
            return redirect()
                ->route('trainer.index')
                ->with('success', 'trainer deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'trainer cannot be deleted!');

    }
}
