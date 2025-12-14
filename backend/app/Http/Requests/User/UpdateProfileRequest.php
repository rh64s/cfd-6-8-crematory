<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends ApiFormRequest
{
    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'first_name' => ['string', 'between:2,255', 'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u'],
            'last_name' => ['string', 'between:2,255', 'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u'],
            'patronymic' => ['string', 'between:2,255', 'regex:/^[а-яА-ЯёЁa-zA-Z\s\-\'\x{0400}-\x{04FF}]+$/u'],
            'phone' => [
                'string',
                'regex:/^[\+]?[0-9\(\)\s\-]{10,20}$/',
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            'email' => [
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.regex' => 'Имя должно содержать только буквы, пробелы, дефисы и апострофы.',
            'last_name.regex' => 'Фамилия должна содержать только буквы, пробелы, дефисы и апострофы.',
            'patronymic.regex' => 'Отчество должно содержать только буквы, пробелы, дефисы и апострофы.',
            'phone.regex' => 'Неверный формат телефона. Пример: +7 (999) 123-45-67.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $phone = $this->input('phone');
        if ($phone) {
            $clean = preg_replace('/[^+\d]/', '', $phone);
            if (str_starts_with($clean, '8')) {
                $clean = '+7' . substr($clean, 1);
            } elseif (! str_starts_with($clean, '+')) {
                $clean = '+7' . $clean;
            }
            $this->merge(['phone' => $clean]);
        }
    }
}
