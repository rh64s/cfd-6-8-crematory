<?php

namespace App\Actions\Service;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Support\Facades\Gate;

class ListServicesAction
{
    public static function handle()
    {
        return response()->json([
            "data" => ServiceResource::collection(
                Gate::allows('admin-action') ?
                    Service::all() :
                    Service::all()->filter(function ($service) {return $service->is_active;})
            )
        ]);
    }
}
