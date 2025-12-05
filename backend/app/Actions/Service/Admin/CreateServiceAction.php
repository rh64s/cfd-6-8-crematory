<?php

namespace App\Actions\Service\Admin;

use App\Models\Service;
use Illuminate\Support\Facades\DB;

class CreateServiceAction
{
    public function handle(array $data): Service
    {
        return DB::transaction(function () use ($data) {
            return Service::create($data);
        });
    }
}
