<?php

namespace App\Http\Requests\Sites;

use App\Http\Requests\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:50',
            'avatar' => 'image|max:1200',
        ];
    }
}
