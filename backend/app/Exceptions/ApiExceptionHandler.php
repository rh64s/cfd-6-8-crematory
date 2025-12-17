<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Illuminate\Http\JsonResponse;

class ApiExceptionHandler
{

    public static function getExceptionsToIgnore(): array
    {
        return [
            AuthenticationException::class,
            ModelNotFoundException::class,
            NotFoundHttpException::class,
            InvalidPasswordResetTokenException::class,
            InvalidCredentialsException::class,
            InvalidCurrentPasswordException::class,
        ];
    }

    public function handle(Throwable $e): ?JsonResponse
    {
        if ($e instanceof InvalidPasswordResetTokenException) {
            return $this->errorResponse(400, $e->getMessage());
        }

        if ($e instanceof InvalidCredentialsException) {
            return $this->errorResponse(401, $e->getMessage());
        }

        if ($e instanceof InvalidCurrentPasswordException) {
            return $this->errorResponse(400, $e->getMessage());
        }

        if ($e instanceof AuthenticationException) {
            return $this->errorResponse(401, 'Необходима авторизация.');
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return $this->errorResponse(404, 'Запрашиваемый ресурс не найден.');
        }

        if (! app()->environment('local')) {
            return $this->errorResponse(500, 'Внутренняя ошибка сервера. Мы уже работаем над её устранением.');
        }

        if ($e instanceof AccessDeniedHttpException) {
            return $this->errorResponse(403, 'Доступ запрещен');
        }

        return null;
    }

    protected function errorResponse(int $code, string $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error'   => [
                'code'    => $code,
                'message' => $message,
            ],
        ], $code);
    }
}
