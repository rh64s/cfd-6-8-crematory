<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\Deceased\StoreDeceasedRequest;
use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'cremation_date' => 'date_format:Y-m-d',
            'urn_delivery_place' => 'required|string',
            'cancellation_reason' => 'string',
            'confirmed_at' => 'date',
            'in_progress_at' => 'date',
            'completed_at' => 'date',
            'status' => 'string|in:' . implode(',', Order::STATUSES),
        ];
    }
}
