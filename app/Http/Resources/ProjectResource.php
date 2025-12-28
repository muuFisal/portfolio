<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $cover = $this->cover_image
            ? (Str::startsWith($this->cover_image, ['http://', 'https://']) ? $this->cover_image : asset($this->cover_image))
            : null;

        $gallery = $this->relationLoaded('images')
            ? $this->images->pluck('image')->map(function ($img) {
                return Str::startsWith($img, ['http://', 'https://']) ? $img : asset($img);
            })->values()
            : [];

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'summary' => $this->summary,
            'tags' => $this->tags ?? [],
            'featured' => (bool) $this->featured ?? false,
            'cover_image_url' => $cover ?? '',
            'gallery' => $gallery ?? [],
            'links' => [
                'web' => $this->web_url ?? '',
                'google_play' => $this->google_play_url ?? '',
                'app_store' => $this->app_store_url ?? '',
            ],
        ];
    }
}
