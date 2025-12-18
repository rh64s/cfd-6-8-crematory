<?php

namespace App\Http\Controllers;

use App\Actions\Orders\CreateOrderAction;
use App\Actions\Orders\ListOrdersAction;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        return ListOrdersAction::handle($request);
    }
    public function store(StoreOrderRequest $request)
    {
        return CreateOrderAction::handle($request);
    }
    public function show(Order $order)
    {
        return new OrderResource($order);
    }
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return new OrderResource($order);
    }
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(["toast" => "Успешно удалено"], 204);
    }
}
