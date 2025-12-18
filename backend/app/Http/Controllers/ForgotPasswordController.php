<?php

namespace App\Http\Controllers;

use App\Actions\Auth\ResetPasswordAction;
use App\Actions\Auth\SendPasswordResetCodeAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    public function sendCode(ForgotPasswordRequest $request): JsonResponse
    {
        return SendPasswordResetCodeAction::handle($request);
    }

    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        return ResetPasswordAction::handle($request);
    }
}

