<?php

namespace App\Http\Requests\Api\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:4000'],
            'rating' => ['nullable', 'integer', 'between:1,5'],
            'avatar' => ['nullable', 'image', 'max:4096'],
            'source' => ['nullable', 'string', 'max:100'],
        ];
    }
}
