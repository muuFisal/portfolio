<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioProjectCardResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'summary' => $this->summary,
            'category' => $this->category,
            'tags' => $this->tags ?? [],
            'featured' => (bool) $this->featured,
            'is_open_source' => (bool) $this->is_open_source,
            'project_date' => $this->project_date?->format('Y-m-d'),
            'cover_image_url' => $this->fileUrl($this->cover_image),
            'links' => [
                'web' => $this->web_url,
                'repository' => $this->repository_url,
                'case_study' => $this->case_study_url,
            ],
        ];
    }
}
