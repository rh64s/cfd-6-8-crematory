<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array    /*Добавила на свой взгляд адекватные поля*/
    {
        return [
            'first_name' => [
                'required',
                'string',
                'between:2,255',
                'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u',           /*Регулярки повторяются, может вынесу в отдельную переменную*/
            ],
            'last_name' => [
                'required',
                'string',
                'between:2,255',
                'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u',
            ],
            'patronymic' => [
                'nullable',
                'string',
                'between:2,255',
                'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u',
            ],
            'login' => [
                'required',
                'string',
                'between:6,32',
                'unique:users,login',
                'regex:/^[a-zA-Z0-9]+$/',
                ],
            'phone' => [
                'required',
                'string',
                'regex:/^[\+]?[0-9\(\)\s\-]{10,20}$/',
                'unique:users,phone',
            ],
            'email' => [
                'nullable',
                'email',
                'unique:users,email',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'Имя должно содержать только буквы, пробелы, дефисы и апострофы.',
            'last_name.regex' => 'Фамилия должна содержать только буквы, пробелы, дефисы и апострофы.',
            'patronymic.regex' => 'Отчество должно содержать только буквы, пробелы, дефисы и апострофы.',
            'login.regex' => 'Логин должен содержать только латинские буквы и цифры.',
            'phone.regex' => 'Неверный формат телефона. Пример: +7 (999) 123-45-67.',
            'password.regex' => 'Пароль должен содержать минимум 8 символов, 1 заглавную букву и 1 цифру.',
        ];
    }

    protected function prepareForValidation(): void    /*Возможно надо будет вынести отдельно*/
    {
        $phone = $this->input('phone');
        if ($phone) {
            $clean = preg_replace('/[^+\d]/', '', $phone);
            if (str_starts_with($clean, '8')) {
                $clean = '+7' . substr($clean, 1);
            } elseif (!str_starts_with($clean, '+')) {
                $clean = '+7' . $clean;
            }
            $this->merge(['phone' => $clean]);
        }
    }
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'error' => [
                'code' => 400,
                'message' => 'Пожалуйста, введите корректные данные.',
                'details' => $validator->errors(),
            ],
        ], 400));
    }
}
