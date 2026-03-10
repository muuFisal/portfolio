<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Portfolio\ProjectIndexRequest;
use App\Http\Resources\Portfolio\PortfolioProjectCardResource;
use App\Http\Resources\Portfolio\PortfolioProjectDetailResource;
use App\Services\Api\Portfolio\PortfolioProjectService;

class PortfolioProjectsController extends BaseApiController
{
    public function __construct(protected PortfolioProjectService $projectService)
    {
    }

    public function index(ProjectIndexRequest $request)
    {
        $payload = $this->projectService->paginate($request->validated());
        $paginator = $payload['paginator'];

        return $this->success(
            [
                'items' => PortfolioProjectCardResource::collection($paginator->getCollection())->resolve(),
                'filters' => $payload['filters'],
                'summary' => [
                    'total_items' => $paginator->total(),
                    'returned_items' => $paginator->count(),
                ],
            ],
            __('front.retrieved-successfully'),
            200,
            $paginator,
        );
    }

    public function show(string $slug)
    {
        return $this->success(new PortfolioProjectDetailResource($this->projectService->findBySlug($slug)));
    }
}
