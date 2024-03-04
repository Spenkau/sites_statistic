<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

class LoginController extends Controller
{
    public AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function show()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $loginData = $request->validated();

        return redirect()->to('/');
    }
}
