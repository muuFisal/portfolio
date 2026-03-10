<?php

namespace App\Livewire\Dashboard\Portfolio\Experiences;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Experience;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ExperienceData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Experience::query()->orderBy('sort_order')->orderByDesc('start_date');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.experiences.experience-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Experience::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_experiences_delete';
    }

    protected function searchColumns(): array
    {
        return ['role->ar', 'role->en', 'company', 'location->ar', 'location->en'];
    }

    protected function deleteRecord(Model $record): void
    {
        app(ImageManger::class)->deleteImage($record->logo);
        parent::deleteRecord($record);
    }
}
