<?php

namespace App\Livewire\Dashboard\Portfolio\Skills;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Skill;

class SkillForm extends BasePortfolioForm
{
    public Skill $skill;

    public $title_ar;
    public $title_en;
    public $subtitle_ar;
    public $subtitle_en;
    public $category_ar;
    public $category_en;
    public $level_label_ar;
    public $level_label_en;
    public $icon;
    public $percent;
    public $featured = false;
    public $sort_order = 0;

    public function mount(?Skill $skill = null): void
    {
        $this->skill = $skill ?? new Skill();
        $this->title_ar = $this->translationValue($this->skill->title, 'ar');
        $this->title_en = $this->translationValue($this->skill->title, 'en');
        $this->subtitle_ar = $this->translationValue($this->skill->subtitle, 'ar');
        $this->subtitle_en = $this->translationValue($this->skill->subtitle, 'en');
        $this->category_ar = $this->translationValue($this->skill->category, 'ar');
        $this->category_en = $this->translationValue($this->skill->category, 'en');
        $this->level_label_ar = $this->translationValue($this->skill->level_label, 'ar');
        $this->level_label_en = $this->translationValue($this->skill->level_label, 'en');
        $this->icon = $this->skill->icon;
        $this->percent = $this->skill->percent;
        $this->featured = (bool) ($this->skill->featured ?? false);
        $this->sort_order = $this->skill->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'title_ar' => ['required', 'string', 'max:255'],
            'title_en' => ['required', 'string', 'max:255'],
            'subtitle_ar' => ['nullable', 'string', 'max:255'],
            'subtitle_en' => ['nullable', 'string', 'max:255'],
            'category_ar' => ['nullable', 'string', 'max:255'],
            'category_en' => ['nullable', 'string', 'max:255'],
            'level_label_ar' => ['nullable', 'string', 'max:255'],
            'level_label_en' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'percent' => ['required', 'integer', 'min:0', 'max:100'],
            'featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->skill->exists ? 'portfolio_skills_update' : 'portfolio_skills_create');

        $data = $this->validate();

        $this->skill->fill([
            'title' => $this->toTranslation($data['title_ar'], $data['title_en']),
            'subtitle' => $this->toTranslation($data['subtitle_ar'] ?? '', $data['subtitle_en'] ?? '', true),
            'category' => $this->toTranslation($data['category_ar'] ?? '', $data['category_en'] ?? '', true),
            'level_label' => $this->toTranslation($data['level_label_ar'] ?? '', $data['level_label_en'] ?? '', true),
            'icon' => $data['icon'] ?? null,
            'percent' => $data['percent'],
            'featured' => (bool) $data['featured'],
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->skill->save();
        $this->notifySuccess($this->skill->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.skills.skill-form');
    }
}
