<?php

namespace App\Exceptions;

use Exception;

class InvalidCredentialsException extends Exception
{
    public function __construct(string $message = 'Неверный логин или пароль.')
    {
        parent::__construct($message, 401);
    }
}
