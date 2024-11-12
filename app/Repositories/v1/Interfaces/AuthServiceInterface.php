<?php

namespace App\Repositories\v1\Interfaces;

interface AuthServiceInterface
{
    public function register(array $data): array;
    public function login(array $credentials): array;
    public function logout(): array;
}
