<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class LokerSeeder extends BaseSeeder
{
    public function run(): void
    {
        $techMudaId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@techmuda.com')
            ->value('id');

        $digitalId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@digitalnusantara.com')
            ->value('id');

        $tokopediaId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@tokopedia.com')
            ->value('id');
        $lazadaId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@lazada.com')
            ->value('id');
        $blibliId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@blibli.com')
            ->value('id');
        $shopeeId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@shopee.com')
            ->value('id');

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
        if ($tokopediaId) {
            $this->upsertAndGetId('lokers', ['judul_loker' => 'Software Engineer Lead (Laravel)'], [
                'perusahaan_id' => $tokopediaId,
                'judul_loker' => 'Software Engineer Lead (Laravel)',
                'lokasi' => 'Jakarta Selatan',
                'tipe_pekerjaan' => 'Full Time',
                'gaji' => 'Rp 12.000.000 - Rp 18.000.000',
                'deskripsi' => 'Memimpin pengembangan fitur core e-commerce menggunakan framework Laravel tingkat lanjut.',
                'batas_lamaran' => now()->addDays(30)->format('Y-m-d'),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        if ($lazadaId) {
            $this->upsertAndGetId('lokers', ['judul_loker' => 'Data Analyst'], [
                'perusahaan_id' => $lazadaId,
                'judul_loker' => 'Data Analyst',
                'lokasi' => 'Jakarta Pusat',
                'tipe_pekerjaan' => 'Full Time',
                'gaji' => 'Rp 8.000.000 - Rp 12.000.000',
                'deskripsi' => 'Menganalisis data transaksi harian dan membuat visualisasi dashboard performa penjualan.',
                'batas_lamaran' => now()->addDays(20)->format('Y-m-d'),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        if ($blibliId) {
            $this->upsertAndGetId('lokers', ['judul_loker' => 'Quality Assurance (QA) Engineer'], [
                'perusahaan_id' => $blibliId,
                'judul_loker' => 'Quality Assurance (QA) Engineer',
                'lokasi' => 'Jakarta Barat',
                'tipe_pekerjaan' => 'Contract',
                'gaji' => 'Rp 7.000.000 - Rp 10.000.000',
                'deskripsi' => 'Melakukan pengujian automation testing dan manual testing pada platform web app.',
                'batas_lamaran' => now()->addDays(15)->format('Y-m-d'),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        if ($shopeeId) {
            $this->upsertAndGetId('lokers', ['judul_loker' => 'Mobile Developer (Flutter)'], [
                'perusahaan_id' => $shopeeId,
                'judul_loker' => 'Mobile Developer (Flutter)',
                'lokasi' => 'Remote / Hybrid',
                'tipe_pekerjaan' => 'Full Time',
                'gaji' => 'Rp 10.000.000 - Rp 15.000.000',
                'deskripsi' => 'Mengembangkan arsitektur aplikasi mobile yang scalable dan berkinerja tinggi memakai Flutter.',
                'batas_lamaran' => now()->addDays(40)->format('Y-m-d'),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}