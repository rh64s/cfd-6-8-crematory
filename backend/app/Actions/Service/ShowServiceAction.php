<?php

namespace App\Actions\Service;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShowServiceAction
{
    public static function handle(Service $service)
    {
        if (Gate::allows('admin-action', $service)) {
            return response()->json([
                'data' => new ServiceResource($service)
            ]);
        } else {
            return $service->isActive == true ?
                response()->json([
                    'data' => $service
                ]) :
                throw new NotFoundHttpException();
        }
    }
}
