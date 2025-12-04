<?php
namespace App\Actions\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginUserAction
{
    /**
     * @return array{user: User, token: string}
     * @throws InvalidCredentialsException
     */
    public function handle(array $credentials): array
    {
        if (!Auth::attempt($credentials)) {
            throw new InvalidCredentialsException();
        }

        /** @var User $user */
        $user = Auth::user();
        $token = $user->createToken('auth-token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}

