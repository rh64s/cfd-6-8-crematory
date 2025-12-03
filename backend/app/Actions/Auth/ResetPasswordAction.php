<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Services\PasswordResetTokenService;
use App\Exceptions\InvalidPasswordResetTokenException;

class ResetPasswordAction
{
    public function __construct(
        protected PasswordResetTokenService $tokenService
    ) {}

    public function handle(string $login, string $token, string $password): array
    {
        $validation = $this->tokenService->validate($login, $token);
        if (! $validation['valid']) {
            throw new InvalidPasswordResetTokenException($validation['reason']);
        }

        $user = User::where('login', $login)->first();
        if (! $user) {
            $this->tokenService->delete($login);
            return [
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => 'Пользователь не найден.',
                ],
            ];
        }

        $user->password = $password;
        $user->save();

        $this->tokenService->delete($login);

        return [
            'success' => true,
            'toast' => 'Пароль успешно изменён. Вы можете войти с новым паролем.',
        ];
    }
}
