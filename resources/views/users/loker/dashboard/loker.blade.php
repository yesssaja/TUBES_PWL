@extends('users.loker.layouts.app')

@section('content')

<main class="min-h-screen bg-yellow-50">
    <div class="max-w-6xl mx-auto px-4 md:px-6 py-10">

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-10">
            <p class="text-sm font-bold text-red-600 uppercase tracking-wide mb-2">
                Daftar Lowongan
            </p>

            <h2 class="text-4xl font-black text-gray-900 mb-3">
                Lowongan Kerja
            </h2>

            <p class="text-gray-600 max-w-2xl leading-relaxed">
                Pilih lowongan kerja yang sesuai dengan minat dan kemampuan Anda, lalu klik detail untuk melihat informasi lengkap.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">

            @forelse($lokers as $loker)

                @php
                    $perusahaan = $loker->profilePerusahaan ?? null;

                    $namaPerusahaan = $perusahaan->nama_perusahaan ?? 'Perusahaan';
                    $judulLoker = $loker->judul_loker ?? 'Lowongan Kerja';
                    $lokasi = $loker->lokasi ?? '-';
                    $tipePekerjaan = $loker->tipe_pekerjaan ?? '-';
                    $gaji = $loker->gaji ?? 'Kompetitif';

                    $deadline = !empty($loker->batas_lamaran)
                        ? \Carbon\Carbon::parse($loker->batas_lamaran)->format('d M Y')
                        : '-';

                    $logo = $perusahaan ? $perusahaan->logo : null;

                    if ($logo) {
                        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
                            $logoPerusahaan = $logo;
                        } else {
                            $cleanLogo = ltrim($logo, '/');

                            if (
                                str_starts_with($cleanLogo, 'storage/') ||
                                str_starts_with($cleanLogo, 'foto_perusahaan/') ||
                                str_starts_with($cleanLogo, 'images/')
                            ) {
                                $logoPerusahaan = asset($cleanLogo);
                            } else {
                                if (file_exists(public_path('storage/' . $cleanLogo))) {
                                    $logoPerusahaan = asset('storage/' . $cleanLogo);
                                } elseif (file_exists(public_path('images/' . $cleanLogo))) {
                                    $logoPerusahaan = asset('images/' . $cleanLogo);
                                } else {
                                    $logoPerusahaan = asset('foto_perusahaan/' . $cleanLogo);
                                }
                            }
                        }
                    } else {
                        $logoPerusahaan = asset('foto_perusahaan/images.png');
                    }
                @endphp

                <div class="group bg-white rounded-3xl shadow-sm border border-yellow-200 overflow-hidden transition duration-300 hover:shadow-lg hover:-translate-y-1">

                    <div class="h-24 w-full bg-yellow-300"></div>

                    <div class="p-6 -mt-12 relative">

                        <div class="w-20 h-20 rounded-2xl border-4 border-white bg-white shadow-md flex items-center justify-center mb-5">
                            <img src="{{ $logoPerusahaan }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo Perusahaan"
                                 class="w-full h-full rounded-xl object-contain">
                        </div>

                        <p class="text-sm font-bold text-red-600 mb-2">
                            {{ $namaPerusahaan }}
                        </p>

                        <h3 class="text-xl font-black text-gray-900 mb-5 leading-snug line-clamp-2">
                            {{ $judulLoker }}
                        </h3>

                        <div class="space-y-3 text-sm text-gray-600 mb-6">

                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-red-600 mt-1 w-4"></i>
                                <span>{{ $lokasi }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-briefcase text-red-600 mt-1 w-4"></i>
                                <span>{{ $tipePekerjaan }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-money-bill text-red-600 mt-1 w-4"></i>
                                <span>{{ $gaji }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-red-600 mt-1 w-4"></i>
                                <span>Deadline: {{ $deadline }}</span>
                            </div>

                        </div>

                        <a href="{{ route('loker.show', $loker->id) }}"
                           class="block text-center bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow-sm transition duration-300 group-hover:shadow-md">
                            Lihat Detail
                        </a>

                    </div>
                </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl shadow-sm border border-yellow-200 p-12 text-center">

                    <h3 class="text-2xl font-black text-gray-900 mb-2">
                        Belum Ada Lowongan
                    </h3>

                    <p class="text-gray-500">
                        Data lowongan kerja belum tersedia.
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</main>

@endsection