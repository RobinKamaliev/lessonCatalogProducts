<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Services\Api\Models\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_products(): void
    {
        Product::factory(5)->create();

        $productService = new ProductService();
        $countCreatedProducts = Product::query()->count();
        $countGetProducts = $productService->getProducts()->count();

        $this->assertEquals($countCreatedProducts, $countGetProducts);
    }

    public function test_get_products_paginate(): void
    {
        $countCreatedProducts = 50;
        Product::factory($countCreatedProducts)->create();

        $productService = new ProductService();
        $paginate = $productService::PAGINATE;
        $countGetProducts = $productService->getProducts()->count();

        $this->assertEquals($paginate, $countGetProducts);
        $this->assertNotEquals($countCreatedProducts, $countGetProducts);
    }
}
