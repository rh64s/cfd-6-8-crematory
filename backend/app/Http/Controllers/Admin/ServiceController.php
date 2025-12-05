<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Actions\Service\ListServicesAction;
use App\Actions\Service\ShowServiceAction;
use App\Actions\Service\Admin\CreateServiceAction;
use App\Actions\Service\Admin\UpdateServiceAction;
use App\Actions\Service\Admin\DeleteServiceAction;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\JsonResponse;

class ServiceController extends Controller
{
    public function __construct(
        protected ListServicesAction $listServicesAction,
        protected ShowServiceAction $showServiceAction,
        protected CreateServiceAction $createServiceAction,
        protected UpdateServiceAction $updateServiceAction,
        protected DeleteServiceAction $deleteServiceAction,
    ) {
    }

    public function index(): JsonResponse
    {
        $services = $this->listServicesAction->handle(false);        // все услуги, включая неактивные

        return response()->json([
            'success' => true,
            'data' => ServiceResource::collection($services),
        ]);
    }

    public function store(StoreServiceRequest $request): JsonResponse
    {
        $service = $this->createServiceAction->handle($request->validated());

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
            'toast' => 'Услуга успешно создана',
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $service = $this->showServiceAction->handle($id);

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
        ]);
    }

    public function update(UpdateServiceRequest $request, int $id): JsonResponse
    {
        $service = $this->updateServiceAction->handle($id, $request->validated());

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
            'toast' => 'Услуга успешно обновлена',
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->deleteServiceAction->handle($id);

        return response()->json([
            'success' => true,
            'toast' => 'Услуга успешно удалена',
        ]);
    }
}
