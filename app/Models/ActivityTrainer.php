<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityTrainer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'activity_trainers';

    public function getTrainer(){
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
