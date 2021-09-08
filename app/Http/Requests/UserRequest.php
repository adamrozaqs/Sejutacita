<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;


class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'persona_id' => 'required|integer|exists:personas,id',
            'fullname' => 'required|string',
            'username' => 'required|string',
            'password' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:male,female',
            'age' => 'required',
            'interest' => 'required'
        ];
    }
}
