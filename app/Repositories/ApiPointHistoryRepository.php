<?php

namespace App\Repositories;

use App\Http\Resources\ApiPointHistoryResource;
use App\Http\Resources\DetailResource;
use App\Models\ApiPointHistory;
use App\Models\Detail;
use App\Repositories\Interfaces\ApiPointRepositoryInterface;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiPointHistoryRepository
{
    public function all()
    {
        return ApiPointHistoryResource::collection(ApiPointHistory::query()->get());
    }

    public function store(array $data)
    {
        $newHistory = ApiPointHistory::create($data);

        return new ApiPointHistoryResource($newHistory);
    }
}
