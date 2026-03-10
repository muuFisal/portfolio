<?php

namespace App\Livewire\Dashboard\Portfolio\Experiences;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Experience;
use Livewire\TemporaryUploadedFile;

class ExperienceForm extends BasePortfolioForm
{
    public Experience $experience;

    public $role_ar;
    public $role_en;
    public $company;
    public $summary_ar;
    public $summary_en;
    public $location_ar;
    public $location_en;
    public $employment_type_ar;
    public $employment_type_en;
    public $company_url;
    public $logo;
    public $start_date;
    public $end_date;
    public $highlights_ar;
    public $highlights_en;
    public $sort_order = 0;

    public function mount(?Experience $experience = null): void
    {
        $this->experience = $experience ?? new Experience();
        $this->role_ar = $this->translationValue($this->experience->role, 'ar');
        $this->role_en = $this->translationValue($this->experience->role, 'en');
        $this->company = $this->experience->company;
        $this->summary_ar = $this->translationValue($this->experience->summary, 'ar');
        $this->summary_en = $this->translationValue($this->experience->summary, 'en');
        $this->location_ar = $this->translationValue($this->experience->location, 'ar');
        $this->location_en = $this->translationValue($this->experience->location, 'en');
        $this->employment_type_ar = $this->translationValue($this->experience->employment_type, 'ar');
        $this->employment_type_en = $this->translationValue($this->experience->employment_type, 'en');
        $this->company_url = $this->experience->company_url;
        $this->logo = $this->experience->logo;
        $this->start_date = optional($this->experience->start_date)->format('Y-m-d');
        $this->end_date = optional($this->experience->end_date)->format('Y-m-d');
        $this->highlights_ar = $this->translatedLinesToText($this->experience->highlights, 'ar');
        $this->highlights_en = $this->translatedLinesToText($this->experience->highlights, 'en');
        $this->sort_order = $this->experience->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'role_ar' => ['required', 'string', 'max:255'],
            'role_en' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'summary_ar' => ['nullable', 'string'],
            'summary_en' => ['nullable', 'string'],
            'location_ar' => ['nullable', 'string', 'max:255'],
            'location_en' => ['nullable', 'string', 'max:255'],
            'employment_type_ar' => ['nullable', 'string', 'max:255'],
            'employment_type_en' => ['nullable', 'string', 'max:255'],
            'company_url' => ['nullable', 'url'],
            'logo' => $this->logo instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'highlights_ar' => ['nullable', 'string'],
            'highlights_en' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->experience->exists ? 'portfolio_experiences_update' : 'portfolio_experiences_create');

        $data = $this->validate();

        $this->experience->logo = $this->storeImage($this->logo, $this->experience->logo, 'uploads/portfolio/experiences');
        $this->experience->fill([
            'role' => $this->toTranslation($data['role_ar'], $data['role_en']),
            'company' => $data['company'],
            'summary' => $this->toTranslation($data['summary_ar'] ?? '', $data['summary_en'] ?? '', true),
            'location' => $this->toTranslation($data['location_ar'] ?? '', $data['location_en'] ?? '', true),
            'employment_type' => $this->toTranslation($data['employment_type_ar'] ?? '', $data['employment_type_en'] ?? '', true),
            'company_url' => $data['company_url'] ?? null,
            'start_date' => $data['start_date'] ?? null,
            'end_date' => $data['end_date'] ?? null,
            'highlights' => $this->translatedLines($data['highlights_ar'] ?? null, $data['highlights_en'] ?? null),
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->experience->save();
        $this->notifySuccess($this->experience->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.experiences.experience-form');
    }
}
