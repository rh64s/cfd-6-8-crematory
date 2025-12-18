<?php

namespace App\Actions\User;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

class UpdateUserProfileAction
{
    public static function handle(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $user->update($request->validated());

        return response()->json([
            'toast' => 'Профиль успешно обновлён',
            'data' => UserResource::make($user),
        ]);
    }
}
