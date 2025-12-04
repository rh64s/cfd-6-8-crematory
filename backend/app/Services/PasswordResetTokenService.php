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
                'token' => Hash::make($plainToken),
                'created_at' => now(),
            ]
        );
    }

    /**
     * @return array{valid: bool, reason?: string}
     */
    public function validate(string $login, string $plainToken): array
    {
        $record = DB::table('password_reset_tokens')
            ->where('login', $login)
            ->first();

        if (!$record) {
            return ['valid' => false, 'reason' => 'token_not_found'];
        }

        if (Carbon::parse($record->created_at)->addMinutes(self::EXPIRY_MINUTES)->isPast()) {
            $this->delete($login);

            return ['valid' => false, 'reason' => 'expired'];
        }

        if (!Hash::check($plainToken, $record->token)) {
            return ['valid' => false, 'reason' => 'invalid'];
        }

        return ['valid' => true];
    }

    public function delete(string $login): void
    {
        DB::table('password_reset_tokens')
            ->where('login', $login)
            ->delete();
    }
}
