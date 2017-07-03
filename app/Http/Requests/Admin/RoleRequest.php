<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'label' => 'required|max:255',
        ];
    }
}
