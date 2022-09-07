<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Trainer;
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

    public function getTrainersByCouncilAndAssociation(Request $request){
        //dd('Council: '.$request->council_id.' Association: '.$request->association_id);
        $trainers = Trainer::where('council', $request->council_id)
            ->where('association', $request->association_id)
            ->get();

        return view('backend.pages.ajax_blades.trainers', compact('trainers'));
    }

    public function getTrainersByAssociation(Request $request){
        //dd('Council: '.$request->council_id.' Association: '.$request->association_id);
        $trainers = Trainer::where('association', $request->association_id)
            ->get();

        return view('backend.pages.ajax_blades.trainers', compact('trainers'));
    }
}
