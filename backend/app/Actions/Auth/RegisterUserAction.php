<?php

namespace App\Actions\Auth;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public function handle(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'patronymic' => $data['patronymic'] ?? null,
            'login' => $data['login'],
            'phone' => $data['phone'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        return [
            'success' => true,
            'data' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'patronymic' => $user->patronymic,
                'login' => $user->login,
                'phone' => $user->phone,
                'email' => $user->email,
            ],
            'toast' => 'Вы успешно прошли регистрацию',
        ];
    }
}
