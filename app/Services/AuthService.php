<?php

namespace App\Services;

use App\Enums\NotificationEnum;
use App\Repositories\AuthRepository;
use Exception;

class AuthService
{
    protected AuthRepository $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(array $data): array
    {
        return $this->authRepository->login($data);
    }

    public function register(array $data): array
    {
        return $this->authRepository->register($data);
    }
}
