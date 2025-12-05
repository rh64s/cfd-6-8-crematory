<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Services\PasswordResetTokenService;
use App\Services\SmsCodeGenerator;

class SendPasswordResetCodeAction
{
    public function __construct(
        protected SmsCodeGenerator $codeGenerator,
        protected PasswordResetTokenService $tokenService,
    ) {
    }

    // ищем по логину юзера, генерится код, создается хэш токена, возвращается код
    public function handle(string $login): ?string
    {
        /** @var User $user */
        $user = User::where('login', $login)->firstOrFail();

        $code = $this->codeGenerator->generate();

        $this->tokenService->create($login, $code);

        if (app()->environment('local', 'testing')) {
            return $code;
        }

        return null;
    }
}
