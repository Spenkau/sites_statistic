<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
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

        return response()->json($response, 200);
    }

    public function login(LoginRequest $request)
    {
        $loginData = $request->validated();

        $response = $this->authService->login($loginData);

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response([
            'message' => 'Logged out successfully'
        ]);
    }
}
