<?php

namespace App\Http\Requests\Api\Portfolio;

use Illuminate\Foundation\Http\FormRequest;

class StorePortfolioContactRequest extends FormRequest
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
            'phone' => ['nullable', 'string', 'max:50'],
            'company' => ['nullable', 'string', 'max:255'],
            'service_interest' => ['nullable', 'string', 'max:255'],
            'budget_range' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'max:100'],
        ];
    }
}
