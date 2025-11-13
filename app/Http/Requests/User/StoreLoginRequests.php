<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequests extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          'email' => 'required|string|email',
          'password' => 'required|min:6'
        ];
    }
    public function messages(): array
    {
        return[
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be more than 6 characters.'
        ];
    }
}
