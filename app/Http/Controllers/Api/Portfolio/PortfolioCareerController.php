<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\Portfolio\PortfolioEventResource;
use App\Http\Resources\Portfolio\PortfolioExperienceResource;
use App\Http\Resources\Portfolio\PortfolioSkillResource;
use App\Http\Resources\Portfolio\PortfolioTestimonialResource;
use App\Services\Api\Portfolio\PortfolioCareerService;

class PortfolioCareerController extends BaseApiController
{
    public function __construct(protected PortfolioCareerService $careerService)
    {
    }

    public function experiences()
    {
        $items = PortfolioExperienceResource::collection($this->careerService->experiences())->resolve();

        return $this->success([
            'items' => $items,
            'filters' => null,
            'summary' => [
                'total_items' => count($items),
                'current_items' => collect($items)->where('is_current', true)->count(),
            ],
        ]);
    }

    public function skills()
    {
        $items = PortfolioSkillResource::collection($this->careerService->skills())->resolve();

        return $this->success([
            'items' => $items,
            'filters' => null,
            'summary' => [
                'total_items' => count($items),
                'featured_items' => collect($items)->where('featured', true)->count(),
            ],
        ]);
    }

    public function events()
    {
        $items = PortfolioEventResource::collection($this->careerService->events())->resolve();

        return $this->success([
            'items' => $items,
            'filters' => null,
            'summary' => [
                'total_items' => count($items),
                'featured_items' => collect($items)->where('featured', true)->count(),
            ],
        ]);
    }

    public function testimonials()
    {
        $items = PortfolioTestimonialResource::collection($this->careerService->testimonials())->resolve();

        return $this->success([
            'items' => $items,
            'filters' => null,
            'summary' => [
                'total_items' => count($items),
                'featured_items' => collect($items)->where('featured', true)->count(),
            ],
        ]);
    }
}
