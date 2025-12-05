<?php

namespace App\Actions\Service\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class DeleteServiceAction
{
    public function handle(int $id): void
    {
        DB::transaction(function () use ($id) {
            $service = Service::findOrFail($id);
            $service->delete();
        });
    }
}
