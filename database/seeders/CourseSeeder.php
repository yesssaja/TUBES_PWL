<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseLink;
use App\Models\ProfilePerusahaan;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'perusahaan_id' => 1, // PT Tech Muda Indonesia
                'title' => 'Course Web Development',
                'description' => 'Kursus ini membahas dasar HTML, CSS, JavaScript, hingga pembuatan tampilan website yang responsif dan rapi.',
                'benefit' => 'Peserta dapat memahami dasar pembuatan website dan mulai membangun portofolio digital.',
                'price' => 100000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Dasar HTML dan CSS untuk Pemula',
                'link_url' => 'https://www.youtube.com/watch?v=71a2zeC71gk',
            ],
            [
                'perusahaan_id' => 1, // PT Tech Muda Indonesia
                'title' => 'Course Dasar Pemrograman',
                'description' => 'Kursus ini mengenalkan logika dasar pemrograman, variabel, percabangan, perulangan, dan fungsi.',
                'benefit' => 'Cocok untuk pemula yang ingin memulai karier di bidang teknologi.',
                'price' => 80000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Belajar Dasar Pemrograman',
                'link_url' => 'https://www.youtube.com/watch?v=upDLs1sn7g4',
            ],
            [
                'perusahaan_id' => 2, // CV Digital Nusantara
                'title' => 'Course Social Media Marketing',
                'description' => 'Kursus ini membahas strategi konten, riset audiens, penggunaan media sosial, dan analisis performa konten.',
                'benefit' => 'Peserta dapat memahami cara membangun promosi digital yang efektif.',
                'price' => 80000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Belajar Digital Marketing dari 0',
                'link_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI',
            ],
            [
                'perusahaan_id' => 2, // CV Digital Nusantara
                'title' => 'Course Desain Grafis',
                'description' => 'Kursus ini mengajarkan teori warna, tipografi, layout, dan dasar penggunaan tools desain.',
                'benefit' => 'Membantu peserta membuat desain visual yang menarik untuk kebutuhan kerja dan bisnis.',
                'price' => 85000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Rahasia Desain Grafis Efektif',
                'link_url' => 'https://www.youtube.com/watch?v=Nfd4UGgmdhI',
            ],
            [
                'perusahaan_id' => 3, // PT Tokopedia
                'title' => 'Membuat CV dan Surat Lamaran Kerja',
                'description' => 'Kursus ini mengajarkan cara membuat CV ATS friendly dan surat lamaran kerja yang rapi, jelas, dan profesional.',
                'benefit' => 'CV menjadi lebih menarik dan peluang dipanggil interview menjadi lebih besar.',
                'price' => 50000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Panduan Lengkap Membuat CV ATS Friendly 2026',
                'link_url' => 'https://www.youtube.com/watch?v=JpPoxKdJoeo',
            ],
            [
                'perusahaan_id' => 3, // PT Tokopedia
                'title' => 'Course Microsoft Excel',
                'description' => 'Kursus ini membahas penggunaan Microsoft Excel mulai dari dasar, rumus penting, VLOOKUP, hingga Pivot Table.',
                'benefit' => 'Keahlian Excel membantu peserta dalam pengolahan data dan administrasi kerja.',
                'price' => 75000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Panduan Dasar Microsoft Excel',
                'link_url' => 'https://www.youtube.com/watch?v=6WgvzCU3TI8',
            ],
            [
                'perusahaan_id' => 4, // PT Lazada Indonesia
                'title' => 'Course Customer Service Profesional',
                'description' => 'Kursus ini membahas cara melayani pelanggan, menangani komplain, dan menjaga komunikasi profesional.',
                'benefit' => 'Peserta lebih siap bekerja di bidang pelayanan pelanggan dan operasional e-commerce.',
                'price' => 65000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Skill Customer Service Profesional',
                'link_url' => 'https://www.youtube.com/watch?v=8FqZZrbnwkM',
            ],
            [
                'perusahaan_id' => 4, // PT Lazada Indonesia
                'title' => 'Course Bahasa Inggris untuk Interview',
                'description' => 'Kursus ini mengajarkan frasa dan simulasi wawancara kerja dalam bahasa Inggris.',
                'benefit' => 'Membantu peserta lebih percaya diri melamar ke perusahaan multinasional.',
                'price' => 70000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Tips Sukses Wawancara Kerja Bahasa Inggris',
                'link_url' => 'https://www.youtube.com/watch?v=upNBA-C1L9Q',
            ],
            [
                'perusahaan_id' => 5, // PT Global Digital Niaga / Blibli
                'title' => 'Course Data Analysis Dasar',
                'description' => 'Kursus ini mengenalkan dasar analisis data, membaca data, membuat laporan, dan memahami insight sederhana.',
                'benefit' => 'Peserta dapat memahami dasar pengolahan data untuk kebutuhan bisnis digital.',
                'price' => 90000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Belajar Data Analysis untuk Pemula',
                'link_url' => 'https://www.youtube.com/watch?v=r-uOLxNrNk8',
            ],
            [
                'perusahaan_id' => 5, // PT Global Digital Niaga / Blibli
                'title' => 'Course Fotografi Produk',
                'description' => 'Kursus ini membahas teknik fotografi produk, pencahayaan, angle, dan editing dasar.',
                'benefit' => 'Cocok untuk kebutuhan konten bisnis online dan marketplace.',
                'price' => 75000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Tips Fotografi Produk',
                'link_url' => 'https://www.youtube.com/watch?v=kA1jXBZCHNI',
            ],
            [
                'perusahaan_id' => 6, // PT Shopee International Indonesia
                'title' => 'Course Tips & Tricks Lulus Wawancara',
                'description' => 'Kursus ini mengajarkan cara menjawab pertanyaan interview dengan metode STAR dan latihan menjawab pertanyaan umum.',
                'benefit' => 'Peserta menjadi lebih siap dan percaya diri menghadapi wawancara kerja.',
                'price' => 60000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Trik Ampuh Menjawab Pertanyaan Interview',
                'link_url' => 'https://www.youtube.com/watch?v=9WsRvH1BSJQ',
            ],
            [
                'perusahaan_id' => 6, // PT Shopee International Indonesia
                'title' => 'Course Marketplace Management',
                'description' => 'Kursus ini membahas cara mengelola toko online, optimasi produk, promosi, dan pelayanan pembeli.',
                'benefit' => 'Peserta memahami dasar pengelolaan marketplace untuk bisnis online.',
                'price' => 85000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke Bank atau E-Wallet 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran.',
                'link_title' => 'Cara Mengelola Toko Online',
                'link_url' => 'https://www.youtube.com/watch?v=Qvhk_gsGxEQ',
            ],
        ];

        foreach ($courses as $item) {
            $profile = ProfilePerusahaan::find($item['perusahaan_id']);

            if (!$profile) {
                continue;
            }

            $course = Course::updateOrCreate(
                [
                    'title' => $item['title'],
                ],
                [
                    'perusahaan_id' => $profile->id,
                    'description' => $item['description'],
                    'benefit' => $item['benefit'],
                    'price' => $item['price'],
                    'payment_required' => $item['payment_required'],
                    'payment_note' => $item['payment_note'],
                    'is_active' => true,
                ]
            );

            CourseLink::where('course_id', $course->id)->delete();

            CourseLink::create([
                'course_id' => $course->id,
                'title' => $item['link_title'],
                'url' => $item['link_url'],
            ]);
        }
    }
}