<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'patronymic' => $this->patronymic,
            'login'      => $this->login,
            'phone'      => $this->phone,
            'email'      => $this->email,
            'is_admin'   => $this->is_admin,
        ];
    }
}
