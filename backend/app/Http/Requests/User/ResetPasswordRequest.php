<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiFormRequest;

class ResetPasswordRequest extends ApiFormRequest
{
    // для сброса пароля используем логин, код и новый пароль
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'exists:users,email'],
            'phone' => ['nullable', 'string', 'exists:users,phone'],
            'token' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $email = $this->input('email');
            $phone = $this->input('phone');

            if (!$email && !$phone) {
                $validator->errors()->add(
                    'identifier',
                    'Укажите email или номер телефона.'
                );
            }

            if ($email && $phone) {
                $validator->errors()->add(
                    'identifier',
                    'Укажите только email или только номер телефона.'
                );
            }
        });
    }

    public function messages(): array
    {
        return [
            'email.exists' => 'Пользователь не найден.',
            'phone.exists' => 'Пользователь не найден.',
            'password.regex' => 'Пароль должен содержать минимум 8 символов, 1 заглавную букву и 1 цифру.',
        ];
    }
}
