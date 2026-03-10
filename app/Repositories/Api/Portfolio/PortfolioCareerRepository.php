<?php

namespace App\Repositories\Api\Portfolio;

use App\Models\Event;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Support\Collection;

class PortfolioCareerRepository
{
    public function experiences(): Collection
    {
        return Experience::query()
            ->orderBy('sort_order')
            ->orderByDesc('start_date')
            ->get();
    }

    public function skills(?bool $featured = null): Collection
    {
        return Skill::query()
            ->when($featured !== null, fn ($query) => $query->where('featured', $featured))
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->get();
    }

    public function events(): Collection
    {
        return Event::query()
            ->orderBy('sort_order')
            ->orderByDesc('date')
            ->get();
    }

    public function testimonials(): Collection
    {
        return Testimonial::query()
            ->orderByDesc('featured')
            ->orderBy('sort_order')
            ->get();
    }
}
