<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseLink;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Membuat CV dan Surat Lamaran Kerja',
                'description' => 'Banyak perusahaan besar sekarang pakai sistem komputer ATS untuk menyaring CV sebelum dibaca HRD. Kursus ini mengajarkan cara bikin CV yang bisa lolos dari sistem itu mulai dari format yang benar, pemilihan font, sampai penempatan kata kunci yang tepat.',
                'benefit' => 'Hasilnya CV akan jadi lebih rapi dan profesional, serta punya peluang lebih besar untuk dipanggil interview.',
                'price' => 50000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Panduan Lengkap Membuat CV ATS Friendly 2026',
                'link_url' => 'https://www.youtube.com/watch?v=JpPoxKdJoeo',
            ],
            [
                'title' => 'Course Tips & Tricks Lulus Wawancara',
                'description' => 'Kursus ini mengajarkan cara menjawab pertanyaan interview dengan struktur yang jelas memakai metode STAR, termasuk pertanyaan klasik seperti ceritakan tentang diri kamu.',
                'benefit' => 'Latihan ini membantu peserta wawancara lebih siap secara mental dan mampu menyampaikan jawaban dengan terarah.',
                'price' => 60000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Trik Ampuh Menjawab Pertanyaan Interview',
                'link_url' => 'https://www.youtube.com/watch?v=9WsRvH1BSJQ',
            ],
            [
                'title' => 'Course Public Speaking',
                'description' => 'Kursus ini mengajarkan cara berbicara di depan umum mulai dari teknik napas, bahasa tubuh, penyusunan materi, sampai menjaga intonasi suara.',
                'benefit' => 'Cocok untuk presentasi, rapat, dan meningkatkan percaya diri.',
                'price' => 65000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => '8 Langkah Mudah Menguasai Public Speaking',
                'link_url' => 'https://www.youtube.com/watch?v=CIPfDFGooXY',
            ],
            [
                'title' => 'Course Bahasa Inggris untuk Interview',
                'description' => 'Kursus ini mengajarkan frasa yang sering muncul saat interview dalam bahasa Inggris, lengkap dengan simulasi pengucapan.',
                'benefit' => 'Berguna untuk melamar ke perusahaan multinasional dan meningkatkan kesiapan bersaing secara internasional.',
                'price' => 70000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Tips Sukses Wawancara Kerja Bahasa Inggris',
                'link_url' => 'https://www.youtube.com/watch?v=upNBA-C1L9Q',
            ],
            [
                'title' => 'Course Microsoft Excel',
                'description' => 'Kursus ini membahas dasar Excel sampai rumus penting seperti VLOOKUP dan Pivot Table.',
                'benefit' => 'Keahlian Excel membantu pengolahan data dan menjadi nilai tambah di dunia kerja.',
                'price' => 75000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Panduan Dasar Microsoft Excel',
                'link_url' => 'https://www.youtube.com/watch?v=6WgvzCU3TI8',
            ],
            [
                'title' => 'Course Web Development',
                'description' => 'Kursus ini mencakup HTML, CSS, dan JavaScript dari dasar sampai tampilan responsif.',
                'benefit' => 'Keahlian ini membuka peluang karier di bidang teknologi dan membantu membuat portofolio digital.',
                'price' => 100000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Dasar HTML dan CSS untuk Pemula',
                'link_url' => 'https://www.youtube.com/watch?v=71a2zeC71gk',
            ],
            [
                'title' => 'Course Social Media Marketing',
                'description' => 'Kursus ini mengajarkan riset audiens, pembuatan konten, tren, dan analitik media sosial.',
                'benefit' => 'Berguna untuk karier digital marketing dan pengembangan bisnis online.',
                'price' => 80000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Belajar Digital Marketing dari 0',
                'link_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI',
            ],
            [
                'title' => 'Course Desain Grafis',
                'description' => 'Kursus ini mengajarkan teori warna, tipografi, layout, dan penggunaan tools desain.',
                'benefit' => 'Membantu membuat konten visual berkualitas yang dibutuhkan banyak industri.',
                'price' => 85000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Rahasia Desain Grafis Efektif',
                'link_url' => 'https://www.youtube.com/watch?v=Nfd4UGgmdhI',
            ],
            [
                'title' => 'Course Fotografi',
                'description' => 'Kursus ini mengajarkan exposure, aperture, shutter speed, ISO, angle, dan pemanfaatan cahaya.',
                'benefit' => 'Membantu menghasilkan foto lebih profesional, bahkan menggunakan ponsel.',
                'price' => 75000,
                'payment_required' => true,
                'payment_note' => 'Transfer ke BCA 123456789 a.n LOKER SEEKER. Setelah pembayaran, upload bukti pada form pendaftaran. Permintaan akan diproses oleh mentor.',
                'link_title' => 'Tips Paham ISO, Aperture, dan Shutter Speed',
                'link_url' => 'https://www.youtube.com/watch?v=kA1jXBZCHNI',
            ],
        ];

        foreach ($courses as $item) {
            $course = Course::updateOrCreate(
                [
                    'title' => $item['title'],
                ],
                [
                    'description' => $item['description'],
                    'benefit' => $item['benefit'],
                    'price' => $item['price'],
                    'payment_required' => $item['payment_required'],
                    'payment_note' => $item['payment_note'],
                    'is_active' => true,
                ]
            );

            /*
             * Hapus link lama supaya tiap course hanya punya 1 link.
             * Ini sesuai kebutuhan: user hanya akses 1 link sesuai course yang dia daftarkan.
             */
            CourseLink::where('course_id', $course->id)->delete();

            CourseLink::create([
                'course_id' => $course->id,
                'title' => $item['link_title'],
                'url' => $item['link_url'],
            ]);
        }
    }
}