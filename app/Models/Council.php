<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'councils';

    protected $fillable = [
        'name',
        'slug',
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

    public function activities(){
        return $this->hasMany(Activity::class, 'council');
    }
}
