<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use App\Exceptions\InvalidCurrentPasswordException;


class Handler extends ExceptionHandler
{
    protected $dontReport = [            // здесь то, что не логируется
        AuthenticationException::class,
        ModelNotFoundException::class,
        NotFoundHttpException::class,
        InvalidPasswordResetTokenException::class,
        InvalidCredentialsException::class,
        InvalidCurrentPasswordException::class,

    ];
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof InvalidPasswordResetTokenException) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 400,
                    'message' => $e->getMessage(),
                ],
            ], 400);
        }

        if ($e instanceof InvalidCredentialsException) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 401,
                    'message' => $e->getMessage(),
                ],
            ], 401);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 401,
                    'message' => 'Необходима авторизация.',
                ],
            ], 401);
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 404,
                    'message' => 'Запрашиваемый ресурс не найден.',
                ],
            ], 404);
        }

        if ($e instanceof InvalidCurrentPasswordException) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 400,
                    'message' => $e->getMessage(),
                ],
            ], 400);
        }

        if (! app()->environment('local')) {
            return response()->json([
                'success' => false,
                'error'   => [
                    'code'    => 500,
                    'message' => 'Внутренняя ошибка сервера. Мы уже работаем над её устранением.',
                ],
            ], 500);
        }

        return parent::render($request, $e);
    }
}
