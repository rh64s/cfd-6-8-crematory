<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Actions\Auth\SendPasswordResetCodeAction;
use App\Actions\Auth\ResetPasswordAction;
use Illuminate\Http\JsonResponse;

class ForgotPasswordController extends Controller
{
    public function sendCode(ForgotPasswordRequest $request): JsonResponse
    {
        $result = (new SendPasswordResetCodeAction())->handle($request->login);
        return response()->json(
            $result,
            $result['success'] ? 200 : 404
        );
    }

    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        $result = (new ResetPasswordAction())
            ->handle($request->login, $request->token, $request->password);

        return response()->json(
            $result,
            $result['success'] ? 200 : 400
        );
    }
}
