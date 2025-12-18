<?php

namespace App\Actions\Service;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateServiceAction
{
    public static function handle(StoreServiceRequest $request): JsonResponse
    {
        return response()->json([
            "toast" => "Успешно создано",
            "data" => Service::create($request->validated()),
        ], 201);
    }
}
