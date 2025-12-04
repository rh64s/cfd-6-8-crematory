<?php

namespace App\Services;

// генерация кода восстановления пароля
class SmsCodeGenerator
{
    public function generate(int $length = 6): string
    {
        $min = 10 ** ($length - 1);
        $max = (10 ** $length) - 1;

        return str_pad((string) random_int($min, $max), $length, '0', STR_PAD_LEFT);
    }
}
