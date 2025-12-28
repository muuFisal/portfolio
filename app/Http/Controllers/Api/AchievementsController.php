<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AchievementResource;
use App\Models\Achievement;

class AchievementsController extends Controller
{
    public function index()
    {
        $items = Achievement::query()->orderBy('sort_order')->orderByDesc('id')->get();

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            AchievementResource::collection($items),
        );
    }
}
