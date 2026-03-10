<?php

namespace App\Livewire\Dashboard\Portfolio\Sections;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\PortfolioSection;
use Livewire\Attributes\Locked;
use Livewire\TemporaryUploadedFile;

class UpdatePortfolioSection extends BasePortfolioForm
{
    #[Locked]
    public string $sectionKey;

    public PortfolioSection $section;

    public $title_ar;
    public $title_en;
    public $subtitle_ar;
    public $subtitle_en;
    public $image;
    public $is_active = true;
    public $sort_order = 0;
    public $description_ar;
    public $description_en;
    public $story_ar;
    public $story_en;
    public $availability_ar;
    public $availability_en;
    public $office_hours_ar;
    public $office_hours_en;

    public array $valueRows = [];
    public array $processRows = [];
    public array $openSourceRows = [];

    public function mount(string $sectionKey): void
    {
        abort_unless(config('portfolio.editable_sections.' . $sectionKey), 404);

        $this->sectionKey = $sectionKey;
        $this->section = PortfolioSection::query()->firstOrNew(['key' => $sectionKey]);

        $this->title_ar = $this->translationValue($this->section->title, 'ar');
        $this->title_en = $this->translationValue($this->section->title, 'en');
        $this->subtitle_ar = $this->translationValue($this->section->subtitle, 'ar');
        $this->subtitle_en = $this->translationValue($this->section->subtitle, 'en');
        $this->image = $this->section->image;
        $this->is_active = (bool) ($this->section->is_active ?? true);
        $this->sort_order = $this->section->sort_order ?? 0;

        $content = $this->section->content ?? [];
        $this->description_ar = $this->translationValue(data_get($content, 'description'), 'ar');
        $this->description_en = $this->translationValue(data_get($content, 'description'), 'en');
        $this->story_ar = $this->translationValue(data_get($content, 'story'), 'ar');
        $this->story_en = $this->translationValue(data_get($content, 'story'), 'en');
        $this->availability_ar = $this->translationValue(data_get($content, 'availability'), 'ar');
        $this->availability_en = $this->translationValue(data_get($content, 'availability'), 'en');
        $this->office_hours_ar = $this->translationValue(data_get($content, 'office_hours'), 'ar');
        $this->office_hours_en = $this->translationValue(data_get($content, 'office_hours'), 'en');

        $this->valueRows = $this->translatedRowsForForm($this->section->items, ['title', 'description']);
        $this->processRows = $this->translatedRowsForForm($this->section->items, ['title', 'description'], ['step']);
        $this->openSourceRows = $this->translatedRowsForForm($this->section->items, ['description'], ['name', 'url', 'language', 'stars']);
    }

    public function rules(): array
    {
        $rules = [
            'title_ar' => ['nullable', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'subtitle_ar' => ['nullable', 'string', 'max:255'],
            'subtitle_en' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'story_ar' => ['nullable', 'string'],
            'story_en' => ['nullable', 'string'],
            'availability_ar' => ['nullable', 'string'],
            'availability_en' => ['nullable', 'string'],
            'office_hours_ar' => ['nullable', 'string'],
            'office_hours_en' => ['nullable', 'string'],
            'valueRows.*.title_ar' => ['nullable', 'string', 'max:255'],
            'valueRows.*.title_en' => ['nullable', 'string', 'max:255'],
            'valueRows.*.description_ar' => ['nullable', 'string'],
            'valueRows.*.description_en' => ['nullable', 'string'],
            'processRows.*.step' => ['nullable', 'string', 'max:20'],
            'processRows.*.title_ar' => ['nullable', 'string', 'max:255'],
            'processRows.*.title_en' => ['nullable', 'string', 'max:255'],
            'processRows.*.description_ar' => ['nullable', 'string'],
            'processRows.*.description_en' => ['nullable', 'string'],
            'openSourceRows.*.name' => ['nullable', 'string', 'max:255'],
            'openSourceRows.*.description_ar' => ['nullable', 'string'],
            'openSourceRows.*.description_en' => ['nullable', 'string'],
            'openSourceRows.*.url' => ['nullable', 'url'],
            'openSourceRows.*.language' => ['nullable', 'string', 'max:100'],
            'openSourceRows.*.stars' => ['nullable', 'integer', 'min:0'],
        ];

        $rules['image'] = $this->image instanceof TemporaryUploadedFile
            ? ['nullable', 'image', 'max:4096']
            : ['nullable'];

        return $rules;
    }

    public function addValueRow(): void
    {
        $this->valueRows[] = [];
    }

    public function removeValueRow(int $index): void
    {
        unset($this->valueRows[$index]);
        $this->valueRows = array_values($this->valueRows);
    }

    public function addProcessRow(): void
    {
        $this->processRows[] = [];
    }

    public function removeProcessRow(int $index): void
    {
        unset($this->processRows[$index]);
        $this->processRows = array_values($this->processRows);
    }

    public function addOpenSourceRow(): void
    {
        $this->openSourceRows[] = [];
    }

    public function removeOpenSourceRow(int $index): void
    {
        unset($this->openSourceRows[$index]);
        $this->openSourceRows = array_values($this->openSourceRows);
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission('portfolio_home_sections_update');
        if ($this->sectionKey === 'about') {
            $this->authorizeDashboardPermission('portfolio_about_update');
        }

        $data = $this->validate();

        $this->section->key = $this->sectionKey;
        $this->section->image = $this->storeImage($this->image, $this->section->image, 'uploads/portfolio/sections');
        $this->section->title = $this->toTranslation($data['title_ar'] ?? '', $data['title_en'] ?? '', true);
        $this->section->subtitle = $this->toTranslation($data['subtitle_ar'] ?? '', $data['subtitle_en'] ?? '', true);
        $this->section->is_active = (bool) $data['is_active'];
        $this->section->sort_order = (int) ($data['sort_order'] ?? 0);
        $this->section->content = $this->sectionContent($data);
        $this->section->items = $this->sectionItems();
        $this->section->save();

        $this->notifySuccess(__('dashboard.portfolio-section-updated'));
    }

    protected function sectionContent(array $data): ?array
    {
        return match ($this->sectionKey) {
            'about' => ['story' => $this->toTranslation($data['story_ar'] ?? '', $data['story_en'] ?? '', true)],
            'contact.info' => [
                'availability' => $this->toTranslation($data['availability_ar'] ?? '', $data['availability_en'] ?? '', true),
                'office_hours' => $this->toTranslation($data['office_hours_ar'] ?? '', $data['office_hours_en'] ?? '', true),
            ],
            default => ['description' => $this->toTranslation($data['description_ar'] ?? '', $data['description_en'] ?? '', true)],
        };
    }

    protected function sectionItems(): ?array
    {
        return match ($this->sectionKey) {
            'about' => $this->translatedRows($this->valueRows, ['title', 'description']),
            'home.process' => $this->translatedRows($this->processRows, ['title', 'description'], ['step']),
            'home.open_source' => $this->translatedRows($this->openSourceRows, ['description'], ['name', 'url', 'language', 'stars']),
            default => null,
        };
    }

    public function render()
    {
        return view('dashboard.portfolio.sections.update-portfolio-section');
    }
}
