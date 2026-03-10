<?php

namespace App\Livewire\Dashboard\Portfolio\Projects;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Project;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProjectData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Project::query()->withCount('images')->orderByDesc('featured')->orderBy('sort_order')->orderByDesc('project_date');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.projects.project-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Project::query()->with('images')->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_projects_delete';
    }

    protected function searchColumns(): array
    {
        return ['title->ar', 'title->en', 'summary->ar', 'summary->en', 'slug', 'category', 'client_name'];
    }

    protected function deleteRecord(Model $record): void
    {
        $imageManager = app(ImageManger::class);
        $imageManager->deleteImage($record->cover_image);
        $imageManager->deleteImage($record->og_image);

        foreach ($record->images as $image) {
            $imageManager->deleteImage($image->image);
            $image->delete();
        }

        parent::deleteRecord($record);
    }
}
