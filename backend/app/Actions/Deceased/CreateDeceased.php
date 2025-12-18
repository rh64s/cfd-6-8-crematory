<?php

namespace App\Actions\Deceased;
use App\Http\Requests\Deceased\StoreDeceasedRequest;
use App\Models\Deceased;

class CreateDeceased {
    public static function handle(StoreDeceasedRequest $request)
    {
        $deceased = Deceased::create([$request->validated()]);
        return response()->json([
            "message" => "Умерший успешно добвален",
            "data" => $deceased,
        ]);
    }
}
