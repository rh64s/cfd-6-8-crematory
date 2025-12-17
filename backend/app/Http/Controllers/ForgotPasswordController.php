<?php

namespace App\Http\Controllers;

use App\Actions\Auth\ResetPasswordAction;
use App\Actions\Auth\SendPasswordResetCodeAction;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\User\ResetPasswordRequest;
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
        $login = $request->validated()['login'];

        $debugCode = $this->sendPasswordResetCodeAction->handle($login);

        $response = [
            'success' => true,
            'toast' => 'Код восстановления отправлен на ваш телефон',
        ];

        if ($debugCode !== null) {
            $response['_debug_sms_code'] = $debugCode;
        }

        return response()->json($response);
    }

    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        $data = $request->validated();

        $this->resetPasswordAction->handle($data['login'], $data['token'], $data['password']);

        return response()->json([
            'success' => true,
            'toast' => 'Пароль успешно изменён. Вы можете войти с новым паролем.',
        ]);
    }
}
