<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::forceCreate([
            'role' => RoleEnum::ADMIN,
            'firstname' => 'Admin',
            'lastname' => 'John',
            'email' => 'adminjohn@gmail.com',
            'email_verified_at' => now(),
            'password' => 'hmvgxqY4=W?n<H2s}z#y~R',
        ]);
    }
}
