<?php

namespace App\Services\v1;

use App\Helpers\ApiResponse;
use App\Http\Resources\v1\UserResource;
use App\Repositories\v1\Interfaces\AuthRepositoryInterface;
use App\Repositories\v1\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements AuthServiceInterface
{
    use \App\Traits\v1\ApiResponse;
    public function __construct(private readonly AuthRepositoryInterface $authRepository)
    {
    }

    /**
     * @param array $data
     * @return array
     */
    public function register(array $data): array
    {
        try {
            $user = $this->authRepository->registerUser($data);
            $token = $user->createToken('user-register')->plainTextToken; //env('APP_NAME')
            return $this->success([
                'user' => new UserResource($user),
                'token_type' => 'Bearer',
                'token' => $token],
                'User registered successfully.',
                201);
        } catch (\Exception $exception) {
            return $this->error('Registration failed', ['error' => $exception->getMessage()], 500);
        }

    }

    /**
     * @param array $credentials
     * @return array
     */
    public function login(array $credentials): array
    {
        try {
            $user = $this->authRepository->findUserByEmail($credentials['email']);
            if(!$user || !Hash::check($credentials['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
            $token = $user->createToken('user-login')->plainTextToken;
            return $this->success([
                'user' => new UserResource($user),
                'token_type' => 'Bearer',
                'token' => $token
            ], 'User login successfully.', 200);
        } catch (\Exception $exception) {
            return $this->error('Login failed', ['error' => $exception->getMessage()], 422);
        }

    }

    /**
     * @return array
     */
    public function logout(): array
    {
        try {
            auth()->user()->tokens()->delete();
            return $this->success([], 'User logged out successfully.', 200);
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage(), ['error' => $exception->getMessage()], 500);
        }

    }
}
