<?php

namespace App\Actions\Orders;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class CreateOrderAction {
    public static function handle(StoreOrderRequest $request): JsonResponse
    {
        $order = Order::create([
            "user_id" => $request->user()->id,
            "cremation_date" => $request->creation_date,
            "urn_delivery_place" => $request->urn_delivery_place,
        ]);
        return response()->json([
            'toast' => 'Заказ создан.',
            'data' => new OrderResource($order)
        ]);
    }
}
