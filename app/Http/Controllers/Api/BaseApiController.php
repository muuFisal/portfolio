<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseApiController extends Controller
{
    protected function success(
        mixed $data = [],
        ?string $message = null,
        int $status = 200,
        ?LengthAwarePaginator $paginator = null
    ) {
        return ApiResponse::sendResponse(
            $status,
            $message ?? __('front.retrieved-successfully'),
            $this->resolveData($data),
            $paginator ? $this->pagination($paginator) : null,
        );
    }

    protected function created(mixed $data = [], ?string $message = null)
    {
        return $this->success($data, $message ?? __('front.created-successfully'), 201);
    }

    protected function pagination(LengthAwarePaginator $paginator): array
    {
        return [
            'page' => $paginator->currentPage(),
            'per_page' => $paginator->perPage(),
            'total' => $paginator->total(),
            'last_page' => $paginator->lastPage(),
        ];
    }

    protected function resolveData(mixed $data): mixed
    {
        if ($data instanceof JsonResource) {
            return $data->resolve(request());
        }

        return $data;
    }
}
