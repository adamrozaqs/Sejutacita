<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['name_persona'];

    function user() {
        return $this->hasMany(User::class, 'persona_id', 'id');
    }
}
