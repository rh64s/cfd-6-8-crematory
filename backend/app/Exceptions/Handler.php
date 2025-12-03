<?php
// app/Exceptions/Handler.php

namespace App\Exceptions;

use App\Exceptions\InvalidPasswordResetTokenException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        AuthenticationException::class,
        ModelNotFoundException::class,
        NotFoundHttpException::class,
        InvalidPasswordResetTokenException::class,
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof InvalidPasswordResetTokenException) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => $e->getMessage(),
                ],
            ], 400);
        }

        if ($e instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 401,
                    'message' => 'Необходима авторизация.',
                ],
            ], 401);
        }

        if ($e instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 400,
                    'message' => 'Пожалуйста, введите корректные данные.',
                    'details' => $e->errors(),
                ],
            ], 400);
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 404,
                    'message' => 'Запрашиваемый ресурс не найден.',
                ],
            ], 404);
        }


        if (! app()->environment('local')) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => 500,
                    'message' => 'Внутренняя ошибка сервера. Мы уже работаем над её устранением.',
                ],
            ], 500);
        }

        return parent::render($request, $e);
    }
}
