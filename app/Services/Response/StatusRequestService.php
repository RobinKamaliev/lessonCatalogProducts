<?php

declare(strict_types=1);

namespace App\Services\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class StatusRequestService
{
    public static function responseBadRequest(string $error): JsonResponse
    {
        return response()
            ->json(['error' => $error])
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    public static function responseSuccessRequest(array $messages): JsonResponse
    {
        return response()
            ->json(['data' => $messages])
            ->setStatusCode(Response::HTTP_OK);
    }

    public static function responseUnauthorizedRequest(): JsonResponse
    {
        return response()
            ->json(['error' => 'Unauthorized'])
            ->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }
}
