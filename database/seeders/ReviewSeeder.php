<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        if (!Schema::hasTable('reviews')) {
            return;
        }

        if (!Schema::hasTable('profile_perusahaan')) {
            return;
        }

        $perusahaans = DB::table('profile_perusahaan')->get();

        if ($perusahaans->isEmpty()) {
            return;
        }

        $userIds = DB::table('users')
            ->where('role', 'user')
            ->pluck('id')
            ->values()
            ->toArray();

        if (empty($userIds)) {
            $userIds = [null];
        }

        $reviewerPools = [
            [
                ['nama' => 'Yabesh Jaklin', 'posisi' => 'Frontend Developer'],
                ['nama' => 'Ryan Gosling', 'posisi' => 'UI/UX Designer'],
                ['nama' => 'Dian Indriani', 'posisi' => 'Backend Engineer'],
                ['nama' => 'Jelili', 'posisi' => 'Digital Marketing Specialist'],
                ['nama' => 'Naufal Cloud', 'posisi' => 'Human Resource Staff'],
            ],
            [
                ['nama' => 'Jeli Afonso', 'posisi' => 'Software Engineer'],
                ['nama' => 'Maya Salsabila', 'posisi' => 'Product Designer'],
                ['nama' => 'Naufal ', 'posisi' => 'Data Analyst'],
                ['nama' => 'Yabesh Jaklin', 'posisi' => 'Content Strategist'],
                ['nama' => 'Ryan Simatupang', 'posisi' => 'IT Support'],
            ],
            [
                ['nama' => 'Yabesh Jaklin', 'posisi' => 'Admin Staff'],
                ['nama' => 'Jeli Nutrijel', 'posisi' => 'Business Development'],
                ['nama' => 'Cloud Awan Naufal', 'posisi' => 'Customer Service'],
                ['nama' => 'Kevin Alexander', 'posisi' => 'Project Officer'],
                ['nama' => 'Laras Wulandari', 'posisi' => 'Finance Staff'],
            ],
        ];

        foreach ($perusahaans as $perusahaanIndex => $perusahaan) {
            $namaPerusahaan = $perusahaan->nama_perusahaan
                ?? $perusahaan->nama
                ?? $perusahaan->name
                ?? 'Perusahaan';

            $bidang = $perusahaan->bidang
                ?? $perusahaan->industri
                ?? $perusahaan->industry
                ?? 'perusahaan';

            $reviewers = $reviewerPools[$perusahaanIndex % count($reviewerPools)];
            $reviewTemplates = $this->makeCompanyReviews($namaPerusahaan, $bidang);

            foreach ($reviewTemplates as $reviewIndex => $template) {
                $reviewer = $reviewers[$reviewIndex % count($reviewers)];
                $userId = $userIds[$reviewIndex % count($userIds)];

                DB::table('reviews')->updateOrInsert(
                    [
                        'perusahaan_id' => $perusahaan->id,
                        'nama' => $reviewer['nama'],
                        'posisi' => $reviewer['posisi'],
                    ],
                   [
                        'perusahaan_id' => $perusahaan->id,
                        'pelamar_id' => $userId, 
                        'nama' => $reviewer['nama'],
                        'posisi' => $reviewer['posisi'],
                        'rating' => $template['rating'],
                        'ulasan' => $template['ulasan'],
                        'balasan_perusahaan' => $template['balasan_perusahaan'],
                        'created_at' => now()->subDays(($perusahaanIndex * 7) + $reviewIndex),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }

    private function makeCompanyReviews(string $namaPerusahaan, string $bidang): array
    {
        $namaPendek = Str::limit($namaPerusahaan, 35, '');

        return [
            [
                'rating' => 4,
                'ulasan' => "{$namaPendek} memiliki lingkungan kerja yang cukup nyaman. Timnya terbuka untuk diskusi, alur kerja jelas, dan cocok untuk mengembangkan kemampuan di bidang {$bidang}.",
                'balasan_perusahaan' => "Terima kasih atas ulasannya. {$namaPendek} akan terus berusaha menciptakan lingkungan kerja yang positif.",
            ],
            [
                'rating' => 5,
                'ulasan' => "Pengalaman bekerja di {$namaPendek} cukup baik. Koordinasi antar tim berjalan lancar, meskipun beberapa proses kerja masih bisa dibuat lebih efisien.",
                'balasan_perusahaan' => null,
            ],
            [
                'rating' => 5,
                'ulasan' => "{$namaPendek} memberikan kesempatan belajar yang besar. Untuk fresh graduate, perusahaan ini cukup membantu dalam memahami dunia kerja secara langsung.",
                'balasan_perusahaan' => "Kami senang pengalaman tersebut bermanfaat. Terima kasih sudah memberikan review untuk {$namaPendek}.",
            ],
        ];
    }
}