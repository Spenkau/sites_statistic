<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{

    public Model $model;

    public function allModels(array|string $relations = [], array $criteria = [], array $columns = ['*'])
    {
        $builder = $this->model->query()->with($relations)->select($columns);

        foreach ($criteria as $key => $value) {
            $builder->where($key, $value);
        }

        return $builder->paginate(10);
    }

    public function findModel(int $modelId, array|string $relations = [], array $columns = ['*']): Model
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }

    public function storeModel(array $data): Model
    {
        return $this->model->create($data);
    }

    public function updateModel(int $modelId, array $data): bool
    {
        $model = $this->findModel($modelId);

        return $model->update($data);
    }

    public function destroyModel(int $modelId): bool
    {
        $model = $this->findModel($modelId);

        return $model->delete();
    }
}
