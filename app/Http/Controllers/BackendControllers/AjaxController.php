<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Association;
use App\Models\Trainer;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getAssociationsByCouncil(Request $request){
        //dd($request->old_association_id);

        $associations = Association::where('status', 1)
            ->where('belongs_to', $request->council_id)
            ->pluck('name', 'id');

        if (isset($request->old_association_id)){
            $old_association_id = $request->old_association_id;
        }else{
            $old_association_id = '';
        }

        return view('backend.pages.ajax_blades.associations', compact('associations', 'old_association_id'));
    }

    public function getTrainersByCouncilAndAssociation(Request $request){
        //dd('Council: '.$request->council_id.' Association: '.$request->association_id);
        $trainers = Trainer::where('council', $request->council_id)
            ->where('association', $request->association_id)
            ->get();

        $old_trainers = explode(', ',$request->old_trainers);

        return view('backend.pages.ajax_blades.trainers', compact('trainers', 'old_trainers'));
    }

    public function getTrainersByAssociation(Request $request){
        //dd('Council: '.$request->council_id.' Association: '.$request->association_id);
        $trainers = Trainer::where('association', $request->association_id)
            ->get();

        return view('backend.pages.ajax_blades.trainers', compact('trainers', 'old_trainers'));
    }

    public function getActivitiesByCouncilAndAssociation(Request $request){
        //dd('Council: '.$request->council_id.' Association: '.$request->association_id);
        $activities = Activity::where('council', $request->council_id)->where('association', $request->association_id)
            ->get();

        return view('backend.pages.ajax_blades.activities', compact('activities'));
    }


}
