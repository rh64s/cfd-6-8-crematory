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
        if(auth("sanctum")->user()->isAdmin()){
            return response()->json([
                'data' => new ServiceResource($service)
            ]);
        }
        return $service->is_active == true ?
            response()->json([
                'data' => $service
            ]) :
            throw new NotFoundHttpException();
    }
}
