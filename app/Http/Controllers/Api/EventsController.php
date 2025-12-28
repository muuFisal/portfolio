<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $items = Event::query()->orderBy('sort_order')->orderByDesc('date')->get();

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            EventResource::collection($items),
        );
    }
}
