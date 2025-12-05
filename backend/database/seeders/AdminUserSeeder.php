<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['login' => 'admin01'],
            [
                'first_name' => 'Админ',
                'last_name' => 'Админович',
                'patronymic' => null,
                'phone' => '+70000000001',
                'email' => 'admin@mail.com',
                'password' => Hash::make('Admin123'),
                'is_admin' => true,
            ]
        );
    }
}
