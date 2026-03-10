<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioEventResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'date' => $this->date?->format('Y-m-d'),
            'location' => $this->location,
            'description' => $this->description,
            'url' => $this->url,
            'cover_image_url' => $this->fileUrl($this->cover_image),
            'featured' => (bool) $this->featured,
        ];
    }
}
