@extends('users.layouts.app')

@section('title', 'Daftar Perusahaan | LOKER SEEKER')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    :root {
        --red: #dc2626;
        --red-dark: #b91c1c;
        --orange: #f97316;
        --yellow: #facc15;
        --dark: #111827;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background:
            radial-gradient(circle at top left, rgba(250, 204, 21, .35), transparent 34%),
            radial-gradient(circle at top right, rgba(220, 38, 38, .18), transparent 32%),
            linear-gradient(180deg, #fff7ed 0%, #ffffff 45%, #fff1f2 100%);
        min-height: 100vh;
        color: var(--dark);
    }

    .bg-red-brand {
        background: linear-gradient(135deg, var(--red), var(--red-dark));
    }

    .hero-card {
        background: rgba(255, 255, 255, .72);
        backdrop-filter: blur(14px);
        border: 1px solid rgba(255, 255, 255, .65);
        box-shadow: 0 20px 60px rgba(15, 23, 42, .08);
    }

    .section-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 9px 20px;
        border-radius: 999px;
        background: rgba(220, 38, 38, .08);
        color: var(--red);
        font-weight: 900;
        letter-spacing: .14em;
        text-transform: uppercase;
        font-size: 12px;
        border: 1px solid rgba(220, 38, 38, .12);
    }

    .shimmer-text {
        background: linear-gradient(90deg, #dc2626, #f97316, #facc15, #dc2626);
        background-size: 220% auto;
        color: transparent;
        -webkit-background-clip: text;
        background-clip: text;
        animation: shine 5s linear infinite;
    }

    @keyframes shine {
        to {
            background-position: 220% center;
        }
    }

    .pop-card-effect {
        position: relative;
        isolation: isolate;
        transition:
            transform .35s cubic-bezier(.22, 1, .36, 1),
            box-shadow .35s ease,
            border-color .35s ease;
    }

    .pop-card-effect:hover {
        transform: translateY(-10px);
        border-color: rgba(220, 38, 38, .18);
        box-shadow:
            0 28px 60px rgba(15, 23, 42, .12),
            0 12px 24px rgba(220, 38, 38, .10);
    }

    .pop-card-effect:active {
        transform: translateY(-3px) scale(.98);
    }

    .company-cover {
        background:
            radial-gradient(circle at top left, rgba(255, 255, 255, .9), transparent 35%),
            linear-gradient(135deg, #fee2e2 0%, #ffedd5 48%, #fef3c7 100%);
    }

    .company-logo-box {
        box-shadow:
            0 16px 30px rgba(15, 23, 42, .12),
            0 6px 14px rgba(220, 38, 38, .10);
    }

    .verified-badge {
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(10px);
        color: #2563eb;
        border: 1px solid rgba(255, 255, 255, .7);
    }

    .stat-card {
        transition: all .3s ease;
    }

    .group:hover .stat-card {
        transform: translateY(-3px);
    }

    .btn-main {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        box-shadow: 0 10px 20px rgba(220, 38, 38, .22);
    }

    .btn-main:hover {
        box-shadow: 0 14px 28px rgba(220, 38, 38, .30);
    }

    .btn-review {
        background: linear-gradient(135deg, #facc15, #f59e0b);
        box-shadow: 0 10px 20px rgba(245, 158, 11, .22);
    }

    .btn-review:hover {
        box-shadow: 0 14px 28px rgba(245, 158, 11, .30);
    }
</style>

<section class="pt-10 pb-12 px-6">
    <div class="max-w-7xl mx-auto text-center hero-card rounded-[36px] px-6 py-12">

        <p data-aos="fade-down"
           data-aos-duration="900"
           class="section-badge mb-5">
            Company Partner
        </p>

        <h2 data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-delay="150"
            class="text-4xl md:text-6xl font-black text-gray-900 mb-5 tracking-tighter leading-tight">

            Daftar Perusahaan
            <span class="shimmer-text">
                Bersama
            </span>

        </h2>

        <p class="text-gray-500 font-semibold max-w-2xl mx-auto leading-relaxed">
            Temukan perusahaan terpercaya, lihat detail lowongan, event, dan review dari pelamar.
        </p>

    </div>
</section>

<main class="max-w-7xl mx-auto px-6 pb-24">

    <div data-aos="fade-right"
         data-aos-duration="900"
         class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white/80 backdrop-blur-xl border border-white rounded-[28px] shadow-lg px-6 py-5">

        <div>
            <h3 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tight uppercase">
                Daftar
                <span class="text-red-600">Perusahaan</span>
            </h3>

            <p class="text-gray-500 font-medium mt-1">
                Menampilkan
                <span class="bg-red-100 text-red-600 px-2.5 py-1 rounded-full font-black">
                    {{ $perusahaans->count() }}
                </span>
                perusahaan terverifikasi.
            </p>
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

        @forelse($perusahaans as $index => $perusahaan)

            @php
                $namaPerusahaan = $perusahaan->nama_perusahaan
                    ?? $perusahaan->nama
                    ?? $perusahaan->name
                    ?? 'Nama Perusahaan';

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

                $logoUrl = asset('foto_perusahaan/images.png');

                if ($logo) {
                    if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
                        $logoUrl = $logo;
                    } else {
                        $cleanPath = trim(str_replace('\\', '/', $logo), '/');

                        if (file_exists(public_path($cleanPath))) {
                            $logoUrl = asset($cleanPath);
                        } elseif (file_exists(public_path('foto_perusahaan/' . $cleanPath))) {
                            $logoUrl = asset('foto_perusahaan/' . $cleanPath);
                        } elseif (file_exists(public_path('images/' . $cleanPath))) {
                            $logoUrl = asset('images/' . $cleanPath);
                        } elseif (file_exists(public_path('storage/' . $cleanPath))) {
                            $logoUrl = asset('storage/' . $cleanPath);
                        }
                    }
                }

                $totalLoker = $perusahaan->lokers_count
                    ?? \App\Models\Loker::where('perusahaan_id', $perusahaan->id)->count();

                $totalEvent = $perusahaan->events_count
                    ?? \App\Models\Event::where('perusahaan_id', $perusahaan->id)->count();

                $totalReview = $perusahaan->reviews_count
                    ?? \App\Models\Review::where('perusahaan_id', $perusahaan->id)->count();

                $cardDelay = ($index % 3) * 120;
            @endphp

            <div data-aos="fade-up"
                 data-aos-duration="900"
                 data-aos-delay="{{ $cardDelay }}"
                 class="group bg-white rounded-[32px] shadow-lg border border-gray-100 overflow-hidden pop-card-effect flex flex-col justify-between">

                <div>

                    <div class="h-32 company-cover border-b border-gray-100 relative">

                        <div class="absolute -bottom-8 left-6 w-20 h-20 bg-white rounded-2xl border-4 border-white flex items-center justify-center overflow-hidden group-hover:scale-105 transition duration-500 ease-out company-logo-box">
                            <img src="{{ $logoUrl }}"
                                 onerror="this.onerror=null; this.src='{{ asset('foto_perusahaan/images.png') }}';"
                                 alt="Logo {{ $namaPerusahaan }}"
                                 class="w-full h-full object-contain p-2">
                        </div>

                        <div class="absolute top-4 right-4 verified-badge rounded-full px-3 py-1 text-xs font-black shadow-sm flex items-center gap-1">
                            <i class="fas fa-check-circle"></i>
                            Verified
                        </div>

                    </div>

                    <div class="pt-12 px-6 pb-4">

                        <div class="mb-4">

                            <h4 class="text-2xl font-black text-gray-900 tracking-tight group-hover:text-red-600 transition duration-300 line-clamp-2 min-h-[64px]">
                                {{ $namaPerusahaan }}
                            </h4>

                            <p class="text-sm text-gray-500 font-semibold mt-2 flex items-center min-w-0">
                                <i class="fas fa-map-marker-alt text-red-500 mr-2 shrink-0"></i>
                                <span class="line-clamp-1">
                                    {{ $alamat }}
                                </span>
                            </p>

                        </div>

                        <p class="text-gray-600 text-sm font-medium leading-relaxed mb-6 line-clamp-3 min-h-[64px]">
                            {{ \Illuminate\Support\Str::limit($deskripsi, 120) }}
                        </p>

                        <div class="grid grid-cols-3 gap-3 mb-4">

                            <div class="stat-card bg-red-50 rounded-2xl p-3 text-center border border-red-100 group-hover:bg-red-100/70 transition duration-300">
                                <p class="text-lg font-black text-red-600">
                                    {{ $totalLoker }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">
                                    Loker
                                </p>
                            </div>

                            <div class="stat-card bg-yellow-50 rounded-2xl p-3 text-center border border-yellow-100 group-hover:bg-yellow-100/70 transition duration-300">
                                <p class="text-lg font-black text-yellow-600">
                                    {{ $totalEvent }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">
                                    Event
                                </p>
                            </div>

                            <div class="stat-card bg-orange-50 rounded-2xl p-3 text-center border border-orange-100 group-hover:bg-orange-100/70 transition duration-300">
                                <p class="text-lg font-black text-orange-500">
                                    {{ $totalReview }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider">
                                    Review
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="px-6 pb-6 pt-2 space-y-3 mt-auto">

                    <div class="grid grid-cols-2 gap-3">

                        <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
                           class="text-center btn-main active:scale-95 text-white px-4 py-3 rounded-xl font-black text-sm tracking-wide transition-all duration-200 hover:scale-[1.02] no-underline">
                            <i class="fas fa-info-circle mr-1"></i>
                            Detail
                        </a>

                        <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
                           class="text-center btn-review active:scale-95 text-black px-4 py-3 rounded-xl font-black text-sm tracking-wide transition-all duration-200 hover:scale-[1.02] no-underline">
                            <i class="fas fa-star mr-1"></i>
                            Review
                        </a>

                    </div>

                    @if($website)
                        <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                           target="_blank"
                           class="block text-center border-2 border-gray-100 bg-white hover:bg-red-50 hover:border-red-300 active:scale-[0.98] text-gray-700 hover:text-red-600 px-4 py-2.5 rounded-xl font-bold text-xs transition duration-200 no-underline">
                            Website Utama
                            <i class="fas fa-external-link-alt ml-1 text-[10px]"></i>
                        </a>
                    @endif

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-3xl shadow-xl p-12 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto rounded-3xl bg-red-50 text-red-600 flex items-center justify-center text-4xl mb-5">
                    <i class="fas fa-building"></i>
                </div>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            once: true,
            easing: 'cubic-bezier(0.25, 1, 0.5, 1)',
            duration: 700,
        });
    });
</script>

@endsection