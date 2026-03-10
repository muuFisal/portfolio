<?php

namespace App\Helpers;


class ApiResponse
{
    public static function sendResponse($code = 200, $message = null, $data = null, $pagination = null)
    {
        $response = [
            'code'    => $code,
            'message' => $message ?? 'Success',
            'data'    => $data,
            'pagination' => $pagination,
        ];

        return response()->json($response, $code);
    }
}
