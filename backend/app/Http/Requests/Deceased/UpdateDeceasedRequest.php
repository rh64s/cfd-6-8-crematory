<?php

namespace App\Http\Requests\Deceased;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeceasedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'patronymic' => 'string|max:255',
            'date_of_birth' => 'date',
            'date_of_death' => 'date|after:date_of_birth',
            'cause_of_death' => 'string',
            'comment' => 'string|nullable',
        ];
    }
}
