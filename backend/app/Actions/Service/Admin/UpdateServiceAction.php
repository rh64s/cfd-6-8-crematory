<?php

namespace App\Actions\Service\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class UpdateServiceAction
{
    public function handle(int $id, array $data): Service
    {
        return DB::transaction(function () use ($id, $data) {
            $service = Service::findOrFail($id);
            $service->update($data);

            return $service->fresh();
        });
    }
}
