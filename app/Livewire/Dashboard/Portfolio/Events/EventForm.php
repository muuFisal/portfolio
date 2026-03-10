<?php

namespace App\Livewire\Dashboard\Portfolio\Events;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Event;
use Livewire\TemporaryUploadedFile;

class EventForm extends BasePortfolioForm
{
    public Event $event;

    public $title_ar;
    public $title_en;
    public $type;
    public $location_ar;
    public $location_en;
    public $description_ar;
    public $description_en;
    public $url;
    public $cover_image;
    public $featured = false;
    public $date;
    public $sort_order = 0;

    public function mount(?Event $event = null): void
    {
        $this->event = $event ?? new Event();
        $this->title_ar = $this->translationValue($this->event->title, 'ar');
        $this->title_en = $this->translationValue($this->event->title, 'en');
        $this->type = $this->event->type;
        $this->location_ar = $this->translationValue($this->event->location, 'ar');
        $this->location_en = $this->translationValue($this->event->location, 'en');
        $this->description_ar = $this->translationValue($this->event->description, 'ar');
        $this->description_en = $this->translationValue($this->event->description, 'en');
        $this->url = $this->event->url;
        $this->cover_image = $this->event->cover_image;
        $this->featured = (bool) ($this->event->featured ?? false);
        $this->date = optional($this->event->date)->format('Y-m-d');
        $this->sort_order = $this->event->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'type' => ['nullable', 'string', 'max:100'],
            'location_ar' => ['nullable', 'string', 'max:255'],
            'location_en' => ['nullable', 'string', 'max:255'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'url' => ['nullable', 'url'],
            'cover_image' => $this->cover_image instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
            'featured' => ['boolean'],
            'date' => ['nullable', 'date'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->event->exists ? 'portfolio_events_update' : 'portfolio_events_create');

        $data = $this->validate();

        $this->event->cover_image = $this->storeImage($this->cover_image, $this->event->cover_image, 'uploads/portfolio/events');
        $this->event->fill([
            'title' => $this->toTranslation($data['title_ar'], $data['title_en']),
            'type' => $data['type'] ?? null,
            'location' => $this->toTranslation($data['location_ar'] ?? '', $data['location_en'] ?? '', true),
            'description' => $this->toTranslation($data['description_ar'] ?? '', $data['description_en'] ?? '', true),
            'url' => $data['url'] ?? null,
            'featured' => (bool) $data['featured'],
            'date' => $data['date'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->event->save();
        $this->notifySuccess($this->event->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.events.event-form');
    }
}
