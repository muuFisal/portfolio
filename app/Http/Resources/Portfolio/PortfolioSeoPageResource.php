<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioSeoPageResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'page_key' => $this->page_key,
            'title' => $this->title,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
            'seo_keywords' => $this->seo_keywords ?? [],
            'og_image_url' => $this->fileUrl($this->og_image),
            'canonical_url' => $this->canonical_url,
            'robots' => $this->robots,
            'extra_meta' => $this->extra_meta ?? [],
        ];
    }
}
