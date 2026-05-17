<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class RsvpSeeder extends BaseSeeder
{
    public function run(): void
    {
        $budiId = DB::table('users')
            ->where('email', 'pelamar@example.com')
            ->value('id');

        $sitiId = DB::table('users')
            ->where('email', 'siti@example.com')
            ->value('id');

        if (!$budiId) {
            $budiId = DB::table('users')->value('id');
        }

        if (!$sitiId) {
            $sitiId = $budiId;
        }

        $eventJobFairId = DB::table('events')
            ->where('nama_event', 'Job Fair Tech Career 2026')
            ->value('id');

        $eventWorkshopId = DB::table('events')
            ->where('nama_event', 'Workshop Membuat CV Profesional')
            ->value('id');

        if (!$eventJobFairId) {
            $eventJobFairId = DB::table('events')->value('id');
        }

        if (!$eventWorkshopId) {
            $eventWorkshopId = $eventJobFairId;
        }

        $this->upsertAndGetId('rsvps', [
            'user_id' => $budiId,
            'event_id' => $eventJobFairId,
        ], [
            'user_id' => $budiId,
            'event_id' => $eventJobFairId,

            'name' => 'Budi Santoso',
            'nama' => 'Budi Santoso',

            'email' => 'pelamar@example.com',
            'hp' => '081298765432',
            'no_hp' => '081298765432',
            'telepon' => '081298765432',

            'jumlah_peserta' => 1,

            'status' => $this->enumValue('rsvps', 'status', [
                'pending',
                'hadir',
                'terdaftar',
                'aktif',
            ]),

            'status_rsvp' => $this->enumValue('rsvps', 'status_rsvp', [
                'pending',
                'hadir',
                'terdaftar',
                'aktif',
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('rsvps', [
            'user_id' => $sitiId,
            'event_id' => $eventWorkshopId,
        ], [
            'user_id' => $sitiId,
            'event_id' => $eventWorkshopId,

            'name' => 'Siti Aminah',
            'nama' => 'Siti Aminah',

            'email' => 'siti@example.com',
            'hp' => '081377788899',
            'no_hp' => '081377788899',
            'telepon' => '081377788899',

            'jumlah_peserta' => 1,

            'status' => $this->enumValue('rsvps', 'status', [
                'pending',
                'hadir',
                'terdaftar',
                'aktif',
            ]),

            'status_rsvp' => $this->enumValue('rsvps', 'status_rsvp', [
                'pending',
                'hadir',
                'terdaftar',
                'aktif',
            ]),

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}