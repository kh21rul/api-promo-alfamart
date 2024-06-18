<?php

namespace App\Services\Impl;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\AuthenticationService;

class AuthenticationServiceImpl implements AuthenticationService
{
    public function login(string $email, string $password): ?string
    {
        // Attempt to authenticate user
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            return null;
        }

        // Retrieve the authenticated user
        $user = User::where('email', $email)->firstOrFail();

        // Create token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }

    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }

    public function getUser($user)
    {
        return $user;
    }
}
