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
    public function __construct(
        protected SendPasswordResetCodeAction $sendPasswordResetCodeAction,
        protected ResetPasswordAction         $resetPasswordAction,
    )
    {
    }

    public function sendCode(ForgotPasswordRequest $request): JsonResponse
    {
        $debugCode = $this->sendPasswordResetCodeAction->handle(
            $request->validated()
        );

        $response = [
            'success' => true,
            'toast' => 'Код отправлен',
            'data' => null,
        ];

        if ($debugCode !== null) {
            $response['data']['debug_code'] = $debugCode;
        }

        return response()->json($response);
    }

    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->resetPasswordAction->handle($data);

        return response()->json([
            'success' => true,
            'toast' => 'Пароль успешно восстановлен',
            'data' => null,
        ]);
    }
}


