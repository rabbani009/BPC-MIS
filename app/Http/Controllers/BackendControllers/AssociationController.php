<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssociationStoreRequest;
use App\Http\Requests\AssociationUpdateRequest;
use App\Models\Association;
use App\Models\Council;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssociationController extends Controller
{
    public function index()
    {
        $commons['page_title'] = 'Association';
        $commons['content_title'] = 'List of All Association';
        $commons['main_menu'] = 'association';
        $commons['current_menu'] = 'association_index';

        $associations = Association::where('status', 1)->with(['createdBy', 'updatedBy'])->paginate(20);
        //dd($commons);
        return view('backend.pages.association.index',
            compact(
                'commons',
                'Associations'
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
        $commons['page_title'] = 'Association';
        $commons['content_title'] = 'Add new Association';
        $commons['main_menu'] = 'association';
        $commons['current_menu'] = 'association_create';

        $councils = Council::where('status', 1)->get();
        $associations = Association::where('status', 1)->paginate(20);

        return view('backend.pages.association.create',
            compact(
                'commons',
                'councils',
                            'associations'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssociationStoreRequest $request)
    {
        dd($request->validated('Association_name'));
        $association = new Association();
        $association->name = $request->validated('Association_name');
        $association->slug = strtolower(str_replace(' ', '_', $request->validated('Association_name')));
        $association->status = 1;
        $association->created_at = Carbon::now();
        $association->created_by = Auth::user()->id;
        $association->save();

        if ($association->wasRecentlyCreated){
            return redirect()
                ->route('association.index')
                ->with('success', 'Association created successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Association cannot be created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $association = Association::findOrFail($id);

        $commons['page_title'] = 'Association';
        $commons['content_title'] = 'Show Association';
        $commons['main_menu'] = 'Association';
        $commons['current_menu'] = 'Association_create';

        $associations = Association::where('status', 1)->paginate(20);

        return view('backend.pages.Association.show',
            compact(
                'commons',
                'Association',
                'Associations'
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
        $association = Association::findOrFail($id);

        $commons['page_title'] = 'Association';
        $commons['content_title'] = 'Edit Association';
        $commons['main_menu'] = 'Association';
        $commons['current_menu'] = 'Association_create';

        $associations = Association::where('status', 1)->paginate(20);

        return view('backend.pages.Association.edit',
            compact(
                'commons',
                'Association',
                'Associations'
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
    public function update(AssociationUpdateRequest $request, $id)
    {
        $association = Association::findOrFail($id);
        $association->name = $request->validated('Association_name');
        $association->slug = strtolower(str_replace(' ', '_', $request->validated('Association_name')));
        $association->status = $request->validated('status');
        $association->updated_at = Carbon::now();
        $association->updated_by = Auth::user()->id;
        $association->save();

        if ($association->getChanges()){
            return redirect()
                ->route('Association.index')
                ->with('success', 'Association updated successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Association cannot be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $association = Association::findOrFail($id);
        $association->status = 0;
        $association->deleted_at = Carbon::now();
        $association->deleted_by = Auth::user()->id;
        $association->save();

        if ($association->getChanges()){
            return redirect()
                ->route('Association.index')
                ->with('success', 'Association deleted successfully!');
        }

        return redirect()
            ->back()
            ->with('failed', 'Association cannot be deleted!');

    }
}
