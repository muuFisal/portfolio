<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioExperienceResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'role' => $this->role,
            'company' => $this->company,
            'summary' => $this->summary,
            'location' => $this->location,
            'employment_type' => $this->employment_type,
            'company_url' => $this->company_url,
            'logo_url' => $this->fileUrl($this->logo),
            'start_date' => $this->start_date?->format('Y-m-d'),
            'end_date' => $this->end_date?->format('Y-m-d'),
            'is_current' => $this->end_date === null,
            'highlights' => $this->localized($this->highlights ?? []),
        ];
    }
}
