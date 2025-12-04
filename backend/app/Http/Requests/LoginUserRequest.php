<?php
namespace App\Http\Requests;

class LoginUserRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required', 'string', 'between:6,32', 'regex:/^[a-zA-Z0-9]+$/'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'login.regex' => 'Логин должен содержать только латинские буквы и цифры.',
        ];
    }
}

