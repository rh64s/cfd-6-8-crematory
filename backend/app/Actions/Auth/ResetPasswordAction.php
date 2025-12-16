<?php

namespace App\Actions\Auth;

use App\Exceptions\InvalidPasswordResetTokenException;
use App\Models\User;
use App\Services\PasswordResetTokenService;

class ResetPasswordAction
{
    public function __construct(
        protected PasswordResetTokenService $tokenService
    ) {
    }

    public function handle(
        string $identifier,
        string $type,
        string $token,
        string $newPassword
    ): void {
        $validation = $this->tokenService->validate($identifier, $type, $token);

        if (! $validation['valid']) {
            throw new InvalidPasswordResetTokenException(
                $validation['reason'] ?? 'invalid'
            );
        }

        $user = User::query()
            ->where($type, $identifier)
            ->firstOrFail();

        $user->password = $newPassword;
        $user->save();

        $this->tokenService->delete($identifier, $type);
    }
}
