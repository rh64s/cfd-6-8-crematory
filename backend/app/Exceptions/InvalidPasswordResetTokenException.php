<?php

namespace App\Exceptions;

use Exception;

class InvalidPasswordResetTokenException extends Exception
{
    public function __construct(string $reason = 'invalid')
    {
        $messages = [
            'token_not_found' => 'Код восстановления не найден.',
            'expired' => 'Код восстановления устарел. Попробуйте снова.',
            'invalid' => 'Неверный код восстановления.',
        ];

        parent::__construct(
            $messages[$reason] ?? 'Неверный или устаревший код восстановления.',
            401
        );
    }
}

