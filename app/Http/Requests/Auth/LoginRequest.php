<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|max:50|email',
            'password' => 'required|max:24',
        ];
    }
}
