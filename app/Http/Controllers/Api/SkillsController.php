<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;

class SkillsController extends Controller
{
    public function index()
    {
        $items = Skill::query()
            ->orderBy('sort_order')
            ->get();

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            SkillResource::collection($items)
        );
    }
}
