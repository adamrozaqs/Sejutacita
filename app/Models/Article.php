<?php

namespace App\Models;

use App\Models\Interest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'interest_id', 'headline', 'news_url', 
        'image_url', 'type'
    ];

    function interest() {
        return $this->belongsTo(Interest::class);
    }
}
