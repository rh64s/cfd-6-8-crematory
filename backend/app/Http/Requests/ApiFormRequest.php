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

    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        $firstError = $errors->first();
        $message = "Пожалуйста введите корректные данные.($firstError)";

        throw new HttpResponseException(
            response()->json([
                'error' => [
                    'code' => 400,
                    'message' => $message,
                    'details' => $errors->toArray(),
                ],
            ], 400)
        );
    }
}
