<?php

namespace App\Services;

interface AuthenticationService
{
    public function login(string $email, string $password): ?array;
    public function logout($user): array;
    public function getUser($user);
}
