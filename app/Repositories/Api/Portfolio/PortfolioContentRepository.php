<?php

namespace App\Repositories\Api\Portfolio;

use App\Models\Achievement;
use App\Models\PortfolioNavLink;
use App\Models\PortfolioPage;
use App\Models\PortfolioProfile;
use App\Models\PortfolioSection;
use App\Models\Setting;
use Illuminate\Support\Collection;

class PortfolioContentRepository
{
    public function getSettings(): Setting
    {
        return Setting::query()->firstOrFail();
    }

    public function getNavigation(): Collection
    {
        return PortfolioNavLink::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    public function getSeoPage(string $pageKey): PortfolioPage
    {
        return PortfolioPage::query()->where('page_key', $pageKey)->firstOrFail();
    }

    public function getProfile(): PortfolioProfile
    {
        return PortfolioProfile::query()
            ->where('is_active', true)
            ->latest('id')
            ->firstOrFail();
    }

    public function getSection(string $key): PortfolioSection
    {
        return PortfolioSection::query()
            ->where('key', $key)
            ->where('is_active', true)
            ->firstOrFail();
    }

    public function getAchievements(): Collection
    {
        return Achievement::query()
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();
    }
}
