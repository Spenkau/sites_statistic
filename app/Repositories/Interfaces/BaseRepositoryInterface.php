<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

interface BaseRepositoryInterface
{
    public function allModels(array|string $relations = [], array $criteria = []);
    public function findModel(int $modelId, array|string $relations = []): Model;
    public function storeModel(array $data): Model;
    public function updateModel(int $modelId, array $data): bool;
    public function destroyModel(int $modelId): bool;
}
