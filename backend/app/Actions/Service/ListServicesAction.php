<?php

namespace App\Actions\Service;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ListServicesAction
{
    public static function handle(Request $request)
    {
        // обращение к sanctum и прямая просьба к нему узнать авторизован ли пользователь
        // требуется для работы sanctum, не объявляя sanctum middleware в маршруте
        if(auth("sanctum")->user()->isAdmin()){
            return response()->json([
                "data" => ServiceResource::collection(Service::all())
            ]);
        }
        return response()->json([
            "data" => ServiceResource::collection(Service::all()->where("is_active", "==", true)->all())
        ]);
    }
}
