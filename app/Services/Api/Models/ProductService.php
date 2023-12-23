<?php

declare(strict_types=1);

namespace App\Services\Api\Models;

use App\Filters\ProductFilter;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    const PAGINATE = 40;
    const PAGE = 1;

    public function getProducts(array $data): LengthAwarePaginator
    {
        $paginate = $data['paginate'] ?? $this::PAGINATE;
        $page = $data['page'] ?? $this::PAGE;

        return Product::filter(new ProductFilter($data))
            ->with('properties') // можно сделать гибгим, т.е добавить в фильтрацию
            ->paginate($paginate, ['*'], 'page', $page);
    }
}
