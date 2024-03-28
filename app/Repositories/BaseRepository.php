<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public Model $model;

    public function allModels(array|string $relations = [], array $criteria = [])
    {
        $builder = $this->filterBuilder($criteria);

        return $builder->with($relations)->get();
    }

    public function paginatedModels(array|string $relations = [], array $criteria = [])
    {
        $builder = $this->filterBuilder($criteria);

        return $builder->with($relations)->paginate(10);
    }

    public function findModel(int $modelId, array|string $relations = []): Model
    {
        return $this->model->with($relations)->findOrFail($modelId);
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

    public function filterBuilder($criteria)
    {
        if (method_exists($this->model, 'scopeFilter')) {
            $builder = $this->model->scopeFilter($criteria);
        } else {
            $builder = $this->model->query()->where('user_id', $criteria['user_id']);
        }

        return $builder;
    }
}
