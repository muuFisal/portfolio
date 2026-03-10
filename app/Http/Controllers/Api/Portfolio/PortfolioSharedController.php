<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\Portfolio\PortfolioAboutResource;
use App\Http\Resources\Portfolio\PortfolioNavigationLinkResource;
use App\Http\Resources\Portfolio\PortfolioProfileResource;
use App\Http\Resources\Portfolio\PortfolioSeoPageResource;
use App\Http\Resources\Portfolio\PortfolioSettingsResource;
use App\Services\Api\Portfolio\PortfolioContentService;

class PortfolioSharedController extends BaseApiController
{
    public function __construct(protected PortfolioContentService $contentService)
    {
    }

    public function settings()
    {
        return $this->success(new PortfolioSettingsResource($this->contentService->settings()));
    }

    public function navigation()
    {
        $items = PortfolioNavigationLinkResource::collection($this->contentService->navigation())->resolve();

        return $this->success([
            'items' => $items,
            'filters' => null,
            'summary' => [
                'total_items' => count($items),
            ],
        ]);
    }

    public function seoPage(string $pageKey)
    {
        return $this->success(new PortfolioSeoPageResource($this->contentService->seoPage($pageKey)));
    }

    public function profile()
    {
        return $this->success(new PortfolioProfileResource($this->contentService->profile()));
    }

    public function about()
    {
        return $this->success(new PortfolioAboutResource($this->contentService->about()));
    }
}
