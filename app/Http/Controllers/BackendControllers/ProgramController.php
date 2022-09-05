<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramStoreRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Program';
        $commons['content_title'] = 'List of All Program';
        $commons['main_menu'] = 'program';
        $commons['current_menu'] = 'program_index';

        $programs = Program::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($activities);
        return view('backend.pages.program.index',
            compact(
                'commons',
                'programs'
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
        $commons['page_title'] = 'Program';
        $commons['content_title'] = 'Add New Program';
        $commons['main_menu'] = 'program';
        $commons['current_menu'] = 'program_create';

        $programs = Program::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.program.create',
            compact(
                'commons',
                'programs'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramStoreRequest $request)
    {
        $program = new Program();
        $program->name = $request->validated('program_name');
        $program->slug = strtolower(str_replace(' ', '_', $request->validated('program_name')));
        $program->status = 1;
        $program->created_at = Carbon::now();
        $program->created_by = Auth::user()->id;
        $program->save();

        if ($program->wasRecentlyCreated){
            return redirect()
                ->route('program.index')
                ->with('success', 'Program created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Program cannot be created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commons['page_title'] = 'program';
        $commons['content_title'] = 'Show program';
        $commons['main_menu'] = 'program';
        $commons['current_menu'] = 'program_create';

        $program = Program::findOrFail($id);
        $programs = Program::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.program.show',
            compact(
                'commons',
                'program',
                'programs'
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
        $commons['page_title'] = 'program';
        $commons['content_title'] = 'Edit program';
        $commons['main_menu'] = 'program';
        $commons['current_menu'] = 'program_create';

        $program = Program::findOrFail($id);
        $programs = Program::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);

        return view('backend.pages.program.edit',
            compact(
                'commons',
                'program',
                'programs'
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
    public function update(ProgramUpdateRequest $request, $id)
    {
        $program = Program::findOrFail($id);
        $program->name = $request->validated('program_name');
        $program->slug = strtolower(str_replace(' ', '_', $request->validated('program_name')));
        $program->status = $request->validated('status');
        $program->updated_at = Carbon::now();
        $program->updated_by = Auth::user()->id;
        $program->save();

        if ($program->getChanges()){
            return redirect()
                ->route('program.index')
                ->with('success', 'Program updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Program cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::where('status', 1)->first();
        dd($program);// will do the rest here after add some more features

        if($program_has_program){
            return redirect()
                ->back()
                ->with('failed', 'program cannot be deleted, becasue it has some program dependency. If you want to delete this, you must delete the dependent programs first.');
        }

        $program = program::findOrFail($id);
        $program->status = 0;
        $program->deleted_at = Carbon::now();
        $program->deleted_by = Auth::user()->id;
        $program->save();

        if ($program->getChanges()){
            return redirect()
                ->route('program.index')
                ->with('success', 'program deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'program cannot be deleted!');

    }
}
