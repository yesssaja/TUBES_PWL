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

        if (!Schema::hasTable('perusahaans')) {
            return;
        }

        $perusahaans = DB::table('perusahaans')->get();

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
                ['nama' => 'Budi Santoso', 'posisi' => 'Frontend Developer'],
                ['nama' => 'Siti Aminah', 'posisi' => 'UI/UX Designer'],
                ['nama' => 'Dian Indriani', 'posisi' => 'Backend Engineer'],
                ['nama' => 'Rizky Pratama', 'posisi' => 'Digital Marketing Specialist'],
                ['nama' => 'Nadia Putri', 'posisi' => 'Human Resource Staff'],
            ],
            [
                ['nama' => 'Andi Wijaya', 'posisi' => 'Software Engineer'],
                ['nama' => 'Maya Salsabila', 'posisi' => 'Product Designer'],
                ['nama' => 'Fahri Ramadhan', 'posisi' => 'Data Analyst'],
                ['nama' => 'Putri Amelia', 'posisi' => 'Content Strategist'],
                ['nama' => 'Ilham Maulana', 'posisi' => 'IT Support'],
            ],
            [
                ['nama' => 'Rani Maharani', 'posisi' => 'Admin Staff'],
                ['nama' => 'Yoga Saputra', 'posisi' => 'Business Development'],
                ['nama' => 'Aulia Rahma', 'posisi' => 'Customer Service'],
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
                        'user_id' => $userId,
                        'nama' => $reviewer['nama'],
                        'posisi' => $reviewer['posisi'],
                        'rating' => $template['rating'],
                        'rating_gaji' => $template['rating_gaji'],
                        'rating_kultur' => $template['rating_kultur'],
                        'rating_fasilitas' => $template['rating_fasilitas'],
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
                'rating' => 4.8,
                'rating_gaji' => 4.6,
                'rating_kultur' => 4.9,
                'rating_fasilitas' => 4.7,
                'ulasan' => "{$namaPendek} memiliki lingkungan kerja yang cukup nyaman. Timnya terbuka untuk diskusi, alur kerja jelas, dan cocok untuk mengembangkan kemampuan di bidang {$bidang}.",
                'balasan_perusahaan' => "Terima kasih atas ulasannya. {$namaPendek} akan terus berusaha menciptakan lingkungan kerja yang positif.",
            ],
            [
                'rating' => 4.4,
                'rating_gaji' => 4.2,
                'rating_kultur' => 4.5,
                'rating_fasilitas' => 4.3,
                'ulasan' => "Pengalaman bekerja di {$namaPendek} cukup baik. Koordinasi antar tim berjalan lancar, meskipun beberapa proses kerja masih bisa dibuat lebih efisien.",
                'balasan_perusahaan' => null,
            ],
            [
                'rating' => 4.7,
                'rating_gaji' => 4.4,
                'rating_kultur' => 4.8,
                'rating_fasilitas' => 4.6,
                'ulasan' => "{$namaPendek} memberikan kesempatan belajar yang besar. Untuk fresh graduate, perusahaan ini cukup membantu dalam memahami dunia kerja secara langsung.",
                'balasan_perusahaan' => "Kami senang pengalaman tersebut bermanfaat. Terima kasih sudah memberikan review untuk {$namaPendek}.",
            ],
            [
                'rating' => 4.2,
                'rating_gaji' => 4.0,
                'rating_kultur' => 4.3,
                'rating_fasilitas' => 4.1,
                'ulasan' => "Pekerjaan di {$namaPendek} cukup menantang. Target kerja jelas, tetapi ritme kerja kadang padat terutama ketika mendekati deadline project.",
                'balasan_perusahaan' => null,
            ],
            [
                'rating' => 4.9,
                'rating_gaji' => 4.7,
                'rating_kultur' => 5.0,
                'rating_fasilitas' => 4.8,
                'ulasan' => "Saya merasa budaya kerja di {$namaPendek} cukup suportif. Rekan kerja mudah diajak kerja sama dan manajemen cukup terbuka terhadap masukan karyawan.",
                'balasan_perusahaan' => "Terima kasih atas apresiasinya. Masukan seperti ini sangat berarti untuk perkembangan {$namaPendek}.",
            ],
        ];
    }
}