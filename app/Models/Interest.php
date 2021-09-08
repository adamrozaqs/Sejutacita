<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = ['title'];

    function article() {
        return $this->hasMany(Article::class, 'interest_id', 'id');
    }
}
