<?php

namespace App\Actions\User;

use App\Exceptions\InvalidCurrentPasswordException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction
{
    /**
     * @throws InvalidCurrentPasswordException
     */
    public function handle(User $user, string $currentPassword, string $newPassword): void
    {
        if (! Hash::check($currentPassword, $user->password)) {
            throw new InvalidCurrentPasswordException();
        }

        $user->password = $newPassword;
        $user->save();
    }
}
