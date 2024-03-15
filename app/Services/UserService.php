<?php

namespace App\Services;

use App\Enums\NotificationEnum;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(array $criteria): JsonResource
    {
        return $this->userRepository->index($criteria);
    }
}
