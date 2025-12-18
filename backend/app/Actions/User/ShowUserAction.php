<?php

namespace App\Actions\User;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShowUserAction
{
    public static function handle(Request $request, int $userId): JsonResponse
    {
        $currentUser = $request->user();
        $targetUser = User::findOrFail($userId);

        if (!Gate::allows('view', $targetUser)) {
            abort(403, 'Недостаточно прав для просмотра данного пользователя.');
        }

        return response()->json([
            'data' => new UserResource($targetUser),
        ]);
    }
}
