<?php

namespace App\Models;

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
}
