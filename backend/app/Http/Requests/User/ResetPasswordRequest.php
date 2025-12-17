<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiFormRequest;

class ResetPasswordRequest extends ApiFormRequest
{
    // для сброса пароля используем логин, код и новый пароль
    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'exists:users,login'],
            'token' => ['required', 'string', 'size:6'],
            'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.exists' => 'Пользователь не найден.',
            'token.required' => 'Код восстановления обязателен.',
            'token.size' => 'Код восстановления должен состоять из 6 символов.',
            'password.regex' => 'Пароль должен содержать минимум 8 символов, 1 заглавную букву и 1 цифру.',
        ];
    }
}
