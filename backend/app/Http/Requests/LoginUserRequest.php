<?php

namespace App\Http\Requests;

class LoginUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'between:6,32', 'regex:/^[a-zA-Z0-9]+$/'],
            'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.regex' => 'Логин должен содержать только латинские буквы и цифры.',
            'password.regex' => 'Пароль должен содержать минимум 8 символов, 1 заглавную букву и 1 цифру.',
        ];
    }
}
