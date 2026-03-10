<?php

namespace App\Repositories\Api\Portfolio;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PortfolioProjectRepository
{
    public function paginate(array $filters, int $perPage): LengthAwarePaginator
    {
        $query = Project::query()->with('images');

        if (array_key_exists('featured', $filters)) {
            $query->where('featured', (bool) $filters['featured']);
        }

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (! empty($filters['tag'])) {
            $query->whereJsonContains('tags', $filters['tag']);
        }

        return $query
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('project_date')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): Project
    {
        return Project::query()
            ->with('images')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function featured(int $limit = 3): Collection
    {
        return Project::query()
            ->with('images')
            ->where('featured', true)
            ->orderBy('sort_order')
            ->orderByDesc('project_date')
            ->limit($limit)
            ->get();
    }

    public function availableCategories(): array
    {
        return Project::query()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category')
            ->unique()
            ->values()
            ->all();
    }

    public function availableTags(): array
    {
        return Project::query()
            ->pluck('tags')
            ->flatten(1)
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();
    }
}
