<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'content' => 'required|string|min:2|max:800',
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
        ];
    }
}
