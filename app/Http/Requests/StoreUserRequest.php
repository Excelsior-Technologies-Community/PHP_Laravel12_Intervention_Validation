<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'numeric',
                'digits_between:10,15',
            ],

            'age' => [
                'required',
                'integer',
                'min:18',
                'max:100',
            ],

            'bio' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' =>
            'Please enter your full name.',

            'name.min' =>
            'Name must be at least 2 characters.',

            'name.max' =>
            'Name cannot exceed 255 characters.',

            'email.required' =>
            'Email address is required.',

            'email.email' =>
            'Please enter a valid email address.',

            'email.unique' =>
            'This email is already registered.',

            'phone.numeric' =>
            'Phone number must contain only numbers.',

            'phone.digits_between' =>
            'Phone number must contain between 10 and 15 digits.',

            'age.required' =>
            'Age is required.',

            'age.integer' =>
            'Age must be a whole number.',

            'age.min' =>
            'You must be at least 18 years old.',

            'age.max' =>
            'Age cannot exceed 100 years.',

            'bio.max' =>
            'Bio cannot exceed 500 characters.',
        ];
    }
}
