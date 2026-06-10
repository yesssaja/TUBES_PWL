@extends('users.loker.layouts.app')

@section('content')

<style>
   
    .hero-bg-loker {
        position: relative;
        overflow: hidden;
        background: rgba(255, 255, 255, .68);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, .7);
        box-shadow: 0 24px 60px rgba(15, 23, 42, .08);
    }

    .hero-bg-loker::before {
        content: '';
        position: absolute;
        width: 360px;
        height: 360px;
        background: #fecaca;
        filter: blur(110px);
        top: -120px;
        right: -120px;
        opacity: .65;
        animation: floatBlobLoker 6s ease-in-out infinite alternate;
    }

    .hero-bg-loker::after {
        content: '';
        position: absolute;
        width: 330px;
        height: 330px;
        background: #fde68a;
        filter: blur(120px);
        bottom: -130px;
        left: -110px;
        opacity: .55;
        animation: floatBlobLoker 7s ease-in-out infinite alternate-reverse;
    }

    @keyframes floatBlobLoker {
        from {
            transform: translateY(0) scale(1);
        }
        to {
            transform: translateY(24px) scale(1.08);
        }
    }

    .hero-content-loker {
        position: relative;
        z-index: 2;
    }

    .hero-badge-loker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
        border-radius: 999px;
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 900;
        letter-spacing: 4px;
        text-transform: uppercase;
    }

    .text-gradient-loker {
        background: linear-gradient(90deg, #dc2626, #f97316, #facc15, #dc2626);
        background-size: 220% auto;
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        animation: shineTextLoker 5s linear infinite;
    }

    @keyframes shineTextLoker {
        to {
            background-position: 220% center;
        }
    }
</style>

<main class="min-h-screen bg-yellow-50/40">
    <div class="max-w-6xl mx-auto px-4 md:px-6 py-10">

        @if(session('success'))
            <div class="mb-8 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm text-sm">
                {{ session('success') }}
            </div>
        @endif

        <section class="mb-12">
            <div class="hero-bg-loker rounded-[38px] px-6 md:px-12 py-12 md:py-14">
                <div class="hero-content-loker">
                    
                    <p class="hero-badge-loker mb-5">
                        Daftar Lowongan Kerja
                    </p>

                    <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-tight tracking-tight">
                        Cari & Temukan
                        <span class="text-gradient-loker">
                            Lowongan
                        </span>
                        <br>
                        Sesuai Karirmu
                    </h1>

                    <p class="text-gray-600 mt-6 text-sm md:text-base max-w-2xl leading-relaxed font-medium">
                        Pilih lowongan kerja yang sesuai dengan minat dan kemampuan Anda, 
                        lalu klik detail untuk melihat informasi lengkap serta persyaratan korporasi.
                    </p>

                </div>
            </div>
        </section>

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

                <div class="group bg-white rounded-[2rem] shadow-sm border border-yellow-200/80 overflow-hidden transform transition-all duration-500 cubic-bezier(.22, 1, .36, 1) hover:shadow-2xl hover:shadow-yellow-600/10 hover:-translate-y-3">

                    <div class="h-24 w-full bg-gradient-to-br from-amber-300 via-yellow-300 to-yellow-200 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.25),transparent)]"></div>
                    </div>

                    <div class="p-6 -mt-12 relative">

                        <div class="w-20 h-20 rounded-2xl border-4 border-white bg-white shadow-md flex items-center justify-center mb-5 transition-transform duration-500 group-hover:scale-105 group-hover:rotate-2">
                            <img src="{{ $logoPerusahaan }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo Perusahaan"
                                 class="w-full h-full rounded-xl object-contain">
                        </div>

                        <p class="text-xs font-black text-red-600 tracking-wide uppercase mb-2">
                            {{ $namaPerusahaan }}
                        </p>

                        <h3 class="text-xl font-black text-gray-900 mb-5 leading-snug line-clamp-2 transition-colors duration-300 group-hover:text-red-600">
                            {{ $judulLoker }}
                        </h3>

                        <div class="space-y-3 text-sm text-gray-600 mb-6 border-t border-gray-50 pt-4">

                            <div class="flex items-start gap-3">
                                <i class="fas fa-map-marker-alt text-red-600 mt-1 w-4"></i>
                                <span class="font-medium">{{ $lokasi }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-briefcase text-red-600 mt-1 w-4"></i>
                                <span class="font-medium">{{ $tipePekerjaan }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-money-bill text-red-600 mt-1 w-4"></i>
                                <span class="font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-md text-xs border border-amber-100">{{ $gaji }}</span>
                            </div>

                            <div class="flex items-start gap-3">
                                <i class="fas fa-clock text-red-600 mt-1 w-4"></i>
                                <span class="font-medium text-gray-500">Deadline: <span class="text-red-600 font-bold">{{ $deadline }}</span></span>
                            </div>

                        </div>

                        <a href="{{ route('loker.show', $loker->id) }}"
                           class="block text-center bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-3.5 rounded-2xl font-black text-xs uppercase tracking-wider shadow-sm transition-all duration-300 transform active:scale-[0.98] group-hover:shadow-lg group-hover:shadow-red-600/20">
                            Lihat Detail 
                        </a>

                    </div>
                </div>

            @empty

                <div class="col-span-full bg-white rounded-[2rem] shadow-sm border border-yellow-200 p-12 text-center">
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