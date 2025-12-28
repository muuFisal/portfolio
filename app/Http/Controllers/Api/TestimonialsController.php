<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;

class TestimonialsController extends Controller
{
    public function index()
    {
        $items = Testimonial::query()->orderBy('sort_order')->orderByDesc('id')->get();

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            TestimonialResource::collection($items),
        );
    }
}
