<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioProfileResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'full_name' => $this->full_name,
            'headline' => $this->headline,
            'short_bio' => $this->short_bio,
            'long_bio' => $this->long_bio,
            'location' => $this->location,
            'email' => $this->email,
            'phone' => $this->phone,
            'availability_text' => $this->availability_text,
            'years_experience' => $this->years_experience,
            'projects_delivered' => $this->projects_delivered,
            'clients_count' => $this->clients_count,
            'focus_areas' => $this->localized($this->focus_areas ?? []),
            'hero_badges' => $this->localized($this->hero_badges ?? []),
            'primary_cta' => [
                'label' => $this->primary_cta_label,
                'url' => $this->primary_cta_url,
            ],
            'secondary_cta' => [
                'label' => $this->secondary_cta_label,
                'url' => $this->secondary_cta_url,
            ],
            'resume_url' => $this->fileUrl($this->resume),
            'profile_image_url' => $this->fileUrl($this->profile_image),
        ];
    }
}
