<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioSkillResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'category' => $this->category,
            'level_label' => $this->level_label,
            'icon' => $this->icon,
            'percent' => $this->percent,
            'featured' => (bool) $this->featured,
        ];
    }
}
