<?php

namespace App\Repositories;

use App\Http\Resources\DetailResource;
use App\Models\Detail;
use App\Repositories\Interfaces\DetailRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailRepository extends BaseRepository implements DetailRepositoryInterface
{
    public Model $model;

    public function __construct(Detail $model)
    {
        $this->model = $model;
    }

    public function all(): JsonResource
    {
        $details = $this->allModels();

        return DetailResource::collection($details);
    }

    public function paginated(): JsonResource
    {
        $details = $this->paginatedModels();

        return DetailResource::collection($details);
    }

    public function store(array $data): JsonResource
    {
        $newDetail = $this->storeModel($data);

        return new DetailResource($newDetail);
    }
}
