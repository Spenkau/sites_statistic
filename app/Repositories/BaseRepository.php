<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseRepository implements BaseRepositoryInterface
{

    public Model $model;

    public function allModels(array $criteria = [])
    {
        $builder = $this->model->query();

        foreach ($criteria as $key => $value) {
            $builder->where($key, $value);
        }

        return $builder->paginate(10);
    }

    public function findModel(int $modelId, array $columns = ['*'], array $relations = [])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }

    public function storeModel(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function updateModel(int $modelId, array $data): bool
    {
        $model = $this->findModel($modelId);

        return $model->update($model, $data);
    }

    public function destroyModel(int $modelId): bool
    {
        $model = $this->findModel($modelId);

        return $model->delete();
    }
}
