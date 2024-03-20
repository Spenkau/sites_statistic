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
        return ApiPoint::query()->with('api_history')->get();
    }

    public function show(int $id): JsonResource
    {
        $model = ApiPoint::whereId($id)->with('api_history')->first();

        return new ApiPointResource($model);
    }

    public function store(array $data): JsonResource
    {
        $model = ApiPoint::create($data);

        return new ApiPointResource($model);
    }
}
