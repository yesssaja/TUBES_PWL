<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class EventSeeder extends BaseSeeder
{
    public function run(): void
    {
        DB::table('events')->whereIn('nama_event', [
            'Tech Career Day 2026',
            'Digital Marketing Bootcamp',
            'Tokopedia DevCamp 2026',
            'Tokopedia Backend Engineering Workshop',
            'Tokopedia Product Manager Talk',
            'Lazada E-Commerce Career Talk',
            'Blibli Code Blitz Webinar',
            'Shopee Marketplace Webinar',
        ])->delete();

        $techMudaId = DB::table('profile_perusahaan')
            ->where('email', 'hrd@techmuda.com')
            ->value('id');

        $digitalNusantaraId = DB::table('profile_perusahaan')
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

        if ($techMudaId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Tech Career Day 2026'], [
                'perusahaan_id' => $techMudaId,
                'nama_event' => 'Tech Career Day 2026',
                'deskripsi' => 'Event karier teknologi yang membahas peluang kerja di bidang web development, software engineering, dan IT support.',
                'lokasi' => 'Aula Kampus Utama',
                'tanggal' => now()->addDays(14)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(14)->format('Y-m-d'),
                'jam' => '09:00',
                'waktu_mulai' => '09:00',
                'waktu_selesai' => '15:00',
                'kuota' => 100,
                'poster' => 'images/tech_career_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($digitalNusantaraId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Digital Marketing Bootcamp'], [
                'perusahaan_id' => $digitalNusantaraId,
                'nama_event' => 'Digital Marketing Bootcamp',
                'deskripsi' => 'Bootcamp singkat tentang strategi digital marketing, pengelolaan konten, branding, dan analisis media sosial.',
                'lokasi' => 'Ruang Seminar Lt. 2',
                'tanggal' => now()->addDays(18)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(18)->format('Y-m-d'),
                'jam' => '13:00',
                'waktu_mulai' => '13:00',
                'waktu_selesai' => '16:00',
                'kuota' => 60,
                'poster' => 'images/digital_marketing_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($tokopediaId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Tokopedia DevCamp 2026'], [
                'perusahaan_id' => $tokopediaId,
                'nama_event' => 'Tokopedia DevCamp 2026',
                'deskripsi' => 'Pelatihan intensif bagi mahasiswa IT untuk belajar web development, backend engineering, dan pengembangan produk digital.',
                'lokasi' => 'Tokopedia Tower Lt. 52',
                'tanggal' => now()->addDays(10)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(10)->format('Y-m-d'),
                'jam' => '08:00',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '17:00',
                'poster' => 'images/tokopedia_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 40,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->upsertAndGetId('events', ['nama_event' => 'Tokopedia Backend Engineering Workshop'], [
                'perusahaan_id' => $tokopediaId,
                'nama_event' => 'Tokopedia Backend Engineering Workshop',
                'deskripsi' => 'Workshop untuk mempelajari dasar REST API, pengelolaan database, optimasi query, dan konsep backend system yang scalable.',
                'lokasi' => 'Tokopedia Tower Lt. 45',
                'tanggal' => now()->addDays(15)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(15)->format('Y-m-d'),
                'jam' => '09:00',
                'waktu_mulai' => '09:00',
                'waktu_selesai' => '16:00',
                'poster' => 'images/tokopedia_backend.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 60,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->upsertAndGetId('events', ['nama_event' => 'Tokopedia Product Manager Talk'], [
                'perusahaan_id' => $tokopediaId,
                'nama_event' => 'Tokopedia Product Manager Talk',
                'deskripsi' => 'Sharing session mengenai product management, UX thinking, analisis kebutuhan pengguna, dan proses pengembangan fitur digital.',
                'lokasi' => 'Zoom Meeting',
                'tanggal' => now()->addDays(20)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(20)->format('Y-m-d'),
                'jam' => '19:00',
                'waktu_mulai' => '19:00',
                'waktu_selesai' => '21:00',
                'poster' => 'images/tokopedia_pm.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 200,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($lazadaId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Lazada E-Commerce Career Talk'], [
                'perusahaan_id' => $lazadaId,
                'nama_event' => 'Lazada E-Commerce Career Talk',
                'deskripsi' => 'Seminar karier tentang peluang kerja di industri e-commerce, customer service, operasional marketplace, dan bisnis digital.',
                'lokasi' => 'Zoom Meeting',
                'tanggal' => now()->addDays(21)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(21)->format('Y-m-d'),
                'jam' => '19:00',
                'waktu_mulai' => '19:00',
                'waktu_selesai' => '21:00',
                'poster' => 'images/lazada_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 250,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($blibliId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Blibli Code Blitz Webinar'], [
                'perusahaan_id' => $blibliId,
                'nama_event' => 'Blibli Code Blitz Webinar',
                'deskripsi' => 'Sharing session mengenai arsitektur sistem e-commerce, data analysis, dan teknologi dalam menangani transaksi digital.',
                'lokasi' => 'Zoom Meeting',
                'tanggal' => now()->addDays(24)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(24)->format('Y-m-d'),
                'jam' => '19:00',
                'waktu_mulai' => '19:00',
                'waktu_selesai' => '21:00',
                'poster' => 'images/blibli_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 300,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($shopeeId) {
            $this->upsertAndGetId('events', ['nama_event' => 'Shopee Marketplace Webinar'], [
                'perusahaan_id' => $shopeeId,
                'nama_event' => 'Shopee Marketplace Webinar',
                'deskripsi' => 'Webinar mengenai pengelolaan marketplace, strategi penjualan online, optimasi produk, dan peluang karier di Shopee.',
                'lokasi' => 'Zoom Meeting',
                'tanggal' => now()->addDays(28)->format('Y-m-d'),
                'tanggal_event' => now()->addDays(28)->format('Y-m-d'),
                'jam' => '19:00',
                'waktu_mulai' => '19:00',
                'waktu_selesai' => '21:00',
                'poster' => 'images/shopee_event.jpg',
                'link_wa_group' => 'https://chat.whatsapp.com/BCPRan2Dx0V5Xi81auKc7K',
                'kuota' => 300,
                'status' => $this->enumValue('events', 'status', ['aktif', 'active', 'dibuka', 'open']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}