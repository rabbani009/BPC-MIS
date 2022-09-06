<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAssociationsByCouncil(Request $request){
        //dd($request->council_id);

        $associations = Association::where('status', 1)
            ->where('belongs_to', $request->council_id)
            ->get();

        return view('backend.pages.ajax_blades.associations', compact('associations'));
    }
}
