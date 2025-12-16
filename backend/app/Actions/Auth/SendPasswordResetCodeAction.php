<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Services\PasswordResetTokenService;
use RuntimeException;

class SendPasswordResetCodeAction
{
    public function __construct(
        protected PasswordResetTokenService $tokenService,
    ) {
    }

    /**
     * @param array{email?: string, phone?: string} $data
     */
    public function handle(array $data): void
    {
        /** @var User $user */
        $user = User::query()
            ->when(
                isset($data['email']),
                fn ($q) => $q->where('email', $data['email'])
            )
            ->when(
                isset($data['phone']),
                fn ($q) => $q->where('phone', $data['phone'])
            )
            ->firstOrFail();

        $type = isset($data['email']) ? 'email' : 'phone';
        $identifier = $data[$type];

        if (! $this->tokenService->canResend($identifier, $type)) {
            throw new RuntimeException('Слишком частые запросы. Попробуйте позже.');
        }

        $code = $this->tokenService->create($identifier, $type);


    }
}
