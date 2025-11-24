<?php

namespace App\Http\Controllers;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $result = (new RegisterUserAction())->handle($request);

        return response()->json($result, 201);
    }
}
