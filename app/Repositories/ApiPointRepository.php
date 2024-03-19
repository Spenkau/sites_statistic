<?php

namespace App\Repositories;

use App\Http\Resources\ApiPointResource;
use App\Http\Resources\DetailResource;
use App\Models\ApiPoint;
use App\Models\Detail;
use App\Repositories\Interfaces\ApiPointRepositoryInterface;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiPointRepository implements ApiPointRepositoryInterface
{
    public function all()
    {
        return ApiPointResource::collection(ApiPoint::query()->get());
    }

    public function store(array $data)
    {
        $newApiPoint = ApiPoint::create($data);

        return new ApiPointResource($newApiPoint);
    }
}
