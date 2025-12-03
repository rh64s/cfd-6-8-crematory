<?php
namespace App\Http\Requests;

class ForgotPasswordRequest extends ApiFormRequest
{
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
