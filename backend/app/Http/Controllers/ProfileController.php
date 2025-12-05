<?php

namespace App\Http\Controllers;

use App\Actions\User\ChangePasswordAction;
use App\Actions\User\UpdateUserProfileAction;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        protected UpdateUserProfileAction $updateUserProfileAction,
        protected ChangePasswordAction    $changePasswordAction,
    ) {
    }

    // получить данные юзера
    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => new UserResource($request->user()),
        ]);
    }

    // обновить профиль
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        $updatedUser = $this->updateUserProfileAction->handle($user, $data);

        return response()->json([
            'success' => true,
            'data'    => new UserResource($updatedUser),
            'toast'   => 'Профиль успешно обновлён',
        ]);
    }

    // смена пароля
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        $this->changePasswordAction->handle($user, $data['current_password'], $data['password']);

        return response()->json([
            'success' => true,
            'toast'   => 'Пароль успешно изменён',
        ]);
    }
}
