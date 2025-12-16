<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Service;


class ServicePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Service $service): bool
    {
        return $service->is_active || $user->is_admin;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, Service $service): bool
    {
        return $user->is_admin;
    }

    public function delete(User $user, Service $service): bool
    {
        return $user->is_admin;
    }
}
