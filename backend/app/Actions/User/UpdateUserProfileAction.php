<?php

namespace App\Actions\User;

use App\Models\User;

class UpdateUserProfileAction
{
    public function handle(User $user, array $data): User
    {
        $user->update([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'patronymic'  => $data['patronymic'] ?? null,
            'phone'       => $data['phone'],
            'email'       => $data['email'] ?? null,
        ]);

        return $user->refresh();
    }
}

