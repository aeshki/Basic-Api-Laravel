<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',         
            'pseudo' => 'nullable|string|min:2|max:22',
            'username' => 'required|unique:users,username|min:2|max:22',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(10)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ]
        ];
    }

    public function messages()
    {
        return [
            'avatar.image' => 'The avatar field must be a image.',
            'avatar.mimes' => 'The avatar field support only jpg, jpeg, png, svg extension.',
            'avatar.max' => 'The avatar field must not exceed 2048 octects.',

            'pseudo.string' => 'The pseudo field must be a string.',
            'pseudo.min' => 'The pseudo must be at least 2 characters long.',
            'pseudo.max' => 'The pseudo field must not exceed 22 characters.',

            'username.required' => 'The username field is required.',
            'username.string' => 'The username field must be a string.',
            'username.min' => 'The username must be at least 2 characters long.',
            'username.max' => 'The username field must not exceed 22 characters.',

            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',

            'password.required' => 'The password field is required.',
            'password.string' => 'The password field must be a string.',
            'password.min' => 'The password must be at least 10 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
