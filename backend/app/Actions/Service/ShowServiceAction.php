<?php

namespace App\Actions\Service;

use App\Models\Service;

class ShowServiceAction
{
    public function handle(int $id): Service
    {
        return Service::where('id', $id)->where('is_active', true)->firstOrFail();
    }
}
