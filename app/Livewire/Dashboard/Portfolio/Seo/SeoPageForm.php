<?php

namespace App\Livewire\Dashboard\Portfolio\Seo;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\PortfolioPage;
use Illuminate\Validation\Rule;
use Livewire\TemporaryUploadedFile;

class SeoPageForm extends BasePortfolioForm
{
    public PortfolioPage $page;

    public $page_key;
    public $title_ar;
    public $title_en;
    public $seo_title_ar;
    public $seo_title_en;
    public $seo_description_ar;
    public $seo_description_en;
    public $seo_keywords_text;
    public $canonical_url;
    public $robots = 'index,follow';
    public $extra_meta_text;
    public $og_image;

    public function mount(?PortfolioPage $page = null): void
    {
        $this->page = $page ?? new PortfolioPage();
        $this->page_key = $this->page->page_key;
        $this->title_ar = $this->translationValue($this->page->title, 'ar');
        $this->title_en = $this->translationValue($this->page->title, 'en');
        $this->seo_title_ar = $this->translationValue($this->page->seo_title, 'ar');
        $this->seo_title_en = $this->translationValue($this->page->seo_title, 'en');
        $this->seo_description_ar = $this->translationValue($this->page->seo_description, 'ar');
        $this->seo_description_en = $this->translationValue($this->page->seo_description, 'en');
        $this->seo_keywords_text = $this->commaSeparatedToText($this->page->seo_keywords);
        $this->canonical_url = $this->page->canonical_url;
        $this->robots = $this->page->robots ?: 'index,follow';
        $this->extra_meta_text = $this->keyValueRowsToText($this->page->extra_meta);
        $this->og_image = $this->page->og_image;
    }

    public function rules(): array
    {
        return [
            'page_key' => ['required', 'string', 'max:100', Rule::unique('portfolio_pages', 'page_key')->ignore($this->page->id)],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'seo_title_ar' => ['nullable', 'string', 'max:255'],
            'seo_title_en' => ['nullable', 'string', 'max:255'],
            'seo_description_ar' => ['nullable', 'string'],
            'seo_description_en' => ['nullable', 'string'],
            'seo_keywords_text' => ['nullable', 'string'],
            'canonical_url' => ['nullable', 'url'],
            'robots' => ['nullable', 'string', 'max:100'],
            'extra_meta_text' => ['nullable', 'string'],
            'og_image' => $this->og_image instanceof TemporaryUploadedFile ? ['nullable', 'image', 'max:4096'] : ['nullable'],
        ];
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission($this->page->exists ? 'portfolio_seo_pages_update' : 'portfolio_seo_pages_create');

        $data = $this->validate();

        $this->page->og_image = $this->storeImage($this->og_image, $this->page->og_image, 'uploads/portfolio/seo');
        $this->page->fill([
            'page_key' => $data['page_key'],
            'title' => $this->toTranslation($data['title_ar'] ?? '', $data['title_en'] ?? '', true),
            'seo_title' => $this->toTranslation($data['seo_title_ar'] ?? '', $data['seo_title_en'] ?? '', true),
            'seo_description' => $this->toTranslation($data['seo_description_ar'] ?? '', $data['seo_description_en'] ?? '', true),
            'seo_keywords' => $this->commaSeparated($data['seo_keywords_text'] ?? null),
            'canonical_url' => $data['canonical_url'] ?? null,
            'robots' => $data['robots'] ?? null,
            'extra_meta' => $this->keyValueRows($data['extra_meta_text'] ?? null),
        ]);

        $this->page->save();
        $this->notifySuccess($this->page->wasRecentlyCreated ? __('dashboard.add-successfully') : __('dashboard.update-successfully'));
    }

    public function render()
    {
        return view('dashboard.portfolio.seo.seo-page-form');
    }
}
