<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class PasswordResetTokenService
{
    private const CODE_LENGTH = 4;
    private const EXPIRY_MINUTES = 10;
    private const RESEND_TIMEOUT_SECONDS = 60;
    private const MAX_ATTEMPTS = 5;

    public function create(string $identifier, string $type): string
    {
        if (! in_array($type, ['email', 'phone'], true)) {
            throw new RuntimeException('Invalid reset type');
        }

        $code = $this->generateCode();

        DB::table('password_reset_tokens')->updateOrInsert(
            [
                'identifier' => $identifier,
                'type' => $type,
            ],
            [
                'token' => Hash::make($code),
                'attempts' => 0,
                'last_sent_at' => now(),
                'created_at' => now(),
            ]
        );

        return $code;
    }


    public function validate(string $identifier, string $type, string $plainCode): array
    {
        $record = DB::table('password_reset_tokens')
            ->where('identifier', $identifier)
            ->where('type', $type)
            ->first();

        if (! $record) {
            return ['valid' => false, 'reason' => 'not_found'];
        }

        if ($record->attempts >= self::MAX_ATTEMPTS) {
            return ['valid' => false, 'reason' => 'too_many_attempts'];
        }

        if (
            Carbon::parse($record->created_at)
                ->addMinutes(self::EXPIRY_MINUTES)
                ->isPast()
        ) {
            $this->delete($identifier, $type);
            return ['valid' => false, 'reason' => 'expired'];
        }

        if (! Hash::check($plainCode, $record->token)) {
            DB::table('password_reset_tokens')
                ->where('identifier', $identifier)
                ->where('type', $type)
                ->increment('attempts');

            return ['valid' => false, 'reason' => 'invalid'];
        }

        return ['valid' => true];
    }


    public function canResend(string $identifier, string $type): bool
    {
        $record = DB::table('password_reset_tokens')
            ->where('identifier', $identifier)
            ->where('type', $type)
            ->first();

        if (! $record || ! $record->last_sent_at) {
            return true;
        }

        return Carbon::parse($record->last_sent_at)
            ->addSeconds(self::RESEND_TIMEOUT_SECONDS)
            ->isPast();
    }


    public function delete(string $identifier, string $type): void
    {
        DB::table('password_reset_tokens')
            ->where('identifier', $identifier)
            ->where('type', $type)
            ->delete();
    }


    private function generateCode(): string
    {
        return (string) random_int(1000, 9999);
    }
}
