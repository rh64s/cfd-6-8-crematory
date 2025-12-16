<?php

namespace App\Http\Requests\User;
use App\Http\Requests\ApiFormRequest;

class ForgotPasswordRequest extends ApiFormRequest
{
    // для отправки кода восстановления используем логин

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'exists:users,login'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.exists' => 'Пользователь с таким логином не найден.',
        ];
    }
}
