<?php

declare(strict_types=1);

namespace App\Http\Controllers\Documentation;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Catalog  Products",
 *      description="
 * Для получения доступа к запросам нужно  получить токен (auth).
 * Полученный токен сохранить в authorize.",
 * )
 *
 * @OA\Compontents(
 *
 *      @OA\SecurityScheme(
 *          securityScheme="bearerAuth",
 *          type="http",
 *          scheme="bearer"
 *      )
 *)
 *
 * @OA\Post(
 *        path="/api/auth/register",
 *        tags={"Authentication"},
 *        summary="Register a new user",
 *        description="Registers a new user with the provided information",
 *        @OA\RequestBody(
 *            required=true,
 *            description="User registration data",
 *            @OA\JsonContent(
 *                @OA\Property(property="fio", type="string", example="ewqweqwe"),
 *                @OA\Property(property="phone_number", type="string", example="312123312"),
 *                @OA\Property(property="password", type="string", example="123123123"),
 *                @OA\Property(property="password_confirmation", type="string", example="123123123"),
 *                @OA\Property(property="email", type="string", example="addas@mail.ru")
 *            )
 *        ),
 *        @OA\Response(
 *              response=200,
 *              description="successful operation",
 *              @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="messages", type="string", example="User created"),
 *                      @OA\Property(property="token", type="string"),
 *                  ),
 *             ),
 *        ),
 *        @OA\Response(
 *              response=404,
 *              description="successful operation",
 *              @OA\JsonContent(
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="error", type="string", example="User not created|token not found"),
 *                  ),
 *             ),
 *        ),
 *  )
 *
 * @OA\Post(
 *         path="/api/auth/login",
 *         tags={"Authentication"},
 *         summary="Register a new user",
 *         description="Registers a new user with the provided information",
 *         @OA\RequestBody(
 *             required=true,
 *             description="User registration data",
 *             @OA\JsonContent(
 *                 @OA\Property(property="login", type="string", example="312123312"),
 *                 @OA\Property(property="password", type="string", example="123123123"),
 *             )
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="successful operation",
 *             @OA\JsonContent(
 *                 @OA\Property(property="data", type="object",
 *                     @OA\Property(property="token", type="string"),
 *                 ),
 *            ),
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="http not found",
 *             @OA\JsonContent(
 *                 @OA\Property(property="error", type="string", example="token not found"),
 *            ),
 *         ),
 *         @OA\Response(
 *             response=401,
 *             description="http unauthorized",
 *             @OA\JsonContent(
 *                 @OA\Property(property="error", type="string", example="Unauthorized"),
 *            ),
 *         ),
 *   )
 */
class Documentation
{
}
