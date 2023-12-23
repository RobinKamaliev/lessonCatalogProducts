<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Models;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Models\Product\IndexRequest;
use App\Http\Resources\Product\IndexProductResource;
use App\Services\Api\Models\ProductService;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    public function __invoke(ProductService $service, IndexRequest $request): JsonResource
    {
        $products = $service->getProducts($request->validated());

        return IndexProductResource::collection($products);
    }
}
