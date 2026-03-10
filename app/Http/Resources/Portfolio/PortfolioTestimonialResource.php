<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioTestimonialResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'company' => $this->company,
            'badge' => $this->badge,
            'quote' => $this->quote,
            'avatar_url' => $this->fileUrl($this->avatar),
            'featured' => (bool) $this->featured,
        ];
    }
}
