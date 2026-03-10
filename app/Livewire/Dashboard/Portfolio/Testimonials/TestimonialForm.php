<?php

namespace App\Livewire\Dashboard\Portfolio\Testimonials;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Testimonial;
use Livewire\TemporaryUploadedFile;

class TestimonialForm extends BasePortfolioForm
{
    public Testimonial $testimonial;

    public $name;
    public $role_ar;
    public $role_en;
    public $company;
    public $badge_ar;
    public $badge_en;
    public $quote_ar;
    public $quote_en;
    public $avatar;
    public $featured = false;
    public $sort_order = 0;

    public function mount(?Testimonial $testimonial = null): void
    {
        $this->testimonial = $testimonial ?? new Testimonial();
        $this->name = $this->testimonial->name;
        $this->role_ar = $this->translationValue($this->testimonial->role, 'ar');
        $this->role_en = $this->translationValue($this->testimonial->role, 'en');
        $this->company = $this->testimonial->company;
        $this->badge_ar = $this->translationValue($this->testimonial->badge, 'ar');
        $this->badge_en = $this->translationValue($this->testimonial->badge, 'en');
        $this->quote_ar = $this->translationValue($this->testimonial->quote, 'ar');
        $this->quote_en = $this->translationValue($this->testimonial->quote, 'en');
        $this->avatar = $this->testimonial->avatar;
        $this->featured = (bool) ($this->testimonial->featured ?? false);
        $this->sort_order = $this->testimonial->sort_order ?? 0;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'role_ar' => ['nullable', 'string', 'max:255'],
            'role_en' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'badge_ar' => ['nullable', 'string', 'max:255'],
            'badge_en' => ['nullable', 'string', 'max:255'],
            'quote_ar' => ['nullable', 'string'],
            'quote_en' => ['nullable', 'string'],
            'avatar' => $this->avatar instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
            'featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->testimonial->exists ? 'portfolio_testimonials_update' : 'portfolio_testimonials_create');

        $data = $this->validate();

        $this->testimonial->avatar = $this->storeImage($this->avatar, $this->testimonial->avatar, 'uploads/portfolio/testimonials');
        $this->testimonial->fill([
            'name' => $data['name'],
            'role' => $this->toTranslation($data['role_ar'] ?? '', $data['role_en'] ?? '', true),
            'company' => $data['company'] ?? null,
            'badge' => $this->toTranslation($data['badge_ar'] ?? '', $data['badge_en'] ?? '', true),
            'quote' => $this->toTranslation($data['quote_ar'] ?? '', $data['quote_en'] ?? '', true),
            'featured' => (bool) $data['featured'],
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ]);

        $this->testimonial->save();
        $this->notifySuccess($this->testimonial->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.testimonials.testimonial-form');
    }
}
