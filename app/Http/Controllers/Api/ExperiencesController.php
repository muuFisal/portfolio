<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExperienceResource;
use App\Models\Experience;

class ExperiencesController extends Controller
{
    public function index()
    {
        $items = Experience::query()->orderBy('sort_order')->orderByDesc('id')->get();

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            ExperienceResource::collection($items),
        );
    }
}
