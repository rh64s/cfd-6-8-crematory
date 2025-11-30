<?php

namespace App\Actions\Auth;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    public function handle(LoginUserRequest $request)
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password,
        ];

        if (! Auth::attempt($credentials)) {
            return [
                'success' => false,
                'error' => [
                    'code' => 401,
                    'message' => 'Неверный логин или пароль.',
                ],
            ];
        }

        $user = Auth::user();
        $token = $user->createToken('auth-token')->plainTextToken;

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
                'is_admin' => $user->is_admin,
            ],
            'token' => $token,
            'toast' => 'Вы успешно вошли в систему',
        ];
    }
}
