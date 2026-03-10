<?php

namespace App\Http\Resources\Portfolio;

use App\Support\LocalizedContent;
use App\Utils\ImageManger;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BasePortfolioResource extends JsonResource
{
    protected function localized(mixed $value): mixed
    {
        return app(LocalizedContent::class)->translate($value);
    }

    protected function fileUrl(?string $path): ?string
    {
        return app(ImageManger::class)->url($path);
    }
}
