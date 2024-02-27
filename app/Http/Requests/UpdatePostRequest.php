<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'is_private' => 'boolean',
            'title' => 'string|min:2|max:80',
            'description' => 'nullable|min:2|max:500',
            'tags' => 'required|array|max:3',
            'tags.*' => 'required|string|distinct|min:2|max:22',
        ];
    }
}
