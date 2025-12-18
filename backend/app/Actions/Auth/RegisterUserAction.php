<?php

namespace App\Actions\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterUserAction
{
    public static function handle(Request $request): JsonResponse
    {
        /*
         * Создаем пользователя из тех всех данных, что прилетают из запроса
         * Запрос проверяется через request, и, в случае неудачи, там самостоятельно сгенерируется ошибка о неправильности ввода данных
         * */

        $user = User::create($request->validated());

        return response()->json([
            'toast' => 'Вы успешно прошли регистрацию',
        ], 201);
        /*
         * Сразу выдаем токен пользователю, чтобы не пришлось по новой регистрироваться
         *  (думаю, если пользователь зарегистрируется, то будет вопрос:
         *           а где мой аккаунт в итоге то)
         * */
    }
}
