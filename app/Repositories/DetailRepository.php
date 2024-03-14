<?php

namespace App\Repositories;

use App\Http\Resources\DetailResource;
use App\Models\Detail;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailRepository implements DetailRepositoryInterface
{
    public function getAllDetails(): JsonResource
    {
        return DetailResource::collection(Detail::query()->get());
    }

    public function storeJobResult(array $data): JsonResource
    {
        return new DetailResource(Detail::create($data));
    }
}
