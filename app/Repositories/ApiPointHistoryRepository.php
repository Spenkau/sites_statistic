<?php

namespace App\Repositories;

use App\Http\Resources\ApiPointHistoryResource;
use App\Http\Resources\DetailResource;
use App\Models\ApiPointHistory;
use App\Models\Detail;
use App\Repositories\Interfaces\ApiPointHistoryRepositoryInterface;
use App\Repositories\Interfaces\ApiPointRepositoryInterface;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiPointHistoryRepository extends BaseRepository implements ApiPointHistoryRepositoryInterface
{
    public Model $model;

    public function __construct(ApiPointHistory $model)
    {
        $this->model = $model;
    }

    public function all(): JsonResource
    {
        $models = $this->allModels();

        return ApiPointHistoryResource::collection($models);
    }

    public function store(array $data): JsonResource
    {
        $newHistory = $this->storeModel($data);

        return new ApiPointHistoryResource($newHistory);
    }

    public function show(int $id)
    {
        // TODO: Implement show() method.
    }
}
