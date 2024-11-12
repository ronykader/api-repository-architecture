<?php

namespace App\Repositories\v1\Interfaces;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function registerUser(array $data): User;
    public function findUserByEmail(string $email): ?User;
}
