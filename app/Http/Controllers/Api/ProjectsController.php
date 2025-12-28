<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->get('q', ''));
        $perPage = (int) $request->get('per_page', 12);
        $perPage = $perPage > 0 ? min($perPage, 50) : 12;

        $query = Project::query()->with('images');

        if ($request->has('featured')) {
            $featured = filter_var($request->get('featured'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            if ($featured !== null) {
                $query->where('featured', $featured);
            }
        }

        if ($q !== '') {
            // search in both locales (stored via Spatie Translatable JSON)
            $query->where(function ($w) use ($q) {
                $w->where('title->en', 'like', "%{$q}%")
                    ->orWhere('title->ar', 'like', "%{$q}%")
                    ->orWhere('summary->en', 'like', "%{$q}%")
                    ->orWhere('summary->ar', 'like', "%{$q}%");
            });
        }

        if ($request->filled('tag')) {
            $tag = (string) $request->get('tag');
            $query->whereJsonContains('tags', $tag);
        }

        $query->orderByDesc('featured')->orderBy('id', 'desc');

        $paginator = $query->paginate($perPage);

        return ApiResponse::sendResponse(
            200,
            __('front.retrieved-successfully'),
            ProjectResource::collection($paginator),
            [
                'page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'last_page' => $paginator->lastPage(),
            ]
        );
    }

    public function show(string $slug)
    {
        $project = Project::query()->with('images')->where('slug', $slug)->first();

        if (!$project) {
            return ApiResponse::sendResponse(404, __('front.not-found'), []);
        }

        return ApiResponse::sendResponse(200, __('front.retrieved-successfully'), new ProjectResource($project));
    }
}
