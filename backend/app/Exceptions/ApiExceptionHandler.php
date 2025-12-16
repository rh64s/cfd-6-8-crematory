<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        if ($e instanceof InvalidCredentialsException) {
            return $this->errorResponse(401, 'Неверно указан логин или пароль.');
        }

        if ($e instanceof InvalidPasswordResetTokenException) {
            $messages = [
                'token_not_found' => 'Код восстановления не найден.',
                'expired' => 'Код восстановления устарел. Попробуйте снова.',
                'invalid' => 'Неверный код.',
                'too_many_attempts' => 'Слишком много попыток. Попробуйте позже.',
            ];
            $message = $messages[$e->getMessage()] ?? 'Неверный код восстановления.';
            return $this->errorResponse(401, $message);
        }

        if ($e instanceof InvalidCurrentPasswordException) {
            return $this->errorResponse(400, 'Неверный текущий пароль.');
        }

        if ($e instanceof AuthenticationException) {
            return $this->errorResponse(401, 'Необходима авторизация.');
        }

        if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
            return $this->errorResponse(404, 'Страница не найдена, возможно она была перенесена на другой адрес.');
        }

        if ($e->getCode() == 502 || str_contains($e->getMessage(), '502')) {
            return $this->errorResponse(502, 'Временные неполадки на нашей стороне. Мы уже решаем проблему. Пожалуйста подождите.');
        }

        if ($e->getCode() == 503 || str_contains($e->getMessage(), '503')) {
            return $this->errorResponse(503, 'Сервер временно недоступен, пожалуйста подождите немного');
        }

        if ($e->getCode() == 507) {
            return $this->errorResponse(507, 'Недостаточно места на сервере. Пожалуйста подождите. Мы уже работаем над восстановлением.');
        }

        if ($e->getCode() == 422 && str_contains($e->getMessage(), 'почт')) {
            return $this->errorResponse(422, 'К сожалению мы не можем отправить документы выбранным способом.');
        }

        if (!app()->environment('production')) {
            return $this->errorResponse(500, $e->getMessage());
        }

        return $this->errorResponse(500, 'Внутренняя ошибка сервера. Пожалуйста, попробуйте позже.');
    }

    protected function errorResponse(int $code, string $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $code,
                'message' => $message,
            ],
        ], $code);
    }
}



