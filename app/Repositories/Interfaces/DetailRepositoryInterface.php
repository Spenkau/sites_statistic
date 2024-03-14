<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

interface DetailRepositoryInterface
{
    public function getAllDetails(): JsonResource;

    public function storeJobResult(array $data): JsonResource;
}
