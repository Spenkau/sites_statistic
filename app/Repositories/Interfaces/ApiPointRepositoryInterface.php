<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

interface ApiPointRepositoryInterface
{
    public function all();

    public function show(int $id);

    public function store(array $data);
}
