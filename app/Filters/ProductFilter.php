<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends QueryFilter
{
    public function __construct(array $request)
    {
        $this->ar = $request;
    }

    protected function name($allQueryParam): Builder
    {
        $this->builder->where('name', 'like', '%' . $allQueryParam . '%');

        return $this->builder;
    }

    // можно сделать гибгим запрос на получения продуктов ( function getProducts(); )
    /*
    protected function with(array|string $queryParam): Builder
    {
        return $this->builder->when($queryParam, function ($query) use ($queryParam) {
            $query->with($queryParam);
        });
    }
    */
}
