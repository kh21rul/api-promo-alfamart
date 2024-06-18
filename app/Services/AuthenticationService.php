<?php

namespace App\Services;

interface AuthenticationService
{
    public function login(string $email, string $password): ?string;
    public function logout($user): void;
    public function getUser($user);
}
