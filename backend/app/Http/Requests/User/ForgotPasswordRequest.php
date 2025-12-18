<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;

class ForgotPasswordRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'exists:users,email'],
            'phone' => ['nullable', 'string', 'exists:users,phone'],
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
            'email.exists' => 'Пользователь с таким email не найден.',
            'phone.exists' => 'Пользователь с таким номером телефона не найден.',
        ];
    }
}

