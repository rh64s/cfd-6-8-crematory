<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required, string, between:2,255, regex:/^[a-zA-Zа-яА-ЯёЁ\s\-\'\'""]+$/u',
            'phone' => 'required|string|regex:/^[\+][0-9\(\)\s\-]{10,20}$/',
            'question' => 'required|string|between:10,1000',
        ];
    }
}
