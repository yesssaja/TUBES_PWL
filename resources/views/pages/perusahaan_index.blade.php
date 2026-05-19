<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perusahaan | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2);
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .text-red-brand {
            color: #E74C3C;
        }

        .bg-yellow-brand {
            background-color: #F4D03F;
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- Navbar -->
    <header class="fixed top-0 left-0 w-full bg-red-brand text-white shadow-xl z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

            <h1 class="text-3xl font-black tracking-tighter">
                LOKER SEEKER🔥
            </h1>

            <nav class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
                <a href="{{ route('welcome') }}" class="hover:text-yellow-300 transition">
                    Home
                </a>

                <a href="{{ route('loker.index') }}" class="hover:text-yellow-300 transition">
                    Jobs
                </a>

                <a href="{{ route('perusahaan.index') }}" class="hover:text-yellow-300 transition border-b-2 border-yellow-300">
                    Company
                </a>

                <a href="{{ route('event.index') }}" class="hover:text-yellow-300 transition">
                    Event
                </a>
            </nav>

        </div>
    </header>

    <!-- Hero -->
    <section class="pt-32 pb-16 px-6">
        <div class="max-w-7xl mx-auto text-center">

            <p class="text-red-600 font-black uppercase tracking-widest mb-3">
                Company Partner
            </p>

            <h2 class="text-5xl md:text-6xl font-black text-gray-900 mb-5">
                Perusahaan yang Bekerja Sama
            </h2>

            <p class="max-w-3xl mx-auto text-gray-700 text-lg leading-relaxed">
                Temukan perusahaan partner LOKER SEEKER, lihat profil perusahaan,
                lowongan yang tersedia, event, dan review dari pengguna.
            </p>

        </div>
    </section>

    <!-- Company List -->
    <main class="max-w-7xl mx-auto px-6 pb-24">

        <div class="mb-8 flex justify-between items-center">
            <div>
                <h3 class="text-3xl font-black text-red-600">
                    Daftar Perusahaan
                </h3>

                <p class="text-gray-500 mt-1">
                    Total {{ $perusahaans->count() }} perusahaan tersedia.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($perusahaans as $perusahaan)

                @php
                    $namaPerusahaan = $perusahaan->nama_perusahaan
                        ?? $perusahaan->nama
                        ?? $perusahaan->name
                        ?? 'Nama Perusahaan';

                    $bidang = $perusahaan->bidang
                        ?? $perusahaan->industri
                        ?? $perusahaan->industry
                        ?? 'Industri belum diisi';

                    $alamat = $perusahaan->alamat
                        ?? $perusahaan->lokasi
                        ?? '-';

                    $deskripsi = $perusahaan->deskripsi
                        ?? $perusahaan->description
                        ?? 'Deskripsi perusahaan belum tersedia.';

                    $website = $perusahaan->website
                        ?? $perusahaan->situs
                        ?? null;

                    $logo = $perusahaan->logo
                        ?? $perusahaan->foto
                        ?? $perusahaan->foto_perusahaan
                        ?? null;

                    if ($logo) {
                        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
                            $logoUrl = $logo;
                        } elseif (str_starts_with($logo, 'storage/')) {
                            $logoUrl = asset($logo);
                        } elseif (str_contains($logo, '/')) {
                            $logoUrl = asset('storage/' . $logo);
                        } else {
                            $logoUrl = asset('foto_perusahaan/' . $logo);
                        }
                    } else {
                        $logoUrl = asset('foto_perusahaan/images.png');
                    }

                    $totalLoker = \App\Models\Loker::where('perusahaan_id', $perusahaan->id)->count();
                    $totalEvent = \App\Models\Event::where('perusahaan_id', $perusahaan->id)->count();
                    $totalReview = \App\Models\Review::where('perusahaan_id', $perusahaan->id)->count();
                @endphp

                <div class="bg-white rounded-[32px] shadow-xl border border-gray-100 overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                    <div class="h-32 bg-gradient-to-r from-red-500 to-yellow-400 relative">

                        <div class="absolute -bottom-12 left-6 w-24 h-24 bg-white rounded-2xl shadow-lg border-4 border-white flex items-center justify-center overflow-hidden">
                            <img src="{{ $logoUrl }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo Perusahaan"
                                 class="w-full h-full object-contain p-2">
                        </div>

                    </div>

                    <div class="pt-16 px-6 pb-6">

                        <div class="mb-4">
                            <h4 class="text-2xl font-black text-gray-900">
                                {{ $namaPerusahaan }}
                            </h4>

                            <p class="text-red-600 font-semibold mt-1">
                                {{ $bidang }}
                            </p>

                            <p class="text-sm text-gray-500 mt-2">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                {{ $alamat }}
                            </p>
                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed mb-5">
                            {{ \Illuminate\Support\Str::limit($deskripsi, 130) }}
                        </p>

                        <div class="grid grid-cols-3 gap-3 mb-6">

                            <div class="bg-red-50 rounded-2xl p-3 text-center">
                                <p class="text-xl font-black text-red-600">
                                    {{ $totalLoker }}
                                </p>
                                <p class="text-xs text-gray-500 font-semibold">
                                    Loker
                                </p>
                            </div>

                            <div class="bg-yellow-50 rounded-2xl p-3 text-center">
                                <p class="text-xl font-black text-yellow-500">
                                    {{ $totalEvent }}
                                </p>
                                <p class="text-xs text-gray-500 font-semibold">
                                    Event
                                </p>
                            </div>

                            <div class="bg-orange-50 rounded-2xl p-3 text-center">
                                <p class="text-xl font-black text-orange-500">
                                    {{ $totalReview }}
                                </p>
                                <p class="text-xs text-gray-500 font-semibold">
                                    Review
                                </p>
                            </div>

                        </div>

                        <div class="flex flex-wrap gap-3">

                            <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
                               class="flex-1 text-center bg-red-brand hover:bg-red-700 text-white px-5 py-3 rounded-xl font-bold transition">
                                Detail
                            </a>

                            <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
                               class="flex-1 text-center bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-3 rounded-xl font-bold transition">
                                Review
                            </a>

                        </div>

                        @if($website)
                            <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                               target="_blank"
                               class="block text-center mt-3 border border-gray-200 hover:border-red-400 text-gray-700 px-5 py-3 rounded-xl font-bold transition">
                                Website <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        @endif

                    </div>

                </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl shadow-xl p-12 text-center">
                    <h3 class="text-3xl font-black text-gray-800">
                        Belum Ada Perusahaan
                    </h3>

                    <p class="text-gray-500 mt-3">
                        Data perusahaan belum tersedia.
                    </p>
                </div>

            @endforelse

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 text-center">
        <h2 class="text-3xl font-black mb-3">
            LOKER SEEKER🔥
        </h2>

        <p class="text-gray-400">
            © 2026 Loker Seeker. All Rights Reserved.
        </p>
    </footer>

</body>
</html>