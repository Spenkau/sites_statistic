<?php

namespace App\Http\Filters;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

abstract class BaseFilter
{
    protected $builder;

    protected $request;

    protected $prohibitedFields = ['page', 'user_id'];

    protected $stringFields = ['name', 'title', 'url', 'comment', 'request_data', 'response_data'];

    public function __construct()
    {
    }

    public function apply($builder, $criteria)
    {
        $criteria = array_diff_key($criteria, array_flip($this->prohibitedFields));

        $this->builder = $builder;

        foreach ($criteria as $key=>$value) {
            if (str_ends_with($key, '_operator')) {
                continue;
            }

            if (in_array($key, $this->stringFields)) {
                $this->builder->where($key, 'LIKE', '%'.$value.'%');
            } else {
                $this->builder->where($key, $criteria[$key.'_operator'] ?? '=', $value);
            }
        }

        return $this->builder;
    }
}
