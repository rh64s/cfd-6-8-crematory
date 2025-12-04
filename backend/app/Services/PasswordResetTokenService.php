<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetTokenService
{
    protected const EXPIRY_MINUTES = 10;

    public function create(string $login, string $plainToken): void
    {
        DB::table('password_reset_tokens')->updateOrInsert(
            ['login' => $login],
            [
                'token' => Hash::make($plainToken),     // создаем токен
                'created_at' => now(),
            ]
        );
    }

    /**
     * @return array{valid: bool, reason?: string}
     */
    public function validate(string $login, string $plainToken): array
    {
        $record = DB::table('password_reset_tokens')     // проверяем токен
            ->where('login', $login)
            ->first();

        if (!$record) {
            return ['valid' => false, 'reason' => 'token_not_found'];    // если нет
        }

        if (Carbon::parse($record->created_at)->addMinutes(self::EXPIRY_MINUTES)->isPast()) {
            $this->delete($login);

            return ['valid' => false, 'reason' => 'expired'];      // если старый
        }

        if (!Hash::check($plainToken, $record->token)) {
            return ['valid' => false, 'reason' => 'invalid'];       // не подходит
        }

        return ['valid' => true];
    }

    // предотвращаем повторное использование кода
    public function delete(string $login): void
    {
        DB::table('password_reset_tokens')
            ->where('login', $login)
            ->delete();
    }
}
