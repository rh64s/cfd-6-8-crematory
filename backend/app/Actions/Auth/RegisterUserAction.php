<?php

namespace App\Actions\Auth;

use App\Models\User;

class RegisterUserAction
{
    public function handle(array $data): User     // создаем юзера
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'patronymic' => $data['patronymic'] ?? null,
            'login' => $data['login'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'password' => $data['password'],
        ]);
    }
}
