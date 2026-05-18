<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
        }

        .bg-yellow-brand {
            background-color: #F4D03F;
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .text-red-brand {
            color: #E74C3C;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-yellow-100 via-orange-50 to-yellow-200 text-gray-800 font-sans">

    <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">

            <h1 class="text-2xl font-bold italic tracking-wider">
                LOKER SEEKER
            </h1>

            <nav class="hidden md:flex space-x-6 font-medium">

                <a href="{{ route('welcome') }}"
                   class="hover:text-yellow-300">
                    Home
                </a>

                <a href="{{ route('loker.index') }}"
                   class="hover:text-yellow-300 border-b-2 border-yellow-300">
                    Jobs
                </a>

                <a href="{{ route('perusahaan.detail.default') }}"
                   class="hover:text-yellow-300">
                    Company
                </a>

            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-10 max-w-6xl">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-10">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">
                Lowongan Kerja
            </h2>

            <p class="text-gray-600">
                Pilih lowongan kerja yang sesuai, lalu klik detail untuk mengirim lamaran.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($lokers as $loker)

                @php
                    $perusahaan = $loker->perusahaan ?? null;

                    $namaPerusahaan = $perusahaan->nama_perusahaan
                        ?? $perusahaan->nama
                        ?? $perusahaan->name
                        ?? 'Perusahaan';

                    $judulLoker = $loker->judul_loker
                        ?? $loker->judul
                        ?? $loker->posisi
                        ?? 'Lowongan Kerja';

                    $lokasi = $loker->lokasi ?? '-';

                    $tipePekerjaan = $loker->tipe_pekerjaan
                        ?? $loker->tipe_kerja
                        ?? '-';

                    $gaji = $loker->gaji ?? 'Kompetitif';

                    $deadline = !empty($loker->batas_lamaran)
                        ? \Carbon\Carbon::parse($loker->batas_lamaran)->format('d M Y')
                        : '-';

                    $logo = $perusahaan->logo
                        ?? $perusahaan->foto
                        ?? $perusahaan->foto_perusahaan
                        ?? null;

                    if ($logo) {
                        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
                            $logoPerusahaan = $logo;
                        } elseif (str_starts_with($logo, 'storage/')) {
                            $logoPerusahaan = asset($logo);
                        } elseif (str_contains($logo, '/')) {
                            $logoPerusahaan = asset('storage/' . $logo);
                        } else {
                            $logoPerusahaan = asset('foto_perusahaan/' . $logo);
                        }
                    } else {
                        $logoPerusahaan = asset('foto_perusahaan/images.png');
                    }
                @endphp

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition">

                    <div class="bg-yellow-brand h-24 w-full"></div>

                    <div class="p-6 -mt-12">

                        <img src="{{ $logoPerusahaan }}"
                             onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                             alt="Logo Perusahaan"
                             class="w-20 h-20 rounded-xl border-4 border-white shadow-md bg-white object-contain mb-4">

                        <h3 class="text-xl font-bold text-gray-800 mb-1">
                            {{ $judulLoker }}
                        </h3>

                        <p class="text-red-brand font-semibold mb-4">
                            {{ $namaPerusahaan }}
                        </p>

                        <div class="space-y-2 text-sm text-gray-500 mb-5">

                            <p>
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                {{ $lokasi }}
                            </p>

                            <p>
                                <i class="fas fa-briefcase mr-2"></i>
                                {{ $tipePekerjaan }}
                            </p>

                            <p>
                                <i class="fas fa-money-bill mr-2"></i>
                                {{ $gaji }}
                            </p>

                            <p>
                                <i class="fas fa-clock mr-2"></i>
                                Deadline: {{ $deadline }}
                            </p>

                        </div>

                        <a href="{{ route('loker.show', $loker->id) }}"
                           class="block text-center bg-red-brand hover:bg-red-700 text-white px-6 py-3 rounded-full font-bold shadow-lg transition-all transform hover:scale-105">
                            Lihat Detail
                        </a>

                    </div>
                </div>

            @empty

                <div class="col-span-full bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center">

                    <h3 class="text-2xl font-bold text-gray-800 mb-2">
                        Belum Ada Lowongan
                    </h3>

                    <p class="text-gray-500">
                        Data lowongan kerja belum tersedia.
                    </p>

                </div>

            @endforelse

        </div>

    </main>

    <footer class="bg-red-800 text-white py-6 mt-12 text-center text-sm">
        <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
    </footer>

</body>
</html>