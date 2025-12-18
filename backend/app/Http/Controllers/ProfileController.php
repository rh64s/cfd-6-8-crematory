<?php

namespace App\Http\Controllers;

use App\Actions\User\ChangePasswordAction;
use App\Actions\User\UpdateUserProfileAction;
use App\Actions\User\ShowUserAction;
use App\Actions\User\DeleteUserAction;
use App\Actions\User\ListUsersAction;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(Request $request): JsonResponse
    {
        return ShowUserAction::handle($request, $request->user()->id);
    }

    public function show(Request $request, int $id): JsonResponse
    {
        return ShowUserAction::handle($request, $id);
    }

    public function list(Request $request): JsonResponse
    {
        return ListUsersAction::handle($request);
    }

    public function update(UpdateProfileRequest $request): JsonResponse
    {
        return UpdateUserProfileAction::handle($request);
    }

    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        return ChangePasswordAction::handle($request);
    }

    public function destroy(Request $request): JsonResponse
    {
        return DeleteUserAction::handle($request);
    }
}
