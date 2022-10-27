<?php

namespace App\Http\Controllers\BackendControllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityTraineeController extends Controller
{
    public function activityTrainee(Request $request){

//   dd($request->all());

$s_id = $request->input('s_id');  //here scores is the input array param 

// dd($s_id);

foreach($s_id as $row){

    
    $trainee = Trainee::all(); 
    // dd($trainee);

    // $trainee->name =  $request->$row['name']; 
    // $trainee->age =  $request->$row['age'];
    // $trainee->qualification =  $request->$row['qualification']; 
    // $trainee->organization =  $request->$row['organization']; 
    // $trainee->designation =  $request->$row['designation']; 
    // $trainee->phone =  $request->$row['phone']; 
    // $trainee->email =  $request->$row['email']; 

    // dd($trainee);

$trainee->name = $request->input('name');
$trainee->age = $request->input('age');
$trainee->gender = $request->input('gender');
$trainee->qualification = $request->input('qualification');
$trainee->organization = $request->input('organization');
$trainee->designation = $request->input('designation');
$trainee->phone = $request->input('phone');
$trainee->email = $request->input('email');
$trainee->covid_status = $request->input('covid_status');


    // dd($trainee);

$trainee->update();
  


    if ($trainee->getChanges()){
        return redirect()
            ->route('trainee.index')
            ->with('success', 'Trainee updated successfully!');
    }

    return redirect()
        ->back()
        ->with('failed', 'Trainee cannot be updated!');
}


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





