<?php

namespace App\Actions\Auth;

use Illuminate\Http\Request;

class LogoutUserAction
{
    public function handle(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();

        return [
            'success' => true,
            'toast' => 'Вы успешно вышли из системы',
        ];
    }
}
