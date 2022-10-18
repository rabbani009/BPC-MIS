<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Trainer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'trainers';

    protected $fillable = [
        'council',
        'association',
        'program',
        'name',
        'email',
        'mobile',
        'gender',
        'area_of_expertise',
        'status',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $dates = ['created_at', 'updated_at'];

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

    public function getprogram(){

        return $this->hasMany(Program::class,'program');
    }




    protected function AreaOfExpertise(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => explode(', ', $value),
            set: fn ($value) => implode(', ', $value),
        );
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::title($value),
        );
    }
}
