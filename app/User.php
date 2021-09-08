<?php

namespace App;

use App\Models\Persona;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuids;

class User extends Authenticatable
{
    use Notifiable, Uuids;

    protected $fillable = [
        'uuid','id', 'fullname', 'username', 'email', 'password',
        'gender', 'age', 'interest', 'persona_id'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function target() {
        return $this->hasMany(Target::class, 'user_id', 'id');
    }

    function persona() {
        return $this->belongsTo(Persona::class, 'persona_id', 'id');
    }

}
