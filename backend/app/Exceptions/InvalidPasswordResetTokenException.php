<?php

namespace App\Exceptions;

use Exception;

class InvalidPasswordResetTokenException extends Exception
{
    public function __construct(string $reason = 'invalid')
    {
        $messages = [
            'token_not_found' => 'Такого номера телефона/адреса электронной почты не существует.',
            'expired' => 'Код восстановления устарел. Попробуйте снова.',
            'invalid' => 'Неверный код.', // Из ТЗ
            'too_many_attempts' => 'Слишком много попыток.',
        ];

        parent::__construct(
            $reason,
            401
        );
    }
}
