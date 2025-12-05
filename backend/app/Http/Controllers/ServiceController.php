<?php

namespace App\Http\Controllers;

use App\Actions\Service\ListServicesAction;
use App\Actions\Service\ShowServiceAction;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function __construct(
        protected ListServicesAction $listServicesAction,
        protected ShowServiceAction  $showServiceAction,
    ) {
    }

    // список
    public function index(): JsonResponse
    {
        $services = $this->listServicesAction->handle(true);

        return response()->json([
            'success' => true,
            'data'    => ServiceResource::collection($services),
        ]);
    }

    // карточка
    public function show(int $id): JsonResponse
    {
        $service = $this->showServiceAction->handle($id);

        return response()->json([
            'success' => true,
            'data'    => new ServiceResource($service),
        ]);
    }
}
