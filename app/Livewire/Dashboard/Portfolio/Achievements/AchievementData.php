<?php

namespace App\Livewire\Dashboard\Portfolio\Achievements;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Achievement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AchievementData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Achievement::query()->orderBy('sort_order')->orderBy('id');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.achievements.achievement-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Achievement::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_achievements_delete';
    }

    protected function searchColumns(): array
    {
        return ['title->ar', 'title->en', 'description->ar', 'description->en', 'icon'];
    }
}
