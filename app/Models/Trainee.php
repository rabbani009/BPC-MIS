<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'trainees';

    protected $fillable = [
        'activity',
        'name',
        'age',
        'gender',
        'qualification',
        'organization',
        'designation',
        'phone',
        'email',
        'covid_status',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function getAttendanceAttribute($value)
    {
        return json_decode($value, true);
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
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
