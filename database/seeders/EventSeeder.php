<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

class EventSeeder extends BaseSeeder
{
    public function run(): void
    {
        $perusahaanId1 = DB::table('profile_perusahaan')->where('email', 'hrd@techmuda.com')->value('id');
        $perusahaanId2 = DB::table('profile_perusahaan')->where('email', 'hrd@digitalnusantara.com')->value('id');
        $tokopediaId = DB::table('profile_perusahaan')->where('email', 'hrd@tokopedia.com')->value('id');
        $blibliId = DB::table('profile_perusahaan')->where('email', 'hrd@blibli.com')->value('id');

        $this->upsertAndGetId('events', ['judul' => 'Job Fair Tech Career 2026'], [
            'perusahaan_id' => $perusahaanId1,    
            'judul' => 'Job Fair Tech Career 2026',
            'nama_event' => 'Job Fair Tech Career 2026',
            'deskripsi' => 'Event job fair untuk mempertemukan perusahaan teknologi dengan para pencari kerja.',
            'lokasi' => 'Aula Kampus Utama',
            'tanggal' => now()->addDays(14)->format('Y-m-d'),
            'tanggal_event' => now()->addDays(14)->format('Y-m-d'),
            'jam' => '09:00',
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '15:00',
            'kuota' => 100,
            'poster' => 'images/jobfair_event.jpg', 
            'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K', 
            'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('events', ['judul' => 'Workshop Membuat CV Profesional'], [
            'perusahaan_id' => $perusahaanId2,
            'judul' => 'Workshop Membuat CV Profesional',
            'nama_event' => 'Workshop Membuat CV Profesional',
            'deskripsi' => 'Pelatihan membuat CV dan portofolio agar lebih siap melamar pekerjaan.',
            'lokasi' => 'Ruang Seminar Lt. 2',
            'tanggal' => now()->addDays(21)->format('Y-m-d'),
            'tanggal_event' => now()->addDays(21)->format('Y-m-d'),
            'jam' => '13:00',
            'waktu_mulai' => '13:00',
            'waktu_selesai' => '16:00',
            'kuota' => 50,
            'poster' => 'images/event_cv.jpg', 
            'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K', 
            'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($tokopediaId) {
            $this->upsertAndGetId('events', ['judul' => 'Tokopedia DevCamp 2026'], [
                'perusahaan_id' => $tokopediaId,
                'judul' => 'Tokopedia DevCamp 2026',
                'nama_event' => 'Tokopedia DevCamp 2026',
                'deskripsi' => 'Pelatihan intensif selama 3 hari bagi mahasiswa IT tingkat akhir untuk belajar langsung dari engineer Tokopedia.',
                'lokasi' => 'Tokopedia Tower Lt. 52',
                'tanggal' => now()->addDays(10)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(10)->format('Y-m-d'),
                'jam' => '08:00', 'waktu_mulai' => '08:00', 'waktu_selesai' => '17:00',
                'poster' => 'images/Tokopedia_event.jpg', 
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K', 
                'kuota' => 40,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        if ($blibliId) {
            $this->upsertAndGetId('events', ['judul' => 'Blibli Code Blitz Webinar'], [
                'perusahaan_id' => $blibliId,
                'judul' => 'Blibli Code Blitz Webinar',
                'nama_event' => 'Blibli Code Blitz Webinar',
                'deskripsi' => 'Sharing session mengenai rahasia arsitektur sistem e-commerce dalam menangani jutaan transaksi flash sale.',
                'lokasi' => 'Zoom Meeting',
                'tanggal' => now()->addDays(18)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(18)->format('Y-m-d'),
                'jam' => '19:00', 'waktu_mulai' => '19:00', 'waktu_selesai' => '21:00',
                'poster' => 'images/blibli_event.jpg', 
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K', 
                'kuota' => 300,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}