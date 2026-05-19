<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Review | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .text-red-brand {
            color: #E74C3C;
        }

        .hero-gradient-bg {
            background-image:
                linear-gradient(to bottom, rgba(244, 208, 63, 0.85), rgba(244, 208, 63, 0.95)),
                url('{{ asset("perusahaan_1.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        section {
            scroll-margin-top: 80px;
        }
    </style>
</head>

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? $perusahaan->name
        ?? 'Perusahaan';

    $industri = $perusahaan->industri
        ?? $perusahaan->industry
        ?? $perusahaan->bidang
        ?? 'Industri belum diisi';

    $logo = $perusahaan->logo
        ?? $perusahaan->foto
        ?? $perusahaan->foto_perusahaan
        ?? null;

    if ($logo) {
        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
            $logoUrl = $logo;
        } elseif (str_contains($logo, '/')) {
            $logoUrl = asset($logo);
        } else {
            $logoUrl = asset('foto_perusahaan/' . $logo);
        }
    } else {
        $logoUrl = asset('foto_perusahaan/images.png');
    }

    $gajiPercent = $avgGaji > 0 ? min(100, ($avgGaji / 5) * 100) : 0;
    $kulturPercent = $avgKultur > 0 ? min(100, ($avgKultur / 5) * 100) : 0;
    $fasilitasPercent = $avgFasilitas > 0 ? min(100, ($avgFasilitas / 5) * 100) : 0;
@endphp

<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">

            <h1 class="text-2xl font-bold italic tracking-wider">
                LOKER SEEKER
            </h1>

            <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
               class="text-sm font-bold hover:text-yellow-300 transition">
                ← Kembali
            </a>

        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient-bg py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">

            <div class="w-28 h-28 bg-white rounded-2xl shadow-xl flex items-center justify-center overflow-hidden border-4 border-white">
                <img src="{{ $logoUrl }}"
                     alt="Logo"
                     class="object-contain w-full p-2">
            </div>

            <div class="text-center md:text-left text-gray-900">
                <h2 class="text-4xl font-extrabold">
                    {{ $namaPerusahaan }}
                    <i class="fas fa-check-circle text-blue-500 text-2xl"></i>
                </h2>

                <p class="text-xl font-medium opacity-80">
                    {{ $industri }}
                </p>
            </div>

        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto -mt-12 px-4 pb-20">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-5 py-4 rounded-xl mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Statistics Summary -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">

            <div class="text-center md:border-r border-gray-100">

                <div class="text-5xl font-bold text-red-brand">
                    {{ number_format($averageRating, 1) }}
                </div>

                <div class="flex justify-center my-2 text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($averageRating))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                </div>

                <p class="text-sm text-gray-500">
                    Berdasarkan {{ $totalReviews }} ulasan
                </p>

            </div>

            <div class="md:col-span-2 space-y-2">

                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-16">Gaji</span>

                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                        <div class="bg-green-500 h-2 rounded-full"
                             style="width: {{ $gajiPercent }}%"></div>
                    </div>

                    <span class="text-sm font-bold text-gray-600">
                        {{ number_format($avgGaji, 1) }}
                    </span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-16">Kultur</span>

                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                        <div class="bg-blue-500 h-2 rounded-full"
                             style="width: {{ $kulturPercent }}%"></div>
                    </div>

                    <span class="text-sm font-bold text-gray-600">
                        {{ number_format($avgKultur, 1) }}
                    </span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-16">Fasilitas</span>

                    <div class="flex-1 bg-gray-200 h-2 rounded-full">
                        <div class="bg-yellow-500 h-2 rounded-full"
                             style="width: {{ $fasilitasPercent }}%"></div>
                    </div>

                    <span class="text-sm font-bold text-gray-600">
                        {{ number_format($avgFasilitas, 1) }}
                    </span>
                </div>

            </div>

        </div>

        <!-- Filter & Header -->
        <div class="flex justify-between items-center mb-6">

            <h2 class="text-xl font-bold text-gray-800">
                Ulasan Terbaru
            </h2>

            <a href="{{ route('tulis.review', $perusahaan->id) }}"
               class="bg-red-brand text-white px-5 py-2 rounded-lg font-semibold hover:bg-red-600 transition shadow-sm">
                <i class="fas fa-pen-nib mr-2"></i>
                Tulis Ulasan
            </a>

        </div>

        <!-- Review List -->
        <div class="space-y-6">

            @forelse($reviews as $review)

                @php
                    $namaReviewer = $review->nama
                        ?? $review->user->name
                        ?? 'Anonim';

                    $initials = collect(explode(' ', $namaReviewer))
                        ->filter()
                        ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                        ->take(2)
                        ->implode('');

                    $posisi = $review->posisi ?? 'Reviewer';

                    $tanggalReview = $review->created_at
                        ? $review->created_at->format('d M Y')
                        : '-';
                @endphp

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                    <div class="p-6">

                        <div class="flex justify-between items-start mb-4">

                            <div class="flex gap-4 italic">

                                <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-red-brand font-bold text-lg">
                                    {{ $initials ?: 'AN' }}
                                </div>

                                <div>
                                    <h4 class="font-bold text-gray-800">
                                        {{ $namaReviewer }}
                                    </h4>

                                    <p class="text-sm text-gray-500">
                                        {{ $posisi }}
                                        •
                                        <span class="italic text-xs">
                                            {{ $tanggalReview }}
                                        </span>
                                    </p>
                                </div>

                            </div>

                            <div class="flex text-yellow-400 text-sm bg-yellow-50 px-3 py-1 rounded-full">
                                <i class="fas fa-star mr-1"></i>
                                {{ number_format($review->rating, 1) }}
                            </div>

                        </div>

                        <p class="text-gray-700 leading-relaxed">
                            {{ $review->ulasan }}
                        </p>

                        @if($review->balasan_perusahaan)
                            <div class="mt-6 ml-4 md:ml-10 p-4 bg-gray-50 border-l-4 border-red-brand rounded-r-lg">

                                <div class="flex items-center gap-2 mb-2">
                                    <i class="fas fa-reply text-gray-400"></i>

                                    <span class="font-bold text-sm text-gray-800 uppercase tracking-wider">
                                        Balasan Perusahaan
                                    </span>
                                </div>

                                <p class="text-sm text-gray-600">
                                    {{ $review->balasan_perusahaan }}
                                </p>

                            </div>
                        @endif

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10 text-center">

                    <h3 class="text-2xl font-bold text-gray-800">
                        Belum ada review
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Jadilah orang pertama yang menulis review untuk perusahaan ini.
                    </p>

                    <a href="{{ route('tulis.review', $perusahaan->id) }}"
                       class="inline-block mt-6 bg-red-brand text-white px-6 py-3 rounded-xl font-bold hover:bg-red-600 transition">
                        Tulis Review
                    </a>

                </div>

            @endforelse

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-12 text-center text-sm">
        <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
    </footer>

</body>
</html>