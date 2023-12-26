<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    protected Builder $builder;
    protected array $ar;

    private function getQueryParam(): array
    {
        return $this->ar;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->getQueryParam() as $nameFunction => $param) {
            if (method_exists($this, $nameFunction) && $param !== []) {
                $this->$nameFunction($param);
            }
        }

        return $this->builder;
    }
}
