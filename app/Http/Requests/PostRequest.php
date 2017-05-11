<?php

namespace App\Http\Requests;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'summary' => 'required',
            'content' => 'required',
        ];
    }
}
