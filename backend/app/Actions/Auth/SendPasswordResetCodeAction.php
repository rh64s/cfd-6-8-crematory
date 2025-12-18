<?php

namespace App\Actions\Auth;

use App\Http\Requests\ForgotPasswordRequest;
use App\Models\User;
use App\Services\PasswordResetTokenService;
use Illuminate\Http\JsonResponse;
use RuntimeException;

class SendPasswordResetCodeAction
{
    public static function handle(ForgotPasswordRequest $request): JsonResponse
    {
        $data = $request->validated();

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

        $tokenService = app(PasswordResetTokenService::class);

        if (!$tokenService->canResend($identifier, $type)) {
            throw new RuntimeException('Слишком частые запросы. Попробуйте позже.');
        }

        $debugCode = $tokenService->create($identifier, $type);

        $response = [
            'toast' => 'Код отправлен',
            'data' => null,
        ];

        if ($debugCode !== null && config('app.debug')) {
            $response['data']['debug_code'] = $debugCode;
        }

        return response()->json($response);
    }
}
