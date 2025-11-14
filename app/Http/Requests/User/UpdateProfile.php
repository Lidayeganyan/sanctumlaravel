<?php

namespace App\Http\Requests\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
           'name' => 'required|string|max:25',
           'email' => 'required|email|max:255|lowercase|unique:users,email,' . $this->user()->id,
        ];
    }
    public function messages(): array
    {
        return[
            'name.required' => 'The name is required',
            'name.max'=>"Name is too long. Please write no more than 25 characters.",
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.lowercase'=> 'You can use only lowercase.',
            'email.unique' => "This email is already in use. Please enter a unique email.",
        ];
    }
}
