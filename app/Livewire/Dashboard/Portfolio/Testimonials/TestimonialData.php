<?php

namespace App\Livewire\Dashboard\Portfolio\Testimonials;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Testimonial;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TestimonialData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Testimonial::query()->orderByDesc('featured')->orderBy('sort_order')->orderBy('id');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.testimonials.testimonial-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Testimonial::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_testimonials_delete';
    }

    protected function searchColumns(): array
    {
        return ['name', 'company', 'role->ar', 'role->en', 'quote->ar', 'quote->en'];
    }

    protected function deleteRecord(Model $record): void
    {
        app(ImageManger::class)->deleteImage($record->avatar);
        parent::deleteRecord($record);
    }
}
