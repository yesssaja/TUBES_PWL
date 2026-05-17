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

        $eventJobFairId = DB::table('events')
            ->where('nama_event', 'Job Fair Tech Career 2026')
            ->value('id');

        $eventWorkshopId = DB::table('events')
            ->where('nama_event', 'Workshop Membuat CV Profesional')
            ->value('id');

        if (!$budiId || !$eventJobFairId) {
            return;
        }

        $this->upsertAndGetId('rsvps', [
            'user_id' => $budiId,
            'event_id' => $eventJobFairId,
        ], [
            'user_id' => $budiId,
            'event_id' => $eventJobFairId,
            'name' => 'Budi Santoso',
            'email' => 'pelamar@example.com',
            'hp' => '081298765432',
            'status_kehadiran' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($sitiId && $eventWorkshopId) {
            $this->upsertAndGetId('rsvps', [
                'user_id' => $sitiId,
                'event_id' => $eventWorkshopId,
            ], [
                'user_id' => $sitiId,
                'event_id' => $eventWorkshopId,
                'name' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'hp' => '081377788899',
                'status_kehadiran' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}