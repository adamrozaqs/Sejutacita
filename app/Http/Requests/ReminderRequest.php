<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReminderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'desc' => 'required|string|between:30,600',
            'remind_url' => 'required|string',
            'pushtime' => 'required|date|date_format:H:i A',
            'type' => 'required|string'
        ];
    }
}
