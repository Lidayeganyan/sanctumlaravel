<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequests extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           'name' => 'required|string|max:25',
           'email' => 'required|email|unique:users,email',
           'password'=> 'required|min:6|same:confirm_password',
           'confirm_password' => 'required',

        ];
    }
    public function messages(): array 
    {
        return
        [
            'name.required' => 'Name is required.',
            'name.max'=>"Name is too long. Please write no more than 25 characters.",
            'email.required' => 'Email is required.',
            'email.unique' => "This email is already in use. Please enter a unique email.",
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be more than 6 characters.',
            'confirm_password.required' => 'Confirm password is required.',
            
        ];
    }
}
