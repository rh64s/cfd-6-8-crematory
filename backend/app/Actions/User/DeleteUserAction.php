<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class DeleteUserAction
{
    public function handle(User $user, User $targetUser): void
    {
        if (!Gate::allows('delete', $targetUser)) {
            abort(403, 'Недостаточно прав для удаления пользователя.');
        }

        DB::transaction(function () use ($targetUser) {
            $targetUser->anonymize();

            $targetUser->tokens()->delete();
        });
    }
}
