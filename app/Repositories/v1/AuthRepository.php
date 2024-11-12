<?php

namespace App\Repositories\v1;

use App\Models\User;
use App\Repositories\v1\Interfaces\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    public function registerUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'source' => $data['source'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),

        ]);
    }
    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

}
