<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioNavigationLinkResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'label' => $this->label,
            'href' => $this->href,
            'page_key' => $this->page_key,
            'target' => $this->target,
            'icon' => $this->icon,
        ];
    }
}
