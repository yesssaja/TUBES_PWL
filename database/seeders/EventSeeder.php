<?php

namespace Database\Seeders;

class EventSeeder extends BaseSeeder
{
    public function run(): void
    {
        $this->upsertAndGetId('events', ['judul' => 'Job Fair Tech Career 2026'], [
            'judul' => 'Job Fair Tech Career 2026',
            'nama_event' => 'Job Fair Tech Career 2026',
            'deskripsi' => 'Event job fair untuk mempertemukan perusahaan teknologi dengan para pencari kerja.',
            'lokasi' => 'Aula Kampus Utama',
            'tanggal' => now()->addDays(14)->format('Y-m-d'),
            'tanggal_event' => now()->addDays(14)->format('Y-m-d'),
            'waktu' => '09:00',
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '15:00',
            'kuota' => 100,
            'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('events', ['judul' => 'Workshop Membuat CV Profesional'], [
            'judul' => 'Workshop Membuat CV Profesional',
            'nama_event' => 'Workshop Membuat CV Profesional',
            'deskripsi' => 'Pelatihan membuat CV dan portofolio agar lebih siap melamar pekerjaan.',
            'lokasi' => 'Ruang Seminar Lt. 2',
            'tanggal' => now()->addDays(21)->format('Y-m-d'),
            'tanggal_event' => now()->addDays(21)->format('Y-m-d'),
            'waktu' => '13:00',
            'waktu_mulai' => '13:00',
            'waktu_selesai' => '16:00',
            'kuota' => 50,
            'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}