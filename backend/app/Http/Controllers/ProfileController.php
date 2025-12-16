<?php

namespace App\Http\Controllers;

use App\Actions\User\ChangePasswordAction;
use App\Actions\User\UpdateUserProfileAction;
use App\Actions\User\ShowUserAction;
use App\Actions\User\DeleteUserAction;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        protected ChangePasswordAction $changePasswordAction,
        protected UpdateUserProfileAction $updateUserProfileAction,
        protected ShowUserAction $showUserAction,
        protected DeleteUserAction $deleteUserAction,
    ) {}

    public function me(Request $request): JsonResponse
    {
        return $this->showUserAction->handle($request->user(), $request->user()->id);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        return $this->showUserAction->handle($request->user(), $id);
    }

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        return $this->updateUserProfileAction->handle($request);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        $this->changePasswordAction->handle($user, $data['current_password'], $data['password']);

        return response()->json([
            'success' => true,
            'toast' => 'Пароль успешно изменён',
            'data' => null,
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $this->deleteUserAction->handle($request->user(), $request->user());

        return response()->json([
            'success' => true,
            'toast'   => 'Аккаунт удалён',
        ]);
    }
}
