<?php
namespace App\Actions\Auth;

use App\Exceptions\InvalidPasswordResetTokenException;
use App\Models\User;
use App\Services\PasswordResetTokenService;

class ResetPasswordAction
{
    public function __construct(
        protected PasswordResetTokenService $tokenService
    )
    {
    }

    /**
     * @throws InvalidPasswordResetTokenException
     */
    public function handle(string $login, string $token, string $password): void
    {
        $validation = $this->tokenService->validate($login, $token);
        if (!$validation['valid']) {
            throw new InvalidPasswordResetTokenException($validation['reason'] ?? 'invalid');
        }

        /** @var User $user */
        $user = User::where('login', $login)->firstOrFail();

        $user->password = $password;
        $user->save();

        $this->tokenService->delete($login);
    }
}
