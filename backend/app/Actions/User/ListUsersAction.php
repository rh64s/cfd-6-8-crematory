<?php

namespace App\Actions\User\Admin;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ListUsersAction
{
    public function handle(User $user): JsonResponse
    {
        if (!Gate::allows('manage-users')) {
            abort(403, 'Недостаточно прав для просмотра списка пользователей.');
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => UserResource::collection($users),
        ]);
    }
}
