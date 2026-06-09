@extends('users.loker.layouts.app')

@section('content')

    <main class="container mx-auto px-4 py-10 max-w-6xl">

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-8 font-medium shadow-sm text-sm">
                {{ session('success') }}
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
            
            
            if (str_starts_with($cleanLogo, 'storage/') || str_starts_with($cleanLogo, 'foto_perusahaan/') || str_starts_with($cleanLogo, 'images/')) {
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

@endsection