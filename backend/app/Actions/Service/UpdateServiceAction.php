<?php

namespace App\Actions\Service;

use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UpdateServiceAction
{
    public static function handle(UpdateServiceRequest $request, Service $service): JsonResponse
    {
//        return DB::transaction(function () use ($id, $data) {
//            $service = Service::findOrFail($id);
//            $service->update($data);
//
//            return $service->fresh();
//        });
        $service->update($request->validated());
        $service->refresh();
        return response()->json([
            "toast" => "Обновление успешно",
            "data" => $service
        ]);
    }
}
