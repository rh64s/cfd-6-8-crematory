<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'cremation_date' => $this->cremation_date,
            'urn_delivery_place' => $this->urn_delivery_place,
            'cancellation_reason' => $this->cancellation_reason,
            'confirmed_at' => $this->confirmed_at,
            'in_progress_at' => $this->in_progress_at,
            'completed_at' => $this->completed_at,
        ];
    }
}
