<?php

namespace App\Actions\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    /**
     * @return JsonResponse
     * @throws InvalidCredentialsException
     */
    public static function handle(Request $request): JsonResponse
    {
        if (!Auth::attempt($request)) {
            throw new InvalidCredentialsException();
        }

        /** @var User $user */
        $user = Auth::user();
        $token = CreateUserToken::handle($user);

        return response()->json([
            'user' => UserResource::make($user),
            'token' => $token,
        ], 200);
    }
}



