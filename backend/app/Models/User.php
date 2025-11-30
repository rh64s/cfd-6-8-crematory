<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'patronymic',
        'login',
        'phone',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function ($user) {
            if (! empty($user->password) && ! str_starts_with($user->password, '$2y$')) {
                $user->password = Hash::make($user->password);
            }
        });

        static::updating(function ($user) {
            if ($user->isDirty('password') && ! str_starts_with($user->password, '$2y$')) {
                $user->password = Hash::make($user->password);
            }
        });
    }

    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }

    public function anonymize(): self
    {
        $this->update([
            'first_name' => 'Удалённый',
            'last_name' => 'Пользователь',
            'patronymic' => null,
            'login' => 'deleted_' . $this->id,
            'email' => null,
            'phone' => '+7000000000' . str_pad($this->id, 10, '0', STR_PAD_LEFT),
            'password' => Hash::make(Str::random(60)),
        ]);

        return $this;
    }
    public function getAuthIdentifierName()
    {
        return 'login';
    }
}
