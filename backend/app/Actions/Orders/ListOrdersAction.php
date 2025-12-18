<?php

namespace App\Actions\Orders;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ListOrdersAction
{
    public static function handle(Request $request) {
        if (Gate::allows('admin-action')) {
            return OrderResource::collection(Order::all());
        }
        return OrderResource::collection(Auth::user()->orders);
    }
}
