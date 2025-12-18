<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() && $this->user()->is_admin;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[А-Яа-яЁёA-Za-z0-9\s\-\"«»()\.,:;!?]+$/u',
            ],
            'description' => [
                'required',
                'string',
                'max:2000',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0',
                'regex:/^\d+(\.\d{1,2})?$/',
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Название услуги обязательно',
            'name.min' => 'Название должно быть не менее 3 символов',
            'name.max' => 'Название не должно превышать 255 символов',
            'name.regex' => 'Название содержит недопустимые символы',

            'description.required' => 'Описание услуги обязательно',
            'description.max' => 'Описание не должно превышать 2000 символов',

            'price.required' => 'Цена услуги обязательна',
            'price.min' => 'Цена не может быть отрицательной',
            'price.regex' => 'Цена должна быть в формате 0.00 (например: 15000.50)',

            'is_active.boolean' => 'Статус активности должен быть true или false',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Название услуги',
            'description' => 'Описание услуги',
            'price' => 'Цена услуги',
            'is_active' => 'Статус активности',
        ];
    }
}
