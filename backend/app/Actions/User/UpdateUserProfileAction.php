<?php

namespace App\Actions\User;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileAction
{
    public static function handle(Request $request): JsonResponse
    {
        /*
         * Определяем пользователя, и закидываем данные в него
         * */
        $user = Auth::user();
        $user->update($request->validated());
        return response()->json([
            "data" => UserResource::make($user),
            'toast'   => 'Профиль успешно обновлён',
        ]);
    }
}

