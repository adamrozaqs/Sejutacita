<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'desc', 'status',
        'type'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
