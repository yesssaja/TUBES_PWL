<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;

class AdminSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->upsertAndGetId('users', ['email' => 'admin@loker.com'], [
            'name' => 'Admin Loker',
            'email' => 'admin@loker.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => $this->enumValue('users', 'role', ['admin']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('users', ['email' => 'hrd@techmuda.com'], [
            'name' => 'HRD Tech Muda',
            'email' => 'hrd@techmuda.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => $this->enumValue('users', 'role', ['admin']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('users', ['email' => 'pelamar@example.com'], [
            'name' => 'Budi Santoso',
            'email' => 'pelamar@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => $this->enumValue('users', 'role', ['user']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('users', ['email' => 'siti@example.com'], [
            'name' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => $this->enumValue('users', 'role', ['user']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}