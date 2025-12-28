<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date?->format('Y-m-d'),
            'location' => $this->location ? $this->location : '',
            'description' => $this->description ? $this->description : '',
        ];
    }
}
