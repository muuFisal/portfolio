<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioSettingsResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'site_name' => $this->site_name,
            'site_title' => $this->site_title,
            'site_description' => $this->site_desc,
            'site_address' => $this->site_address,
            'contacts' => [
                'phone' => $this->site_phone,
                'email' => $this->site_email,
                'support_email' => $this->email_support,
                'whatsapp' => $this->whatsapp,
            ],
            'socials' => [
                'facebook' => $this->facebook,
                'x' => $this->x_url,
                'youtube' => $this->youtube,
                'instagram' => $this->instagram,
                'tiktok' => $this->tiktok,
                'linkedin' => $this->linkedin,
                'github' => $this->github,
            ],
            'branding' => [
                'logo_url' => $this->fileUrl($this->logo),
                'logo_dark_url' => $this->fileUrl($this->logo_dark),
                'favicon_url' => $this->fileUrl($this->favicon),
                'profile_image_url' => $this->fileUrl($this->profile_image),
                'resume_url' => $this->fileUrl($this->resume),
            ],
            'seo' => [
                'keywords' => $this->keywords($this->meta_key),
                'description' => $this->meta_desc,
                'default_og_image_url' => $this->fileUrl($this->default_og_image),
            ],
            'copyright' => $this->site_copyright,
            'promotion_url' => $this->promotion_url,
        ];
    }

    private function keywords(mixed $keywords): array
    {
        if (blank($keywords)) {
            return [];
        }

        if (is_array($keywords)) {
            return $keywords;
        }

        return collect(explode(',', (string) $keywords))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->all();
    }
}
