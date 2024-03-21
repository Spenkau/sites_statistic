<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

interface DetailRepositoryInterface
{
    public function all(): JsonResource;

    public function store(array $data): JsonResource;
}
