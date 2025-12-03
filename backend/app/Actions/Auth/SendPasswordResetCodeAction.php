<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Services\SmsCodeGenerator;
use App\Services\PasswordResetTokenService;

class SendPasswordResetCodeAction
{
    public function __construct(
        protected SmsCodeGenerator $codeGenerator,
        protected PasswordResetTokenService $tokenService
    ) {}

    public function handle(string $login): array
    {
        $user = User::where('login', $login)->first();
        if (! $user) {
            return [
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => 'Пользователь не найден.',
                ],
            ];
        }

        if (blank($user->phone)) {
            return [
                'success' => false,
                'error' => [
                    'code' => 422,
                    'message' => 'Невозможно отправить код: у пользователя не указан телефон.',
                ],
            ];
        }

        $code = $this->codeGenerator::generate();
        $this->tokenService->create($login, $code);


        $response = [
            'success' => true,
            'toast' => 'Код восстановления отправлен на ваш телефон',
        ];

        if (app()->environment('local', 'testing')) {
            $response['_debug_sms_code'] = $code;
        }

        return $response;
    }
}
