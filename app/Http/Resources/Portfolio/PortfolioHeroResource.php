<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioHeroResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        $profile = data_get($this->resource, 'profile');
        $settings = data_get($this->resource, 'settings');
        $section = data_get($this->resource, 'section');

        return [
            'eyebrow' => data_get($profile, 'full_name'),
            'title' => data_get($section, 'title', data_get($profile, 'headline')),
            'subtitle' => data_get($section, 'subtitle', data_get($profile, 'short_bio')),
            'description' => $this->localized(data_get($section, 'content.description', data_get($profile, 'short_bio'))),
            'badges' => $this->localized(data_get($profile, 'hero_badges', [])),
            'primary_cta' => [
                'label' => data_get($profile, 'primary_cta_label'),
                'url' => data_get($profile, 'primary_cta_url'),
            ],
            'secondary_cta' => [
                'label' => data_get($profile, 'secondary_cta_label'),
                'url' => data_get($profile, 'secondary_cta_url'),
            ],
            'image_url' => $this->fileUrl(data_get($profile, 'profile_image') ?: data_get($settings, 'profile_image')),
            'resume_url' => $this->fileUrl(data_get($profile, 'resume') ?: data_get($settings, 'resume')),
            'stats' => [
                ['label' => 'years_experience', 'value' => data_get($profile, 'years_experience')],
                ['label' => 'projects_delivered', 'value' => data_get($profile, 'projects_delivered')],
                ['label' => 'clients_count', 'value' => data_get($profile, 'clients_count')],
            ],
        ];
    }
}
