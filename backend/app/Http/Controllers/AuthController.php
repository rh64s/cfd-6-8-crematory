<?php

namespace App\Http\Controllers;

use App\Actions\Auth\LoginUserAction;
use App\Actions\Auth\LogoutUserAction;
use App\Actions\Auth\RegisterUserAction;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
//    лучше action как статические вызывать
//      то есть, не создавая объект класса, можем вызвать его метод
//    это один из способов работать с ними, но, так как мы в action сильно не углубляемся, то отдельный пакет не будет докачивать

    public function register(RegisterUserRequest $request): JsonResponse
    {
        return RegisterUserAction::handle($request);
    }

    public function login(LoginUserRequest $request): JsonResponse
    {
        return LoginUserAction::handle($request);
    }

    public function logout(Request $request): JsonResponse
    {
        return LogoutUserAction::handle();
    }
}
