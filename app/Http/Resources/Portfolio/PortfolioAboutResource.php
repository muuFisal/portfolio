<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioAboutResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        $profile = data_get($this->resource, 'profile');
        $section = data_get($this->resource, 'section');
        $highlights = data_get($this->resource, 'highlights');

        return [
            'title' => data_get($section, 'title'),
            'subtitle' => data_get($section, 'subtitle'),
            'summary' => data_get($profile, 'short_bio'),
            'story' => $this->localized(data_get($section, 'content.story', data_get($profile, 'long_bio'))),
            'focus_areas' => $this->localized(data_get($profile, 'focus_areas', [])),
            'values' => $this->localized(data_get($section, 'items', [])),
            'highlights' => PortfolioAchievementResource::collection($highlights)->resolve(),
            'profile_image_url' => $this->fileUrl(data_get($profile, 'profile_image')),
            'resume_url' => $this->fileUrl(data_get($profile, 'resume')),
        ];
    }
}
