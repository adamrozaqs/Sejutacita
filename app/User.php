<?php

namespace App;

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
        'gender', 'age'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
