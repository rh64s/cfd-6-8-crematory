<?php

namespace App\Http\Controllers;

use App\Actions\Service\CreateServiceAction;
use App\Actions\Service\ListServicesAction;
use App\Actions\Service\ShowServiceAction;
use App\Actions\Service\UpdateServiceAction;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        return ListServicesAction::handle($request);
    }

    public function show(Service $service): JsonResponse
    {
        return ShowServiceAction::handle($service);
    }

    public function store(StoreServiceRequest $request): JsonResponse
    {
        return CreateServiceAction::handle($request);
    }

    public function update(UpdateServiceRequest $request, Service $service): JsonResponse
    {
        return UpdateServiceAction::handle($request, $service);
    }

    public function destroy(Service $service): JsonResponse
    {
        $service->delete();
        return response()->json([
            "message" => "Успешно удалено"
        ], 200);
    }
}
