<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class PerusahaanSeeder extends BaseSeeder
{
    public function run(): void
    {
        $hrdId = DB::table('users')->where('email', 'hrd@techmuda.com')->value('id');

        $this->upsertAndGetId('perusahaans', ['email' => 'hrd@techmuda.com'], [
            'user_id' => $hrdId,
            'nama' => 'PT Tech Muda Indonesia',
            'nama_perusahaan' => 'PT Tech Muda Indonesia',
            'email' => 'hrd@techmuda.com',
            'telepon' => '081234567890',
            'hp' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'website' => 'https://techmuda.test',
            'deskripsi' => 'Perusahaan teknologi yang bergerak di bidang pengembangan aplikasi web dan mobile.',
            'logo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('perusahaans', ['email' => 'hrd@digitalnusantara.com'], [
            'user_id' => $hrdId,
            'nama' => 'CV Digital Nusantara',
            'nama_perusahaan' => 'CV Digital Nusantara',
            'email' => 'hrd@digitalnusantara.com',
            'telepon' => '082112223333',
            'hp' => '082112223333',
            'alamat' => 'Jl. Asia Afrika No. 20, Bandung',
            'website' => 'https://digitalnusantara.test',
            'deskripsi' => 'Perusahaan kreatif digital yang fokus pada desain, branding, dan pemasaran online.',
            'logo' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}