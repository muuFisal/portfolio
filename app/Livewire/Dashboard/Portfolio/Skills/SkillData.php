<?php

namespace App\Livewire\Dashboard\Portfolio\Skills;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SkillData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Skill::query()->orderByDesc('featured')->orderBy('sort_order')->orderBy('id');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.skills.skill-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Skill::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_skills_delete';
    }

    protected function searchColumns(): array
    {
        return ['title->ar', 'title->en', 'subtitle->ar', 'subtitle->en', 'category->ar', 'category->en'];
    }
}
