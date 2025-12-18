<?php

namespace App\Actions\Auth;

use App\Exceptions\InvalidPasswordResetTokenException;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Services\PasswordResetTokenService;
use Illuminate\Http\JsonResponse;

class ResetPasswordAction
{
    public static function handle(ResetPasswordRequest $request): JsonResponse
    {
        $data = $request->validated();

        $tokenService = app(PasswordResetTokenService::class);

        $validation = $tokenService->validate(
            $data['identifier'],
            $data['type'],
            $data['token']
        );

        if (!$validation['valid']) {
            throw new InvalidPasswordResetTokenException(
                $validation['reason'] ?? 'invalid'
            );
        }

        $user = User::query()
            ->where($data['type'], $data['identifier'])
            ->firstOrFail();

        $user->password = $data['new_password'];
        $user->save();

        $tokenService->delete($data['identifier'], $data['type']);

        return response()->json([
            'toast' => 'Пароль успешно восстановлен',
            'data' => null,
        ]);
    }
}
