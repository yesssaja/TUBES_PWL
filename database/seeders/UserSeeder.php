<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@loker.com'],
            [
                'name' => 'Admin Loker',
                'email' => 'admin@loker.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'hrd@techmuda.com'],
            [
                'name' => 'HRD Tech Muda',
                'email' => 'hrd@techmuda.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'hrd@digitalnusantara.com'],
            [
                'name' => 'HRD Digital Nusantara',
                'email' => 'hrd@digitalnusantara.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'admin', 
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        DB::table('users')->updateOrInsert(
            ['email' => 'pelamar@example.com'],
            [
                'name' => 'Budi Santoso',
                'email' => 'pelamar@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $tambahanHRD = [
            ['email' => 'hrd@tokopedia.com', 'name' => 'HRD Tokopedia'],
            ['email' => 'hrd@lazada.com', 'name' => 'HRD Lazada'],
            ['email' => 'hrd@blibli.com', 'name' => 'HRD Blibli'],
            ['email' => 'hrd@shopee.com', 'name' => 'HRD Shopee'],
        ];

        foreach ($tambahanHRD as $hrd) {
            DB::table('users')->updateOrInsert(
                ['email' => $hrd['email']],
                [
                    'name' => $hrd['name'],
                    'email' => $hrd['email'],
                    'email_verified_at' => now(),
                    'password' => Hash::make('password'),
                    'role' => 'admin', 
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}