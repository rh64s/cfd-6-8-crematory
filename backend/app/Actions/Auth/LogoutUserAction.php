<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LogoutUserAction
{
    public static function handle(): JsonResponse
    {
        /*
         * Здесь просто удаляем токен для текущего пользователя, и говорим, что все норм
         * отдельные successful не нужно делать: для этого у нас статусы есть
         * */
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'toast' => 'Вы успешно вышли из аккаунта',
            'data' => null,
        ], 200);
    }
}
