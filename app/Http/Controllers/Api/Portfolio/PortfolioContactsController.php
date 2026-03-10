<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Portfolio\StorePortfolioContactRequest;
use App\Http\Resources\Portfolio\PortfolioContactInfoResource;
use App\Services\Api\Portfolio\PortfolioContentService;
use App\Services\Api\Portfolio\PortfolioInteractionService;

class PortfolioContactsController extends BaseApiController
{
    public function __construct(
        protected PortfolioContentService $contentService,
        protected PortfolioInteractionService $interactionService,
    ) {
    }

    public function info()
    {
        return $this->success(new PortfolioContactInfoResource($this->contentService->contactInfo()));
    }

    public function store(StorePortfolioContactRequest $request)
    {
        $contact = $this->interactionService->createContact($request->validated(), $request);

        return $this->created([
            'id' => $contact->id,
            'status' => $contact->status,
        ], __('front.message-received'));
    }
}
