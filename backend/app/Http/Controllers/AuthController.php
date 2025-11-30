<?php

namespace App\Http\Controllers;

use App\Actions\Auth\RegisterUserAction;
use App\Http\Requests\RegisterUserRequest;
use App\Actions\Auth\LoginUserAction;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\JsonResponse;
use App\Actions\Auth\LogoutUserAction;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(RegisterUserRequest $request): JsonResponse
    {
        return response()->json(
            (new RegisterUserAction())->handle($request),
            201
        );
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $result = (new LoginUserAction())->handle($request);

        return response()->json(
            $result,
            $result['success'] ? 200 : 401
        );
    }
    public function logout(Request $request): JsonResponse
    {
        $result = (new LogoutUserAction())->handle($request);

        return response()->json($result, 200);
    }
}
