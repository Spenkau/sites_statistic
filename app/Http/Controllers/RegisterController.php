<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

class RegisterController extends Controller
{
    public AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $registerData = $request->validated();

        $response = $this->authService->register($registerData);

        return $response()->json($response, 200);
    }
}
