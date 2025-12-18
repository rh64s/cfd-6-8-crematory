<?php

namespace App\Actions\User;

use App\Exceptions\InvalidCurrentPasswordException;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction
{
    public static function handle(ChangePasswordRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        if (!Hash::check($data['current_password'], $user->password)) {
            throw new InvalidCurrentPasswordException();
        }

        $user->password = $data['password'];
        $user->save();

        return response()->json([
            'toast' => 'Пароль успешно изменён',
            'data' => null,
        ]);
    }
}
