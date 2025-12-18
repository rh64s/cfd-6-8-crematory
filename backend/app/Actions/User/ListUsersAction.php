<?php

namespace App\Actions\User;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListUsersAction
{
    public static function handle(Request $request): JsonResponse
    {
        if (!Gate::allows('viewAny', User::class)) {
            abort(403, 'Недостаточно прав для просмотра списка пользователей.');
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => UserResource::collection($users),
        ]);
    }
}
