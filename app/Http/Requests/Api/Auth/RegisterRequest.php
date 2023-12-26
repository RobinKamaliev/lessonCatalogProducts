<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fio' => ['required', 'min:5', 'max:50'],
            'phone_number' => ['required', 'min:5', 'max:15', 'unique:users'],
            'password' => ['required', 'min:8', 'max:20', 'confirmed'],
            'email' => ['required', 'min:5', 'max:15', 'unique:users']
        ];
    }
}
