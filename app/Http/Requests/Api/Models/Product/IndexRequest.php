<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Models\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'page' => 'int',
            'paginate' => 'int',
        ];
    }
}
