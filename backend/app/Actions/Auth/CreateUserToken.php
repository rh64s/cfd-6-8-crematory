<?php

namespace App\Actions\Auth;
class CreateUserToken {

    /*
     * Отдельный класс для того, чтобы соблюдать одноименность токенов в базе данных
     * */

    public static function handle(\App\Models\User $user): string
    {
        return $user->createToken('auth-token')->plainTextToken;
    }
}
