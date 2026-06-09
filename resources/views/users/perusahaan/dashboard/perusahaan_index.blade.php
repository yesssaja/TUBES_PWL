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
        --yellow: #facc15;
        --yellow-soft: #fef9c3;
        --orange-soft: #fff7ed;
        --dark: #111827;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: #fff7ed;
        color: var(--dark);
        min-height: 100vh;
    }

    .bg-red-brand {
        background-color: var(--red);
    }

    .bg-red-brand:hover {
        background-color: var(--red-dark);
    }

    .hero-card {
        background: #ffffff;
        border: 1px solid #fde68a;
        box-shadow: 0 12px 30px rgba(15, 23, 42, .08);
    }

    .section-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 18px;
        border-radius: 999px;
        background: #fee2e2;
        color: var(--red);
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
        font-size: 12px;
        border: 1px solid #fecaca;
    }

    .company-card {
        transition: .3s ease;
    }

    .company-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15, 23, 42, .12);
        border-color: #fca5a5;
    }

    .company-cover {
        background-color: var(--yellow-soft);
    }

    .company-logo-box {
        box-shadow: 0 10px 22px rgba(15, 23, 42, .12);
    }

    .verified-badge {
        background: #ffffff;
        color: #2563eb;
        border: 1px solid #dbeafe;
    }

    .stat-card {
        transition: .25s ease;
    }

    .company-card:hover .stat-card {
        transform: translateY(-2px);
    }

    .btn-main {
        background-color: var(--red);
    }

    .btn-main:hover {
        background-color: var(--red-dark);
    }

    .btn-review {
        background-color: var(--yellow);
    }

    .btn-review:hover {
        background-color: #eab308;
    }
</style>

<section class="pt-10 pb-12 px-6">
    <div class="max-w-7xl mx-auto text-center hero-card rounded-3xl px-6 py-12">

        <p data-aos="fade-down" class="section-badge mb-5">
            Company Partner
        </p>

        <h2 data-aos="fade-up"
            data-aos-delay="120"
            class="text-4xl md:text-6xl font-black text-gray-900 mb-5 leading-tight">
            Daftar Perusahaan
        </h2>

        <p class="text-gray-500 font-medium max-w-2xl mx-auto leading-relaxed">
            Temukan perusahaan terpercaya, lihat detail lowongan, event, dan review dari pelamar.
        </p>

    </div>
</section>

<main class="max-w-7xl mx-auto px-6 pb-24">

    <div data-aos="fade-right"
         class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white border border-yellow-200 rounded-3xl shadow-sm px-6 py-5">

        <div>
            <h3 class="text-2xl md:text-3xl font-black text-gray-900 uppercase">
                Daftar <span class="text-red-600">Perusahaan</span>
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

                $cardDelay = ($index % 3) * 100;
            @endphp

            <div data-aos="fade-up"
                 data-aos-delay="{{ $cardDelay }}"
                 class="company-card group bg-white rounded-3xl shadow-sm border border-yellow-200 overflow-hidden flex flex-col justify-between">

                <div>

                    <div class="h-32 company-cover border-b border-yellow-200 relative">

                        <div class="absolute -bottom-8 left-6 w-20 h-20 bg-white rounded-2xl border-4 border-white flex items-center justify-center overflow-hidden company-logo-box">
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

                        <h4 class="text-2xl font-black text-gray-900 group-hover:text-red-600 transition line-clamp-2 min-h-[64px]">
                            {{ $namaPerusahaan }}
                        </h4>

                        <p class="text-sm text-gray-500 font-semibold mt-2 flex items-center">
                            <i class="fas fa-map-marker-alt text-red-500 mr-2 shrink-0"></i>
                            <span class="line-clamp-1">
                                {{ $alamat }}
                            </span>
                        </p>

                        <p class="text-gray-600 text-sm font-medium leading-relaxed mt-4 mb-6 line-clamp-3 min-h-[64px]">
                            {{ \Illuminate\Support\Str::limit($deskripsi, 120) }}
                        </p>

                        <div class="grid grid-cols-3 gap-3">

                            <div class="stat-card bg-red-50 rounded-2xl p-3 text-center border border-red-100">
                                <p class="text-lg font-black text-red-600">
                                    {{ $totalLoker }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">
                                    Loker
                                </p>
                            </div>

                            <div class="stat-card bg-yellow-50 rounded-2xl p-3 text-center border border-yellow-100">
                                <p class="text-lg font-black text-yellow-600">
                                    {{ $totalEvent }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">
                                    Event
                                </p>
                            </div>

                            <div class="stat-card bg-orange-50 rounded-2xl p-3 text-center border border-orange-100">
                                <p class="text-lg font-black text-orange-500">
                                    {{ $totalReview }}
                                </p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase">
                                    Review
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="px-6 pb-6 pt-2 space-y-3 mt-auto">

                    <div class="grid grid-cols-2 gap-3">

                        <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
                           class="text-center btn-main text-white px-4 py-3 rounded-xl font-black text-sm transition no-underline">
                            <i class="fas fa-info-circle mr-1"></i>
                            Detail
                        </a>

                        <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
                           class="text-center btn-review text-black px-4 py-3 rounded-xl font-black text-sm transition no-underline">
                            <i class="fas fa-star mr-1"></i>
                            Review
                        </a>

                    </div>

                    @if($website)
                        <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                           target="_blank"
                           class="block text-center border border-gray-200 bg-white hover:bg-red-50 hover:border-red-300 text-gray-700 hover:text-red-600 px-4 py-2.5 rounded-xl font-bold text-xs transition no-underline">
                            Website Utama
                            <i class="fas fa-external-link-alt ml-1 text-[10px]"></i>
                        </a>
                    @endif

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-3xl shadow-sm p-12 text-center border border-yellow-200">
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
            duration: 700,
        });
    });
</script>

@endsection