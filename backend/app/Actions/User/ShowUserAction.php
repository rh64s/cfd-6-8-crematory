<?php

namespace App\Actions\User;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ShowUserAction
{
    public function handle(User $user, int $userId): JsonResponse
    {
        $targetUser = User::findOrFail($userId);

        if (!Gate::allows('view', $targetUser)) {
            abort(403, 'Недостаточно прав для просмотра данного пользователя.');
        }

        return response()->json([
            'success' => true,
            'data' => new UserResource($targetUser),
        ]);
    }
}
