<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouncilStoreRequest;
use App\Http\Requests\CouncilUpdateRequest;
use App\Models\Council;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commons['page_title'] = 'Council';
        $commons['content_title'] = 'List of All Council';
        $commons['main_menu'] = 'council';
        $commons['current_menu'] = 'council_index';

        $councils = Council::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($commons);
        return view('backend.pages.council.index',
            compact(
                'commons',
                'councils'
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
        $commons['page_title'] = 'Council';
        $commons['content_title'] = 'Add new council';
        $commons['main_menu'] = 'council';
        $commons['current_menu'] = 'council_create';

        $councils = Council::where('status', 1)->paginate(20);

        return view('backend.pages.council.create',
            compact(
                'commons',
                'councils'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouncilStoreRequest $request)
    {
        //dd($request->validated('council_name'));
        $council = new Council();
        $council->name = $request->validated('council_name');
        $council->slug = strtolower(str_replace(' ', '_', $request->validated('council_name')));
        $council->status = 1;
        $council->created_at = Carbon::now();
        $council->created_by = Auth::user()->id;
        $council->save();

        if ($council->wasRecentlyCreated){
            return redirect()
                ->route('council.index')
                ->with('success', 'Council created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Council cannot be created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $council = Council::findOrFail($id);

        $commons['page_title'] = 'Council';
        $commons['content_title'] = 'Show council';
        $commons['main_menu'] = 'council';
        $commons['current_menu'] = 'council_create';

        $councils = Council::where('status', 1)->paginate(20);

        return view('backend.pages.council.show',
            compact(
                'commons',
                'council',
                'councils'
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
        $council = Council::findOrFail($id);

        $commons['page_title'] = 'Council';
        $commons['content_title'] = 'Edit Council';
        $commons['main_menu'] = 'council';
        $commons['current_menu'] = 'council_create';

        $councils = Council::where('status', 1)->paginate(20);

        return view('backend.pages.council.edit',
            compact(
                'commons',
                'council',
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
    public function update(CouncilUpdateRequest $request, $id)
    {
        $council = Council::findOrFail($id);
        $council->name = $request->validated('council_name');
        $council->slug = strtolower(str_replace(' ', '_', $request->validated('council_name')));
        $council->status = $request->validated('status');
        $council->updated_at = Carbon::now();
        $council->updated_by = Auth::user()->id;
        $council->save();

        if ($council->getChanges()){
            return redirect()
                ->route('council.index')
                ->with('success', 'Council updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Council cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $council = Council::findOrFail($id);
        $council->status = 0;
        $council->deleted_at = Carbon::now();
        $council->deleted_by = Auth::user()->id;
        $council->save();

        if ($council->getChanges()){
            return redirect()
                ->route('council.index')
                ->with('success', 'Council deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Council cannot be deleted!');

    }
}
