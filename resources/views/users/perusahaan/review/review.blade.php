@extends('users.layouts.app')

@section('title', 'Company Review | LOKER SEEKER')

@section('content')

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? 'Perusahaan';

    $alamatPerusahaan = $perusahaan->alamat
        ?? 'Alamat belum diisi';

    $logo = $perusahaan->logo
        ?? $perusahaan->foto
        ?? $perusahaan->foto_perusahaan
        ?? null;

    $logoUrl = asset('images/default-company.png');

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
@endphp

<style>
    .hero-gradient-bg {
        background-image:
            linear-gradient(135deg, rgba(220, 38, 38, 0.92), rgba(245, 158, 11, 0.85), rgba(250, 204, 21, 0.75)),
            url('{{ asset("perusahaan_1.jpg") }}');
        background-size: cover;
        background-position: center;
    }

    .red-brand {
        color: #dc2626;
    }

    .bg-red-brand {
        background-color: #dc2626;
    }

    .border-red-brand {
        border-color: #dc2626;
    }
</style>

{{-- HERO --}}
<section class="hero-gradient-bg py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex flex-col md:flex-row md:items-center gap-6">

            {{-- LOGO --}}
            <div class="w-24 h-24 md:w-28 md:h-28 bg-white rounded-3xl shadow-xl p-3 flex items-center justify-center shrink-0">

                <img
                    src="{{ $logoUrl }}"
                    alt="{{ $namaPerusahaan }}"
                    class="w-full h-full object-contain">

            </div>

            {{-- INFO --}}
            <div class="flex-1">

                <div class="flex flex-wrap items-center gap-3">

                    <h1 class="text-4xl md:text-6xl font-black text-white leading-none">
                        {{ $namaPerusahaan }}
                    </h1>

                </div>

                <p class="text-lg md:text-2xl text-white/90 font-semibold mt-3">
                    {{ $perusahaan->alamat ?? 'Alamat belum diisi' }}
                </p>

            </div>

        </div>

    </div>

</section>

{{-- MAIN --}}
<main class="max-w-6xl mx-auto mt-8 px-4 pb-20">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 border border-green-300 px-5 py-4 rounded-2xl mb-6 font-semibold">
             {{ session('success') }}
        </div>
    @endif

    {{-- STATISTIC --}}
    <div class="bg-white rounded-[28px] shadow-lg p-5 md:p-7 mb-8 grid grid-cols-1 md:grid-cols-3 gap-6 items-center border border-gray-100">

        <div class="text-center md:border-r border-gray-100">
            <div class="text-5xl font-black text-red-600">
                {{ number_format($averageRating, 1) }}
            </div>

            <div class="flex justify-center my-3 text-yellow-400 gap-1">
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

        <div class="md:col-span-2">
            <h3 class="text-xl font-black text-gray-900 mb-2">
                Peringkat Kepuasan Kerja
            </h3>

            <p class="text-gray-500 text-sm md:text-base leading-relaxed">
                Review dan ulasan di bawah ini diberikan secara transparan oleh pelamar maupun mantan karyawan untuk membantu kamu mengetahui kultur kerja di {{ $namaPerusahaan }}.
            </p>
        </div>

    </div>

    {{-- HEADER LIST --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">

        <div>
            <h2 class="text-2xl font-black text-gray-900">
                Ulasan Terbaru
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Lihat pengalaman pelamar dan balasan dari perusahaan.
            </p>
        </div>

        <a href="{{ route('review.create', $perusahaan->id) }}"
           class="w-full sm:w-auto inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-2xl font-black transition shadow-sm no-underline">
            <i class="fas fa-pen-nib mr-2"></i>
            Tulis Ulasan
        </a>

    </div>

    {{-- REVIEW LIST --}}
    <div class="space-y-6">

        @forelse($reviews as $item)

            @php
                $namaReviewer = $item->nama ?? optional($item->pelamar)->name ?? 'Anonim';

                $initials = collect(explode(' ', $namaReviewer))
                    ->filter()
                    ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                    ->take(2)
                    ->implode('');
            @endphp

            <div class="bg-white rounded-[28px] shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition">

                <div class="p-5 md:p-6">

                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-5">

                        <div class="flex gap-4 min-w-0">

                            <div class="w-12 h-12 bg-red-50 rounded-2xl flex items-center justify-center text-red-600 font-black text-lg shrink-0">
                                {{ $initials ?: 'AN' }}
                            </div>

                            <div class="min-w-0">
                                <h4 class="font-black text-gray-900 text-lg break-words">
                                    {{ $namaReviewer }}
                                </h4>

                                <p class="text-sm text-gray-500 break-words">
                                    {{ $item->posisi ?? 'Pelamar' }}
                                    •
                                    <span class="italic text-xs">
                                        {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                                    </span>
                                </p>
                            </div>

                        </div>

                        <div class="shrink-0 inline-flex items-center text-yellow-600 bg-yellow-50 px-4 py-2 rounded-full font-black text-sm">
                            <i class="fas fa-star mr-1"></i>
                            {{ number_format($item->rating, 1) }}
                        </div>

                    </div>

                    <p class="text-gray-700 leading-relaxed break-words">
                        {{ $item->ulasan }}
                    </p>

                    @if(!empty($item->balasan_perusahaan))
                        <div class="mt-6 p-5 bg-red-50 border border-red-100 rounded-3xl">

                            <div class="flex items-center gap-2 mb-3">
                                <i class="fas fa-reply text-red-500"></i>

                                <span class="font-black text-xs text-red-600 uppercase tracking-wider">
                                    Balasan Perusahaan
                                </span>
                            </div>

                            <p class="text-sm md:text-base text-gray-700 leading-relaxed break-words">
                                {{ $item->balasan_perusahaan }}
                            </p>

                        </div>
                    @endif

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[28px] shadow-sm border border-gray-100 p-10 text-center">

                <div class="w-20 h-20 bg-red-50 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-5">
                    ⭐
                </div>

                <h3 class="text-2xl font-black text-gray-900">
                    Belum ada review
                </h3>

                <p class="text-gray-500 mt-2">
                    Jadilah orang pertama yang memberikan ulasan untuk perusahaan ini.
                </p>

            </div>

        @endforelse

    </div>

</main>

@endsection