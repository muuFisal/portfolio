<?php

namespace App\Repositories\Api\Portfolio;

use App\Models\ContactMessage;
use App\Models\PortfolioComment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PortfolioInteractionRepository
{
    public function paginateComments(array $filters, int $perPage): LengthAwarePaginator
    {
        return PortfolioComment::query()
            ->where('status', 'approved')
            ->when(array_key_exists('featured', $filters), fn ($query) => $query->where('featured', (bool) $filters['featured']))
            ->orderByDesc('featured')
            ->orderByDesc('approved_at')
            ->paginate($perPage);
    }

    public function createComment(array $payload): PortfolioComment
    {
        return PortfolioComment::query()->create($payload);
    }

    public function createContact(array $payload): ContactMessage
    {
        return ContactMessage::query()->create($payload);
    }
}
