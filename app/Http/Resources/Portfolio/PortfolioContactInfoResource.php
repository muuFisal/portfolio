<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioContactInfoResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        $profile = data_get($this->resource, 'profile');
        $settings = data_get($this->resource, 'settings');
        $section = data_get($this->resource, 'section');

        return [
            'title' => data_get($section, 'title'),
            'subtitle' => data_get($section, 'subtitle'),
            'availability' => $this->localized(data_get($section, 'content.availability')),
            'office_hours' => $this->localized(data_get($section, 'content.office_hours')),
            'email' => data_get($profile, 'email', data_get($settings, 'site_email')),
            'phone' => data_get($profile, 'phone', data_get($settings, 'site_phone')),
            'location' => data_get($profile, 'location', data_get($settings, 'site_address')),
            'profile_image_url' => $this->fileUrl(data_get($profile, 'profile_image') ?: data_get($settings, 'profile_image')),
            'resume_url' => $this->fileUrl(data_get($profile, 'resume') ?: data_get($settings, 'resume')),
            'socials' => [
                'linkedin' => data_get($settings, 'linkedin'),
                'github' => data_get($settings, 'github'),
                'x' => data_get($settings, 'x_url'),
                'instagram' => data_get($settings, 'instagram'),
                'whatsapp' => data_get($settings, 'whatsapp'),
            ],
        ];
    }
}
