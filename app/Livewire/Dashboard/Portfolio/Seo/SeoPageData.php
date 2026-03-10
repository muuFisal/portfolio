<?php

namespace App\Livewire\Dashboard\Portfolio\Seo;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\PortfolioPage;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SeoPageData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return PortfolioPage::query()->orderBy('page_key');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.seo.seo-page-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return PortfolioPage::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_seo_pages_delete';
    }

    protected function searchColumns(): array
    {
        return ['page_key', 'title->ar', 'title->en', 'seo_title->ar', 'seo_title->en'];
    }

    protected function deleteRecord(Model $record): void
    {
        app(ImageManger::class)->deleteImage($record->og_image);
        parent::deleteRecord($record);
    }
}
