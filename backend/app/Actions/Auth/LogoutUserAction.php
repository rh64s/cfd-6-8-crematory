<?php

namespace App\Actions\Auth;

use App\Models\User;

class LogoutUserAction
{
    public function handle(?User $user): void
    {
        $user?->currentAccessToken()?->delete();
    }
}
