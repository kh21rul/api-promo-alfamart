<?php

namespace App\Services\Impl;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthenticationService;

class AuthenticationServiceImpl implements AuthenticationService
{
    public function login(string $email, string $password): ?array
    {
        // Attempt to authenticate user
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return null;
        }

        // Retrieve the authenticated user
        $user = User::where('email', $email)->firstOrFail();

        // Create token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return user data and token
        return [
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
            ]
        ];
    }

    public function logout($user): array
    {
        $user->currentAccessToken()->delete();

        // Return user data after logout
        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    public function getUser($user)
    {
        return $user;
    }
}
