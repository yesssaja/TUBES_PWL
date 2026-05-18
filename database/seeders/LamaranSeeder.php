<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

class LamaranSeeder extends BaseSeeder
{
    public function run(): void
    {
        $budiId = DB::table('users')
            ->where('email', 'pelamar@example.com')
            ->value('id');

        $sitiId = DB::table('users')
            ->where('email', 'siti@example.com')
            ->value('id');

        $frontendId = DB::table('lokers')
            ->where('judul_loker', 'Frontend Developer')
            ->value('id');

        $backendId = DB::table('lokers')
            ->where('judul_loker', 'Backend Developer')
            ->value('id');

        $uiuxId = DB::table('lokers')
            ->where('judul_loker', 'UI/UX Designer')
            ->value('id');

        if (!$frontendId) {
            $frontendId = DB::table('lokers')->value('id');
        }

        if (!$backendId) {
            $backendId = $frontendId;
        }

        if (!$uiuxId) {
            $uiuxId = $frontendId;
        }

        $this->upsertAndGetId('lamarans', [
            'user_id' => $budiId,
            'loker_id' => $frontendId,
        ], [
            'user_id' => $budiId,
            'loker_id' => $frontendId,
            'nama' => 'Budi Santoso',
            'email' => 'pelamar@example.com',
            'hp' => '081298765432',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2001-05-15',
            'gender' => $this->enumValue('lamarans', 'gender', [
                'Laki-laki',
                'laki-laki',
                'male',
            ]),
            'cv' => 'cv/budi-santoso.pdf',
            'foto' => 'foto/budi-santoso.jpg',
            'portfolio' => 'https://portfolio-budi.test',
            'motivasi' => 'Saya tertarik bergabung karena ingin mengembangkan kemampuan di bidang frontend development.',
            'status_lamaran' => $this->enumValue('lamarans', 'status_lamaran', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'status' => $this->enumValue('lamarans', 'status', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('lamarans', [
            'user_id' => $budiId,
            'loker_id' => $backendId,
        ], [
            'user_id' => $budiId,
            'loker_id' => $backendId,
            'nama' => 'Budi Santoso',
            'email' => 'pelamar@example.com',
            'hp' => '081298765432',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2001-05-15',
            'gender' => $this->enumValue('lamarans', 'gender', [
                'Laki-laki',
                'laki-laki',
                'male',
            ]),
            'cv' => 'cv/budi-santoso.pdf',
            'foto' => 'foto/budi-santoso.jpg',
            'portfolio' => 'https://portfolio-budi.test',
            'motivasi' => 'Saya ingin mengembangkan karier sebagai backend developer dan memperdalam Laravel.',
            'status_lamaran' => $this->enumValue('lamarans', 'status_lamaran', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'status' => $this->enumValue('lamarans', 'status', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->upsertAndGetId('lamarans', [
            'user_id' => $sitiId,
            'loker_id' => $uiuxId,
        ], [
            'user_id' => $sitiId,
            'loker_id' => $uiuxId,
            'nama' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'hp' => '081377788899',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2002-08-20',
            'gender' => $this->enumValue('lamarans', 'gender', [
                'Perempuan',
                'perempuan',
                'female',
            ]),
            'cv' => 'cv/siti-aminah.pdf',
            'foto' => 'foto/siti-aminah.jpg',
            'portfolio' => 'https://portfolio-siti.test',
            'motivasi' => 'Saya tertarik pada posisi UI/UX Designer karena memiliki pengalaman membuat wireframe dan prototype.',
            'status_lamaran' => $this->enumValue('lamarans', 'status_lamaran', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'status' => $this->enumValue('lamarans', 'status', [
                'pending',
                'diproses',
                'diterima',
                'ditolak',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}