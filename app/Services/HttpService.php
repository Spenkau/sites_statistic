<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

abstract class HttpService
{
    protected Model $model;

    protected $repository;

    protected $service;

    public function __construct()
    {
    }

    public function all(?Request $request)
    {
        $criteria = $request->all();

        return $this->repository->all();
    }
}
