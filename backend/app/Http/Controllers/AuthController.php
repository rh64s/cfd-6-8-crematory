<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\Actions\Auth\RegisterUserAction;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected RegisterUserAction $registerUserAction,
        protected LoginUserAction    $loginUserAction,
        protected LogoutUserAction   $logoutUserAction,
    )
    {
    }

    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = $this->registerUserAction->handle($request->validated());

        return response()->json([
            'success' => true,
            'data' => new UserResource($user),
            'toast' => 'Вы успешно прошли регистрацию',
        ], 201);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        $result = $this->loginUserAction->handle($request->validated());

        return response()->json([
            'success' => true,
            'data' => new UserResource($result['user']),
            'token' => $result['token'],
            'toast' => 'Вы успешно вошли в систему',
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->logoutUserAction->handle($request->user());

        return response()->json([
            'success' => true,
            'toast' => 'Вы успешно вышли из системы',
        ]);
    }
}
