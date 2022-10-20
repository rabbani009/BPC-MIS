<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTrainee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'activity_trainees';

public function getTrainee(){
    return $this->belongsTo(Trainee::class, 'trainee_id');
}

}


