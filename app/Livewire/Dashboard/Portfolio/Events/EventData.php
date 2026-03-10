<?php

namespace App\Livewire\Dashboard\Portfolio\Events;

use App\Livewire\Dashboard\Portfolio\BasePortfolioTable;
use App\Models\Event;
use App\Utils\ImageManger;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EventData extends BasePortfolioTable
{
    protected function query(): Builder
    {
        return Event::query()->orderByDesc('featured')->orderBy('sort_order')->orderByDesc('date');
    }

    protected function viewName(): string
    {
        return 'dashboard.portfolio.events.event-data';
    }

    protected function resolveRecord(int $id): Model
    {
        return Event::query()->findOrFail($id);
    }

    protected function deletePermission(): string
    {
        return 'portfolio_events_delete';
    }

    protected function searchColumns(): array
    {
        return ['title->ar', 'title->en', 'type', 'location->ar', 'location->en'];
    }

    protected function deleteRecord(Model $record): void
    {
        app(ImageManger::class)->deleteImage($record->cover_image);
        parent::deleteRecord($record);
    }
}
