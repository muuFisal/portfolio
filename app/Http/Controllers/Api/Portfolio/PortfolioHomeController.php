<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\Portfolio\PortfolioAchievementResource;
use App\Http\Resources\Portfolio\PortfolioHeroResource;
use App\Http\Resources\Portfolio\PortfolioProjectCardResource;
use App\Http\Resources\Portfolio\PortfolioSectionResource;
use App\Http\Resources\Portfolio\PortfolioSkillResource;
use App\Services\Api\Portfolio\PortfolioContentService;

class PortfolioHomeController extends BaseApiController
{
    public function __construct(protected PortfolioContentService $contentService)
    {
    }

    public function hero()
    {
        return $this->success(new PortfolioHeroResource($this->contentService->hero()));
    }

    public function highlights()
    {
        $payload = $this->contentService->highlights();
        $payload['items'] = PortfolioAchievementResource::collection($payload['items'])->resolve();

        return $this->success(new PortfolioSectionResource($payload));
    }

    public function featuredProjects()
    {
        $payload = $this->contentService->featuredProjects();
        $payload['items'] = PortfolioProjectCardResource::collection($payload['items'])->resolve();

        return $this->success(new PortfolioSectionResource($payload));
    }

    public function process()
    {
        return $this->success(new PortfolioSectionResource($this->contentService->process()));
    }

    public function skillsShowcase()
    {
        $payload = $this->contentService->skillsShowcase();
        $payload['items'] = PortfolioSkillResource::collection($payload['items'])->resolve();

        return $this->success(new PortfolioSectionResource($payload));
    }

    public function openSource()
    {
        return $this->success(new PortfolioSectionResource($this->contentService->openSource()));
    }
}
