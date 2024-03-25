<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{

    public Model $model;

    public function allModels(array|string $relations = [], array $criteria = [], array $columns = ['*']): LengthAwarePaginator
    {
        $builder = $this->model->query()->with($relations)->select($columns);

        $query = $this->filterModel($builder, $criteria);

        return $query->paginate(10);
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

    public function filterModel($query, array $criteria)
    {
        $textFields = ['name', 'url', 'comment', 'request_data' , 'response_data', 'service'];

        foreach ($criteria as $key => $value) {
            if (in_array($textFields, [])) {
                $query->where($key, 'LIKE', $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query;
    }
}
