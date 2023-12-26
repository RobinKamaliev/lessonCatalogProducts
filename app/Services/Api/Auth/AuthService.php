<?php

declare(strict_types=1);

namespace App\Services\Api\Auth;

use App\Models\User;
use App\Services\Response\StatusRequestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function getTokenUser(array $data): JsonResponse
    {
        $fieldType = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';

        $credentials = [
            $fieldType => $data['login'],
            'password' => $data['password'],
        ];

        $isAuth = auth()->attempt($credentials);
        $user = Auth::user();
        $token = $this->getToken($user);

        if ($error = $this->validateFotTokenUser($isAuth, $token)) {
            return $error;
        }

        return StatusRequestService::responseSuccessRequest(['token' => $token]);
    }

    public function createUser(array $data): JsonResponse
    {
        try {
            $user = User::query()->create($data);
        } catch (\Exception) {
            return StatusRequestService::responseBadRequest('User not created');
        }

        if (!$token = $this->getToken($user)) {
            return StatusRequestService::responseBadRequest('token not found');
        }

        return StatusRequestService::responseSuccessRequest(['messages' => 'User created', 'token' => $token]);
    }

    protected function getToken(?User $user): ?string
    {
        return $user?->createToken('name')->plainTextToken;
    }

    private function validateFotTokenUser(bool $isAuth, ?string $token): ?JsonResponse
    {
        if (!$isAuth) {
            return StatusRequestService::responseUnauthorizedRequest();
        }

        if (!$token) {
            return StatusRequestService::responseBadRequest('token not found');
        }

        return null;
    }
}
