<?php

namespace App\Actions\Service;

use App\Models\Service;
use Illuminate\Support\Facades\Gate;

class ShowServiceAction
{
    public function handle(int $id): Service
    {
        $service = Service::findOrFail($id);

        return $service;
    }
}
