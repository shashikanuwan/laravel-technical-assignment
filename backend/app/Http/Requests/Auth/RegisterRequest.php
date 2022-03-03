<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone_number' => 'required|string|max:10|unique:users|digits:10',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:8|confirmed',
        ];
    }
}
