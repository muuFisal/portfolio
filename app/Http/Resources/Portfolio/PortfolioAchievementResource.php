<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioAchievementResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'value' => $this->value,
            'unit' => $this->unit,
        ];
    }
}
