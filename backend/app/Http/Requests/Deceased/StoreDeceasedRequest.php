<?php

namespace App\Http\Requests\Deceased;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeceasedRequest extends FormRequest
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
            'order_id' => ['required', 'integer', 'exists:orders,id'],
            'first_name' => 'string|required|max:255',
            'last_name' => 'string|required|max:255',
            'patronymic' => 'string|max:255',
            'date_of_birth' => 'date|required',
            'date_of_death' => 'date|required|after:date_of_birth',
            'cause_of_death' => 'string|required',
            'comment' => 'string|nullable',
        ];
    }
}
