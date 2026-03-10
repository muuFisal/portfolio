<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioProjectDetailResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'summary' => $this->summary,
            'description' => $this->description,
            'category' => $this->category,
            'tags' => $this->tags ?? [],
            'stack' => $this->stack ?? [],
            'highlights' => $this->localized($this->highlights ?? []),
            'challenges' => $this->localized($this->challenges ?? []),
            'solutions' => $this->localized($this->solutions ?? []),
            'metrics' => $this->localized($this->metrics ?? []),
            'featured' => (bool) $this->featured,
            'is_open_source' => (bool) $this->is_open_source,
            'client_name' => $this->client_name,
            'project_date' => $this->project_date?->format('Y-m-d'),
            'cover_image_url' => $this->fileUrl($this->cover_image),
            'og_image_url' => $this->fileUrl($this->og_image),
            'gallery' => $this->whenLoaded('images', function () {
                return $this->images->map(fn ($image) => [
                    'url' => $this->fileUrl($image->image),
                    'alt' => $image->alt_text,
                ])->values()->all();
            }, []),
            'links' => [
                'web' => $this->web_url,
                'google_play' => $this->google_play_url,
                'app_store' => $this->app_store_url,
                'repository' => $this->repository_url,
                'case_study' => $this->case_study_url,
            ],
            'seo' => [
                'title' => $this->seo_title,
                'description' => $this->seo_description,
                'keywords' => $this->seo_keywords ?? [],
            ],
        ];
    }
}
