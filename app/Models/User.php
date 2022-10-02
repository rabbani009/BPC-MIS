<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_image',
        'password',
        'role_id',
        'accesses',
        'permissions',
        'remember_token',
        'status',
        'created_at',
        'created_by',
        'deleted_at',
        'deleted_by',
        'updated_at',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'role_id', 'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userBelongsToCouncil()
    {
        return $this->hasOne('App\Models\Council', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id', 'id');
    }

    public function createdBy() {
        return $this->belongsTo('App\Models\User','created_by','id') ;
    }

    public function updatedBy() {
        return $this->belongsTo('App\Models\User','updated_by','id') ;
    }

    public function deletedBy() {
        return $this->belongsTo('App\Models\User','deleted_by','id') ;
    }
}
