<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'interest' => 'required'
            'headline' => 'required|string',
            'news_url' => 'required|string',
            'image_url' => 'required|image',
            'type' =>  'required|in:news,quotes'
        ];
    }
}
