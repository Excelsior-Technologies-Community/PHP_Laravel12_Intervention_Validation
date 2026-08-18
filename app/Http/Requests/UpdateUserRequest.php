<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     */
    public function rules(): array
    {
        $user = $this->route('user');

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
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            /*
             * Password is optional during update.
             *
             * If the user leaves it empty, the old password remains unchanged.
             */
            'password' => [
                'nullable',
                'string',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
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

            'employment_status' => [
                'required',
                'in:employed,self-employed,student,unemployed',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:255',
                'required_if:employment_status,employed',
                'required_if:employment_status,self-employed',
            ],

            'bio' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'name.min' => 'Name must be at least 2 characters.',
            'name.max' => 'Name cannot exceed 255 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',

            'password.confirmed' => 'Password confirmation does not match.',

            'phone.numeric' => 'Phone number must contain numbers only.',
            'phone.digits_between' => 'Phone number must contain between 10 and 15 digits.',

            'age.required' => 'Age is required.',
            'age.integer' => 'Age must be a whole number.',
            'age.min' => 'You must be at least 18 years old.',
            'age.max' => 'Age cannot exceed 100 years.',

            'employment_status.required' => 'Please select your employment status.',
            'employment_status.in' => 'Please select a valid employment status.',

            'company_name.required_if' =>
                'Company name is required for employed or self-employed users.',

            'company_name.max' =>
                'Company name cannot exceed 255 characters.',

            'bio.max' => 'Bio cannot exceed 500 characters.',
        ];
    }
}