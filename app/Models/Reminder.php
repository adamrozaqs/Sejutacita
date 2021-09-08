<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'title', 'desc', 
        'remind_url', 'pushtime', 
        'type'
    ];
}
