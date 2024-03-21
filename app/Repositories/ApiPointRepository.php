<?php

namespace App\Repositories;

use App\Http\Resources\ApiPointResource;
use App\Models\ApiPoint;
use App\Repositories\Interfaces\ApiPointRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiPointRepository extends BaseRepository implements ApiPointRepositoryInterface
{
    public Model $model;

    public function __construct(ApiPoint $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $relations = ['api_history'];

        return ApiPointResource::collection($this->allModels($relations));
    }

    public function show(int $id): JsonResource
    {
        $apiPoint = $this->findModel($id, 'api_history');

        return new ApiPointResource($apiPoint);
    }

    public function store(array $data): JsonResource
    {
        $newApiPoint = $this->storeModel($data);

        return new ApiPointResource($newApiPoint);
    }
}
