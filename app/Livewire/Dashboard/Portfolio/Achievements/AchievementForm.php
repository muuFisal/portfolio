<?php

namespace App\Livewire\Dashboard\Portfolio\Achievements;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Achievement;

class AchievementForm extends BasePortfolioForm
{
    public Achievement $achievement;

    public $title_ar;
    public $title_en;
    public $description_ar;
    public $description_en;
    public $icon;
    public $value;
    public $unit;
    public $sort_order = 0;

    public function mount(?Achievement $achievement = null): void
    {
        $this->achievement = $achievement ?? new Achievement();
        $this->title_ar = $this->translationValue($this->achievement->title, 'ar');
        $this->title_en = $this->translationValue($this->achievement->title, 'en');
        $this->description_ar = $this->translationValue($this->achievement->description, 'ar');
        $this->description_en = $this->translationValue($this->achievement->description, 'en');
        $this->icon = $this->achievement->icon;
        $this->value = $this->achievement->value;
        $this->unit = $this->achievement->unit;
        $this->sort_order = $this->achievement->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'value' => ['required', 'integer', 'min:0'],
            'unit' => ['nullable', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->achievement->exists ? 'portfolio_achievements_update' : 'portfolio_achievements_create');

        $data = $this->validate();

        $this->achievement->fill([
            'title' => $this->toTranslation($data['title_ar'], $data['title_en']),
            'description' => $this->toTranslation($data['description_ar'] ?? '', $data['description_en'] ?? '', true),
            'icon' => $data['icon'] ?? null,
            'value' => $data['value'],
            'unit' => $data['unit'] ?? null,
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->achievement->save();
        $this->notifySuccess($this->achievement->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.achievements.achievement-form');
    }
}
