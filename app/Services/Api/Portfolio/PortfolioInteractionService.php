<?php

namespace App\Services\Api\Portfolio;

use App\Repositories\Api\Portfolio\PortfolioInteractionRepository;
use App\Utils\ImageManger;
use Illuminate\Http\Request;

class PortfolioInteractionService
{
    public function __construct(
        protected PortfolioInteractionRepository $interactionRepository,
        protected ImageManger $imageManger,
    ) {
    }

    public function comments(array $filters): array
    {
        $perPage = (int) ($filters['per_page'] ?? 10);
        $perPage = $perPage > 0 ? min($perPage, 50) : 10;

        return [
            'paginator' => $this->interactionRepository->paginateComments($filters, $perPage),
        ];
    }

    public function createComment(array $payload, Request $request)
    {
        if (isset($payload['avatar'])) {
            $payload['avatar'] = $this->imageManger->uploadImage('uploads/comments', $payload['avatar'], 'public');
        }

        $payload['status'] = 'pending';
        $payload['featured'] = false;
        $payload['ip_address'] = $request->ip();
        $payload['user_agent'] = (string) $request->userAgent();

        return $this->interactionRepository->createComment($payload);
    }

    public function createContact(array $payload, Request $request)
    {
        $payload['status'] = 'new';
        $payload['subject'] = $payload['service_interest'] ?? null;
        $payload['ip_address'] = $request->ip();
        $payload['user_agent'] = (string) $request->userAgent();

        return $this->interactionRepository->createContact($payload);
    }
}
