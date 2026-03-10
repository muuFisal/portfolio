<?php

namespace App\Livewire\Dashboard\Portfolio\Profile;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\PortfolioProfile;
use Livewire\TemporaryUploadedFile;

class UpdatePortfolioProfile extends BasePortfolioForm
{
    public PortfolioProfile $profile;

    public $full_name;
    public $headline_ar;
    public $headline_en;
    public $short_bio_ar;
    public $short_bio_en;
    public $long_bio_ar;
    public $long_bio_en;
    public $location_ar;
    public $location_en;
    public $email;
    public $phone;
    public $availability_text_ar;
    public $availability_text_en;
    public $years_experience;
    public $projects_delivered;
    public $clients_count;
    public $focus_areas_ar;
    public $focus_areas_en;
    public $hero_badges_ar;
    public $hero_badges_en;
    public $primary_cta_label_ar;
    public $primary_cta_label_en;
    public $primary_cta_url;
    public $secondary_cta_label_ar;
    public $secondary_cta_label_en;
    public $secondary_cta_url;
    public $resume;
    public $profile_image;
    public $is_active = true;

    public function mount(): void
    {
        $this->profile = PortfolioProfile::query()->latest('id')->first() ?? new PortfolioProfile();

        $this->full_name = $this->profile->full_name;
        $this->headline_ar = $this->translationValue($this->profile->headline, 'ar');
        $this->headline_en = $this->translationValue($this->profile->headline, 'en');
        $this->short_bio_ar = $this->translationValue($this->profile->short_bio, 'ar');
        $this->short_bio_en = $this->translationValue($this->profile->short_bio, 'en');
        $this->long_bio_ar = $this->translationValue($this->profile->long_bio, 'ar');
        $this->long_bio_en = $this->translationValue($this->profile->long_bio, 'en');
        $this->location_ar = $this->translationValue($this->profile->location, 'ar');
        $this->location_en = $this->translationValue($this->profile->location, 'en');
        $this->email = $this->profile->email;
        $this->phone = $this->profile->phone;
        $this->availability_text_ar = $this->translationValue($this->profile->availability_text, 'ar');
        $this->availability_text_en = $this->translationValue($this->profile->availability_text, 'en');
        $this->years_experience = $this->profile->years_experience;
        $this->projects_delivered = $this->profile->projects_delivered;
        $this->clients_count = $this->profile->clients_count;
        $this->focus_areas_ar = $this->translatedLinesToText($this->profile->focus_areas, 'ar');
        $this->focus_areas_en = $this->translatedLinesToText($this->profile->focus_areas, 'en');
        $this->hero_badges_ar = $this->translatedLinesToText($this->profile->hero_badges, 'ar');
        $this->hero_badges_en = $this->translatedLinesToText($this->profile->hero_badges, 'en');
        $this->primary_cta_label_ar = $this->translationValue($this->profile->primary_cta_label, 'ar');
        $this->primary_cta_label_en = $this->translationValue($this->profile->primary_cta_label, 'en');
        $this->primary_cta_url = $this->profile->primary_cta_url;
        $this->secondary_cta_label_ar = $this->translationValue($this->profile->secondary_cta_label, 'ar');
        $this->secondary_cta_label_en = $this->translationValue($this->profile->secondary_cta_label, 'en');
        $this->secondary_cta_url = $this->profile->secondary_cta_url;
        $this->resume = $this->profile->resume;
        $this->profile_image = $this->profile->profile_image;
        $this->is_active = (bool) ($this->profile->is_active ?? true);
    }

    public function rules(): array
    {
        $rules = [
            'full_name' => ['required', 'string', 'max:255'],
            'headline_ar' => ['required', 'string', 'max:255'],
            'headline_en' => ['required', 'string', 'max:255'],
            'short_bio_ar' => ['required', 'string'],
            'short_bio_en' => ['required', 'string'],
            'long_bio_ar' => ['nullable', 'string'],
            'long_bio_en' => ['nullable', 'string'],
            'location_ar' => ['nullable', 'string', 'max:255'],
            'location_en' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'availability_text_ar' => ['nullable', 'string'],
            'availability_text_en' => ['nullable', 'string'],
            'years_experience' => ['nullable', 'integer', 'min:0'],
            'projects_delivered' => ['nullable', 'integer', 'min:0'],
            'clients_count' => ['nullable', 'integer', 'min:0'],
            'focus_areas_ar' => ['nullable', 'string'],
            'focus_areas_en' => ['nullable', 'string'],
            'hero_badges_ar' => ['nullable', 'string'],
            'hero_badges_en' => ['nullable', 'string'],
            'primary_cta_label_ar' => ['nullable', 'string', 'max:255'],
            'primary_cta_label_en' => ['nullable', 'string', 'max:255'],
            'primary_cta_url' => ['nullable', 'string', 'max:255'],
            'secondary_cta_label_ar' => ['nullable', 'string', 'max:255'],
            'secondary_cta_label_en' => ['nullable', 'string', 'max:255'],
            'secondary_cta_url' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ];

        $rules['profile_image'] = $this->profile_image instanceof TemporaryUploadedFile
            ? ['nullable', 'image', 'max:4096']
            : ['nullable'];

        $rules['resume'] = $this->resume instanceof TemporaryUploadedFile
            ? ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:8192']
            : ['nullable'];

        return $rules;
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission('portfolio_profile_update');

        $data = $this->validate();

        if (! $this->profile->exists) {
            $this->profile->save();
        }

        $this->profile->profile_image = $this->storeImage($this->profile_image, $this->profile->profile_image, 'uploads/portfolio/profile');
        $this->profile->resume = $this->storeFile($this->resume, $this->profile->resume, 'uploads/portfolio/files');

        $this->profile->fill([
            'full_name' => $data['full_name'],
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
            'years_experience' => $data['years_experience'] ?? null,
            'projects_delivered' => $data['projects_delivered'] ?? null,
            'clients_count' => $data['clients_count'] ?? null,
            'focus_areas' => $this->translatedLines($data['focus_areas_ar'] ?? null, $data['focus_areas_en'] ?? null),
            'hero_badges' => $this->translatedLines($data['hero_badges_ar'] ?? null, $data['hero_badges_en'] ?? null),
            'primary_cta_url' => $data['primary_cta_url'] ?? null,
            'secondary_cta_url' => $data['secondary_cta_url'] ?? null,
            'is_active' => (bool) $data['is_active'],
        ]);

        $this->profile->headline = $this->toTranslation($data['headline_ar'], $data['headline_en']);
        $this->profile->short_bio = $this->toTranslation($data['short_bio_ar'], $data['short_bio_en']);
        $this->profile->long_bio = $this->toTranslation($data['long_bio_ar'] ?? '', $data['long_bio_en'] ?? '', true);
        $this->profile->location = $this->toTranslation($data['location_ar'] ?? '', $data['location_en'] ?? '', true);
        $this->profile->availability_text = $this->toTranslation($data['availability_text_ar'] ?? '', $data['availability_text_en'] ?? '', true);
        $this->profile->primary_cta_label = $this->toTranslation($data['primary_cta_label_ar'] ?? '', $data['primary_cta_label_en'] ?? '', true);
        $this->profile->secondary_cta_label = $this->toTranslation($data['secondary_cta_label_ar'] ?? '', $data['secondary_cta_label_en'] ?? '', true);
        $this->profile->save();

        $this->notifySuccess(__('dashboard.portfolio-profile-updated'));
    }

    public function render()
    {
        return view('dashboard.portfolio.profile.update-portfolio-profile');
    }
}
