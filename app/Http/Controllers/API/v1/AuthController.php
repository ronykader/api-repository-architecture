<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LoginUserRequest;
use App\Http\Requests\v1\RegisterUserRequest;
use App\Repositories\v1\Interfaces\AuthServiceInterface;
use App\Services\v1\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param AuthService $authService
     */
    public function __construct(private readonly AuthServiceInterface $authService)
    {
    }

    /**
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $response = $this->authService->register($request->validated());
        return response()->json($response, 201);
    }

    /**
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $response = $this->authService->login($request->validated());
        return response()->json($response);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $response = $this->authService->logout();
        return response()->json($response);
    }

}
