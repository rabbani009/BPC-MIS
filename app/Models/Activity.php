<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'activities';

    protected $fillable = [
        'council',
        'association',
        'program',

        'activity_title',
        'remarks',
        'start_date',
        'end_date',
        'venue',
        'number_of_trainers',
        'trainers',
        'number_of_trainees',
        'trainees',

        'source_of_fund',//Dropdown 1. GOB, 2. Development budgets 3.Council Association 4. Others
        'budget_as_per_contract',
        'actual_budget_as_per_expenditure',
        'actual_expenditure_as_per_actual_budget',

        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }

    public function getCouncil()
    {
        return $this->belongsTo(Council::class, 'council');
    }

    public function getAssociation()
    {
        return $this->belongsTo(Association::class, 'association');
    }

    public function getProgram()
    {
        return $this->belongsTo(Program::class, 'program');
    }

    public function getTrainers()
    {
        return $this->belongsTo(Trainer::class, 'trainers');
    }

    public function getTrainees()
    {
        return $this->belongsTo(Trainee::class, 'trainees');
    }

    protected function Trainers(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(', ', $value),
            set: fn ($value) => implode(', ', $value),
        );
    }

    protected function Trainees(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(', ', $value),
            set: fn ($value) => implode(', ', $value),
        );
    }

    protected function Remarks(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 1 ? 'Done' : 'Ongoing',
        );
    }


}
