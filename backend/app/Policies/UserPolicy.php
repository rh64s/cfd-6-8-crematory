<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->is_admin;
    }
    public function view(User $authUser, User $targetUser): bool
    {
        return $authUser->is_admin || $authUser->id === $targetUser->id;   // админ видит всех
    }

    public function update(User $authUser, User $targetUser): bool
    {
        return $authUser->is_admin || $authUser->id === $targetUser->id;
    }

    public function delete(User $authUser, User $targetUser): bool
    {
        return $authUser->is_admin || $authUser->id === $targetUser->id;           // удалять может сам или админ

    }
}
