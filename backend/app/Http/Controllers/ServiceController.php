<?php

namespace App\Http\Controllers;

use App\Actions\Service\ListServicesAction;
use App\Actions\Service\ShowServiceAction;
use App\Actions\Service\Admin\CreateServiceAction;
use App\Actions\Service\Admin\UpdateServiceAction;
use App\Actions\Service\Admin\DeleteServiceAction;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    public function __construct(
        protected ListServicesAction $listServicesAction,
        protected ShowServiceAction $showServiceAction,
        protected CreateServiceAction $createServiceAction,
        protected UpdateServiceAction $updateServiceAction,
        protected DeleteServiceAction $deleteServiceAction,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $onlyActive = !Gate::allows('admin');
        $services = $this->listServicesAction->handle($onlyActive);

        return response()->json([
            'success' => true,
            'data' => ServiceResource::collection($services),
        ]);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        $service = $this->showServiceAction->handle($id);

        if (!$request->user()->can('view', $service)) {
            abort(403, 'Недостаточно прав для просмотра данной услуги.');
        }

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
        ]);
    }

    public function store(StoreServiceRequest $request): JsonResponse
    {
        if (!Gate::allows('manage-services')) {
            abort(403, 'Недостаточно прав для создания услуги.');
        }

        $service = $this->createServiceAction->handle($request->validated());

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
            'toast' => 'Новая услуга успешно добавлена в каталог услуг.',
        ], 201);
    }

    public function update(UpdateServiceRequest $request, int $id): JsonResponse
    {
        if (!Gate::allows('manage-services')) {
            abort(403, 'Недостаточно прав для обновления услуги.');
        }

        $service = $this->updateServiceAction->handle($id, $request->validated());

        return response()->json([
            'success' => true,
            'data' => new ServiceResource($service),
            'toast' => 'Данные услуги были успешно изменены.',
        ]);
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        if (!Gate::allows('manage-services')) {
            abort(403, 'Недостаточно прав для удаления услуги.');
        }

        $this->deleteServiceAction->handle($id);

        return response()->json([
            'success' => true,
            'toast' => 'Услуга успешно удалена.',
        ]);
    }
}
