<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioSectionResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        $section = data_get($this->resource, 'section', $this->resource);
        $items = data_get($this->resource, 'items', data_get($section, 'items', []));

        return [
            'key' => data_get($section, 'key'),
            'title' => data_get($section, 'title'),
            'subtitle' => data_get($section, 'subtitle'),
            'description' => $this->localized(data_get($section, 'content.description')),
            'content' => $this->localized(data_get($section, 'content', [])),
            'items' => $this->localized($items),
            'image_url' => $this->fileUrl(data_get($section, 'image')),
        ];
    }
}
