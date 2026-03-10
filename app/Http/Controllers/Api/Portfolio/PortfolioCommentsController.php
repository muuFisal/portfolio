<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Portfolio\CommentIndexRequest;
use App\Http\Requests\Api\Portfolio\StorePortfolioCommentRequest;
use App\Http\Resources\Portfolio\PortfolioCommentResource;
use App\Services\Api\Portfolio\PortfolioInteractionService;
use Illuminate\Http\Request;

class PortfolioCommentsController extends BaseApiController
{
    public function __construct(protected PortfolioInteractionService $interactionService)
    {
    }

    public function index(CommentIndexRequest $request)
    {
        $payload = $this->interactionService->comments($request->validated());
        $paginator = $payload['paginator'];

        return $this->success(
            [
                'items' => PortfolioCommentResource::collection($paginator->getCollection())->resolve(),
                'filters' => [
                    'featured' => $request->validated('featured'),
                ],
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

    public function store(StorePortfolioCommentRequest $request)
    {
        $comment = $this->interactionService->createComment($request->validated(), $request);

        return $this->created(
            new PortfolioCommentResource($comment),
            __('front.created-successfully'),
        );
    }
}
