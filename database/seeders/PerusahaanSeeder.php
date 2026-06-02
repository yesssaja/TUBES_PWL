<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class PerusahaanSeeder extends BaseSeeder
{
    public function run(): void
    {
       $hrdId1 = DB::table('users')->where('email', 'hrd@techmuda.com')->value('id') ?? 2;
    $hrdId2 = DB::table('users')->where('email', 'hrd@digitalnusantara.com')->value('id') ?? 6;

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@techmuda.com'], [
            'user_id' => $hrdId1,
            'nama_perusahaan' => 'PT Tech Muda Indonesia',
            'email' => 'hrd@techmuda.com',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'website' => 'https://techmuda.test',
            'deskripsi' => 'Perusahaan teknologi yang bergerak di bidang pengembangan aplikasi web dan mobile.',
            'logo' => 'foto_perusahaan/logo-Maxipro-1024x1024.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('profile_perusahaan', ['email' => 'hrd@digitalnusantara.com'], [
            'user_id' => $hrdId2,
            'nama_perusahaan' => 'CV Digital Nusantara',
            'email' => 'hrd@digitalnusantara.com',
            'no_hp' => '082112223333',
            'alamat' => 'Jl. Asia Afrika No. 20, Bandung',
            'website' => 'https://digitalnusantara.test',
            'deskripsi' => 'Perusahaan kreatif digital yang fokus pada desain, branding, dan pemasaran online.',
            'logo' => 'foto_perusahaan/perusahaan_2.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}