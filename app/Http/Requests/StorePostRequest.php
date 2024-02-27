<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'is_private' => 'required|boolean',
            'title' => 'required|string|min:2|max:80',
            'description' => 'nullable|min:2|max:500',
            'tags' => 'nullable|array:name'
        ];
    }
}
