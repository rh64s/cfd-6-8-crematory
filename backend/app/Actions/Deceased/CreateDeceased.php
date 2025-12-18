<?php

namespace App\Actions\Deceased;
use App\Http\Requests\Deceased\StoreDeceasedRequest;
use App\Http\Resources\DeceasedResource;
use App\Models\Deceased;

class CreateDeceased {
    public static function handle(StoreDeceasedRequest $request)
    {
        $deceased = Deceased::create([$request->validated()]);
        return response()->json([
            "toast" => "Умерший успешно добвален",
            "data" => new DeceasedResource($deceased),
        ]);
    }
}
