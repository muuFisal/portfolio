<?php

namespace App\Livewire\Dashboard\Portfolio\Settings;

use App\Livewire\Dashboard\Portfolio\BasePortfolioForm;
use App\Models\Setting;
use Livewire\TemporaryUploadedFile;

class UpdatePortfolioSettings extends BasePortfolioForm
{
    public Setting $settings;

    public $site_name_ar;
    public $site_name_en;
    public $site_title_ar;
    public $site_title_en;
    public $site_desc_ar;
    public $site_desc_en;
    public $site_address_ar;
    public $site_address_en;
    public $meta_key_ar;
    public $meta_key_en;
    public $meta_desc_ar;
    public $meta_desc_en;
    public $site_phone;
    public $whatsapp;
    public $site_email;
    public $email_support;
    public $facebook;
    public $x_url;
    public $youtube;
    public $instagram;
    public $tiktok;
    public $linkedin;
    public $github;
    public $logo;
    public $logo_dark;
    public $favicon;
    public $resume;
    public $profile_image;
    public $default_og_image;
    public $site_copyright;
    public $promotion_url;

    public function mount(): void
    {
        $this->settings = Setting::query()->first() ?? Setting::query()->create([
            'site_name' => ['ar' => '', 'en' => ''],
            'site_title' => ['ar' => '', 'en' => ''],
            'site_desc' => ['ar' => '', 'en' => ''],
            'site_address' => ['ar' => '', 'en' => ''],
            'meta_key' => ['ar' => '', 'en' => ''],
            'meta_desc' => ['ar' => '', 'en' => ''],
        ]);

        $this->site_name_ar = $this->settings->getTranslation('site_name', 'ar');
        $this->site_name_en = $this->settings->getTranslation('site_name', 'en');
        $this->site_title_ar = $this->settings->getTranslation('site_title', 'ar');
        $this->site_title_en = $this->settings->getTranslation('site_title', 'en');
        $this->site_desc_ar = $this->settings->getTranslation('site_desc', 'ar');
        $this->site_desc_en = $this->settings->getTranslation('site_desc', 'en');
        $this->site_address_ar = $this->settings->getTranslation('site_address', 'ar');
        $this->site_address_en = $this->settings->getTranslation('site_address', 'en');
        $this->meta_key_ar = $this->settings->getTranslation('meta_key', 'ar');
        $this->meta_key_en = $this->settings->getTranslation('meta_key', 'en');
        $this->meta_desc_ar = $this->settings->getTranslation('meta_desc', 'ar');
        $this->meta_desc_en = $this->settings->getTranslation('meta_desc', 'en');
        $this->site_phone = $this->settings->site_phone;
        $this->whatsapp = $this->settings->whatsapp;
        $this->site_email = $this->settings->site_email;
        $this->email_support = $this->settings->email_support;
        $this->facebook = $this->settings->facebook;
        $this->x_url = $this->settings->x_url;
        $this->youtube = $this->settings->youtube;
        $this->instagram = $this->settings->instagram;
        $this->tiktok = $this->settings->tiktok;
        $this->linkedin = $this->settings->linkedin;
        $this->github = $this->settings->github;
        $this->logo = $this->settings->logo;
        $this->logo_dark = $this->settings->logo_dark;
        $this->favicon = $this->settings->favicon;
        $this->resume = $this->settings->resume;
        $this->profile_image = $this->settings->profile_image;
        $this->default_og_image = $this->settings->default_og_image;
        $this->site_copyright = $this->settings->site_copyright;
        $this->promotion_url = $this->settings->promotion_url;
    }

    public function rules(): array
    {
        $rules = [
            'site_name_ar' => ['required', 'string', 'max:255'],
            'site_name_en' => ['required', 'string', 'max:255'],
            'site_title_ar' => ['required', 'string', 'max:255'],
            'site_title_en' => ['required', 'string', 'max:255'],
            'site_desc_ar' => ['required', 'string'],
            'site_desc_en' => ['required', 'string'],
            'site_address_ar' => ['required', 'string', 'max:255'],
            'site_address_en' => ['required', 'string', 'max:255'],
            'meta_key_ar' => ['nullable', 'string'],
            'meta_key_en' => ['nullable', 'string'],
            'meta_desc_ar' => ['required', 'string'],
            'meta_desc_en' => ['required', 'string'],
            'site_phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:255'],
            'site_email' => ['nullable', 'email', 'max:255'],
            'email_support' => ['nullable', 'email', 'max:255'],
            'facebook' => ['nullable', 'url'],
            'x_url' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'tiktok' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'github' => ['nullable', 'url'],
            'site_copyright' => ['nullable', 'string'],
            'promotion_url' => ['nullable', 'url'],
        ];

        foreach (['logo', 'logo_dark', 'favicon', 'profile_image', 'default_og_image'] as $imageField) {
            $rules[$imageField] = $this->{$imageField} instanceof TemporaryUploadedFile
                ? ['nullable', 'image', 'max:4096']
                : ['nullable'];
        }

        $rules['resume'] = $this->resume instanceof TemporaryUploadedFile
            ? ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:8192']
            : ['nullable'];

        return $rules;
    }

    public function submit(): void
    {
        $this->authorizeDashboardPermission('portfolio_settings_update');

        $data = $this->validate();

        $this->settings->logo = $this->storeImage($this->logo, $this->settings->logo, 'uploads/portfolio/settings');
        $this->settings->logo_dark = $this->storeImage($this->logo_dark, $this->settings->logo_dark, 'uploads/portfolio/settings');
        $this->settings->favicon = $this->storeImage($this->favicon, $this->settings->favicon, 'uploads/portfolio/settings');
        $this->settings->profile_image = $this->storeImage($this->profile_image, $this->settings->profile_image, 'uploads/portfolio/settings');
        $this->settings->default_og_image = $this->storeImage($this->default_og_image, $this->settings->default_og_image, 'uploads/portfolio/settings');
        $this->settings->resume = $this->storeFile($this->resume, $this->settings->resume, 'uploads/portfolio/files');

        $this->settings->setTranslations('site_name', $this->toTranslation($data['site_name_ar'], $data['site_name_en']));
        $this->settings->setTranslations('site_title', $this->toTranslation($data['site_title_ar'], $data['site_title_en']));
        $this->settings->setTranslations('site_desc', $this->toTranslation($data['site_desc_ar'], $data['site_desc_en']));
        $this->settings->setTranslations('site_address', $this->toTranslation($data['site_address_ar'], $data['site_address_en']));
        $this->settings->setTranslations('meta_key', $this->toTranslation($data['meta_key_ar'] ?? '', $data['meta_key_en'] ?? ''));
        $this->settings->setTranslations('meta_desc', $this->toTranslation($data['meta_desc_ar'], $data['meta_desc_en']));

        $this->settings->fill([
            'site_phone' => $data['site_phone'] ?? null,
            'whatsapp' => $data['whatsapp'] ?? null,
            'site_email' => $data['site_email'] ?? null,
            'email_support' => $data['email_support'] ?? null,
            'facebook' => $data['facebook'] ?? null,
            'x_url' => $data['x_url'] ?? null,
            'youtube' => $data['youtube'] ?? null,
            'instagram' => $data['instagram'] ?? null,
            'tiktok' => $data['tiktok'] ?? null,
            'linkedin' => $data['linkedin'] ?? null,
            'github' => $data['github'] ?? null,
            'site_copyright' => $data['site_copyright'] ?? null,
            'promotion_url' => $data['promotion_url'] ?? null,
        ]);

        $this->settings->save();
        $this->notifySuccess(__('dashboard.portfolio-settings-updated'));
    }

    public function render()
    {
        return view('dashboard.portfolio.settings.update-portfolio-settings');
    }
}
