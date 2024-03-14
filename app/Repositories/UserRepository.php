<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    public function index(array $criteria)
    {
        $query = User::query();


        $users = $this->buildQuery($criteria, $query);

        return UserResource::collection($users);
    }

    public function buildQuery(array $criteria, Builder $query)
    {
        foreach ($criteria as $key => $value) {
            $query->where($key, 'LIKE', $value);
        }

        return $query->select('id', 'name', 'email')->get();
    }
}
