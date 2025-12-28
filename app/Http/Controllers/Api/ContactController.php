<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'source' => ['nullable', 'string', 'max:50'],
        ]);

        if ($v->fails()) {
            return ApiResponse::sendResponse(422, __('front.validation-error'), [
                'errors' => $v->errors(),
            ]);
        }

        $msg = ContactMessage::create($v->validated());

        return ApiResponse::sendResponse(201, __('front.message-received'), []);
    }
}
