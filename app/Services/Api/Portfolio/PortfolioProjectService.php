<?php

namespace App\Services\Api\Portfolio;

use App\Repositories\Api\Portfolio\PortfolioProjectRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PortfolioProjectService
{
    public function __construct(protected PortfolioProjectRepository $projectRepository)
    {
    }

    public function paginate(array $filters): array
    {
        $perPage = (int) ($filters['per_page'] ?? 9);
        $perPage = $perPage > 0 ? min($perPage, 50) : 9;

        /** @var LengthAwarePaginator $paginator */
        $paginator = $this->projectRepository->paginate($filters, $perPage);

        return [
            'paginator' => $paginator,
            'filters' => [
                'categories' => $this->projectRepository->availableCategories(),
                'tags' => $this->projectRepository->availableTags(),
            ],
        ];
    }

    public function findBySlug(string $slug)
    {
        return $this->projectRepository->findBySlug($slug);
    }
}
