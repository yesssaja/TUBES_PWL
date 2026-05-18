<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class LokerSeeder extends BaseSeeder
{
    public function run(): void
    {
        $techMudaId = DB::table('perusahaans')
            ->where('email', 'hrd@techmuda.com')
            ->value('id');

        $digitalId = DB::table('perusahaans')
            ->where('email', 'hrd@digitalnusantara.com')
            ->value('id');

        if (!$techMudaId) {
            $techMudaId = DB::table('perusahaans')->value('id');
        }

        if (!$digitalId) {
            $digitalId = $techMudaId;
        }

        $this->upsertAndGetId('lokers', ['judul_loker' => 'Frontend Developer'], [
            'perusahaan_id' => $techMudaId,
            'judul_loker' => 'Frontend Developer',
            'lokasi' => 'Jakarta',
            'tipe_pekerjaan' => 'Full Time',
            'gaji' => 'Rp 5.000.000 - Rp 8.000.000',
            'deskripsi' => 'Membangun tampilan website yang responsif, modern, dan user friendly.',
            'batas_lamaran' => now()->addDays(30)->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('lokers', ['judul_loker' => 'Backend Developer'], [
            'perusahaan_id' => $techMudaId,
            'judul_loker' => 'Backend Developer',
            'lokasi' => 'Bandung',
            'tipe_pekerjaan' => 'Full Time',
            'gaji' => 'Rp 6.000.000 - Rp 10.000.000',
            'deskripsi' => 'Mengembangkan API, database, dan sistem backend aplikasi menggunakan Laravel dan MySQL.',
            'batas_lamaran' => now()->addDays(45)->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('lokers', ['judul_loker' => 'UI/UX Designer'], [
            'perusahaan_id' => $digitalId,
            'judul_loker' => 'UI/UX Designer',
            'lokasi' => 'Remote',
            'tipe_pekerjaan' => 'Contract',
            'gaji' => 'Rp 4.000.000 - Rp 7.000.000',
            'deskripsi' => 'Membuat desain antarmuka aplikasi dan website yang menarik serta mudah digunakan.',
            'batas_lamaran' => now()->addDays(25)->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}