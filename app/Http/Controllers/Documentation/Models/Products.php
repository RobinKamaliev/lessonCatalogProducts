<?php

declare(strict_types=1);

namespace App\Http\Controllers\Documentation\Models;

/**
 *  * @OA\Get(
 *      path="/api/products",
 *      tags={"Products"},
 *      description="get products",
 *      security={{"bearerAuth": {} }},
 *
 *      @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id", type="string"),
 *                  @OA\Property(property="name", type="string"),
 *                  @OA\Property(property="price", type="float"),
 *                  @OA\Property(property="amount", type="integer"),
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="name", type="string"),
 *                      @OA\Property(property="value", type="string"),
 *                  ),
 *              ),
 *          ),
 *       ),
 *      @OA\Response(response=401, description="['messeges' => 'Unauthenticated.']"),
 * )
 */
class Products
{
}
