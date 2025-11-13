<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function login(array $data)
    {
        if (Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ])) {
            $user = Auth::user();

            return [
                'status' => true,
                'message' => 'Login successful!',
                'user' => $user,
            ];
        }
        return [
            'status' => false,
            'message' => 'Invalid email or password.'
        ];
    }
}
