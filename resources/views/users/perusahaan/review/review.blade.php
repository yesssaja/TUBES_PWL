@extends('users.perusahaan.layouts.app')

@section('title', 'Company Review | LOKER SEEKER')

@section('content')
@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? 'Perusahaan';

    $logo = $perusahaan->logo ?? null;

    if ($logo) {
        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
            $logoUrl = $logo;
        } else {
            $logoUrl = asset('foto_perusahaan/' . $logo);
        }
    } else {
        $logoUrl = asset('foto_perusahaan/images.png');
    }
@endphp

<style>
    .hero-gradient-bg {
        background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.85), rgba(244, 208, 63, 0.95)), url('{{ asset("perusahaan_1.jpg") }}');
        background-size: cover;
        background-position: center;
    }
</style>

<!-- Hero Section -->
<section class="hero-gradient-bg py-12 -mt-6">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
        <div class="w-28 h-28 bg-white rounded-2xl shadow-xl flex items-center justify-center overflow-hidden border-4 border-white">
            <img src="{{ $logoUrl }}" alt="Logo" class="object-contain w-full p-2">
        </div>
        <div class="text-center md:text-left text-gray-900">
            <h2 class="text-4xl font-extrabold">
                {{ $namaPerusahaan }}
                <i class="fas fa-check-circle text-blue-500 text-2xl"></i>
            </h2>
            <p class="text-xl font-medium opacity-80">{{ $perusahaan->alamat ?? 'Alamat belum diisi' }}</p>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="max-w-5xl mx-auto mt-8 px-4 pb-20">

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
            <p class="text-sm text-gray-500">Berdasarkan {{ $totalReviews }} ulasan</p>
        </div>
        <div class="md:col-span-2 px-4">
            <h3 class="text-lg font-bold text-gray-800 mb-1">Peringkat Kepuasan Kerja</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Review dan ulasan di bawah ini diberikan secara transparan oleh para pelamar maupun mantan karyawan untuk membantu kamu mengetahui kultur kerja di {{ $namaPerusahaan }}.</p>
        </div>
    </div>

    <!-- Filter & Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Ulasan Terbaru</h2>
       <a href="{{ route('review.create', $perusahaan->id) }}"
           class="bg-red-brand text-white px-5 py-2 rounded-lg font-semibold hover:bg-red-600 transition shadow-sm">
            <i class="fas fa-pen-nib mr-2"></i> Tulis Ulasan
        </a>
    </div>

    <!-- Review List -->
    <div class="space-y-6">
        @forelse($reviews as $item)
            @php
                // Mengambil nama reviewer dari kolom 'nama' di database
                $namaReviewer = $item->nama ?? 'Anonim';

                $initials = collect(explode(' ', $namaReviewer))
                    ->filter()
                    ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                    ->take(2)
                    ->implode('');
            @endphp

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-4">
                            <!-- Avatar bulat warna pink estetik -->
                            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-red-brand font-bold text-lg">
                                {{ $initials ?: 'AN' }}
                            </div>
                            <div>
                                <!-- Menampilkan nama reviewer -->
                                <h4 class="font-bold text-gray-800">{{ $namaReviewer }}</h4>
                                <p class="text-sm text-gray-500">
                                    {{ $item->posisi ?? 'Pelamar' }} • <span class="italic text-xs">{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</span>
                                </p>
                            </div>
                        </div>
                        <!-- Menampilkan rating bintang pelamar -->
                        <div class="flex text-yellow-400 text-sm bg-yellow-50 px-3 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> {{ number_format($item->rating, 1) }}
                        </div>
                    </div>

                    <!-- Menampilkan isi ulasan sesuai kolom database 'ulasan' -->
                    <p class="text-gray-700 leading-relaxed">{{ $item->ulasan }}</p>

                    <!-- Menampilkan balasan perusahaan jika ada -->
                    @if($item->balasan_perusahaan)
                        <div class="mt-6 ml-4 md:ml-10 p-4 bg-gray-50 border-l-4 border-red-brand rounded-r-lg">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-reply text-gray-400"></i>
                                <span class="font-bold text-sm text-gray-800 uppercase tracking-wider text-xs">Balasan Perusahaan</span>
                            </div>
                            <p class="text-sm text-gray-600">{{ $item->balasan_perusahaan }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-10 text-center">
                <h3 class="text-2xl font-bold text-gray-800">Belum ada review</h3>
                <p class="text-gray-500 mt-2">Jadilah orang pertama yang memberikan ulasan untuk perusahaan ini.</p>
            </div>
        @endforelse
    </div>

</main>
@endsection