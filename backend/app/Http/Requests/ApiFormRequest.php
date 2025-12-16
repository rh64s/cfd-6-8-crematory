<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // единая валидация
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'error' => [
                    'code' => 422,
                    'message' => 'Пожалуйста, введите корректные данные.',
                    'details' => $validator->errors(),
                ],
            ], 400)
        );
    }
}
