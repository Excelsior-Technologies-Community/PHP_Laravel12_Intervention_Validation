<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if you want authorization
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'nullable|numeric|digits_between:10,15',
            'age' => 'required|integer|min:18|max:100',
            'bio' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your full name.',
            'name.min' => 'Name must be at least 2 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'age.min' => 'You must be at least 18 years old.',
            'age.max' => 'Age cannot exceed 100 years.',
        ];
    }
}