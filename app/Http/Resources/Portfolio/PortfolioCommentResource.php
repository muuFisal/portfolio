<?php

namespace App\Http\Resources\Portfolio;

use Illuminate\Http\Request;

class PortfolioCommentResource extends BasePortfolioResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'comment' => $this->comment,
            'rating' => $this->rating,
            'avatar_url' => $this->fileUrl($this->avatar),
            'source' => $this->source,
            'featured' => (bool) $this->featured,
            'status' => $this->status,
            'submitted_at' => $this->created_at?->toISOString(),
        ];
    }
}
