<?php

namespace App\Exceptions;

use Exception;

class InvalidCurrentPasswordException extends Exception
{
    public function __construct(string $message = 'Неверный текущий пароль.')
    {
        parent::__construct($message, 400);
    }
}
