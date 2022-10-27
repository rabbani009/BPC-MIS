<?php

namespace App\Http\Controllers\BackendControllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityTraineeController extends Controller
{
    public function activityTrainee(Request $request){

        $trainee_id = $request->id;
// dd($trainee_id);
//   dd($request->all());
Trainee::findOrFail($trainee_id)->update([


    'name' => $request->name,
    'age' => $request->age,
    'qualification' =>$request->qualification,
    'organization' => $request->organization,
    'designation' => $request->designation,
    'phone' => $request->phone,
    'email' => $request->email,

]);
 

    // dd($trainee);


    return redirect()
        ->back()
        ->with('success', 'Trainee updated successfully!');





  


    // if ($trainee->getChanges()){
    //     return redirect()
    //         ->route('trainee.index')
    //         ->with('success', 'Trainee updated successfully!');
    // }




}



// $trainee->name = $request->input('name');
// $trainee->age = $request->input('age');
// $trainee->gender = $request->input('gender');
// $trainee->qualification = $request->input('qualification');
// $trainee->organization = $request->input('organization');
// $trainee->designation = $request->input('designation');
// $trainee->phone = $request->input('phone');
// $trainee->email = $request->input('email');
// $trainee->covid_status = $request->input('covid_status');
// $trainee->save();



}





