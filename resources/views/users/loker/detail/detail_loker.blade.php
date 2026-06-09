@extends('users.loker.layouts.app')

@section('content')

@php
    $perusahaan = $loker->profilePerusahaan ?? null;

    $namaPerusahaan = $perusahaan->nama_perusahaan ?? 'Perusahaan';
    $judulLoker = $loker->judul_loker ?? 'Lowongan Kerja';
    $lokasi = $loker->lokasi ?? '-';
    $tipePekerjaan = $loker->tipe_pekerjaan ?? '-';
    $gaji = $loker->gaji ?? 'Kompetitif';
    $deskripsi = $loker->deskripsi ?? '-';

    $tanggalDeadline = $loker->batas_lamaran
        ? \Carbon\Carbon::parse($loker->batas_lamaran)->format('d M Y')
        : '-';

    $tanggalPublish = $loker->created_at
        ? \Carbon\Carbon::parse($loker->created_at)->diffForHumans()
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

    $tentangPerusahaan = $perusahaan->deskripsi ?? 'Informasi perusahaan belum tersedia.';
@endphp

<main class="min-h-screen bg-yellow-50">
    <div class="max-w-6xl mx-auto px-4 md:px-6 py-8">

        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold text-sm shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl font-semibold text-sm shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- HEADER --}}
        <div class="bg-white rounded-3xl border border-yellow-200 shadow-sm overflow-hidden mb-7 transition duration-300 hover:shadow-md">

            <div class="bg-yellow-300 h-28 w-full"></div>

            <div class="px-6 md:px-8 pb-8 -mt-12 relative">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-7">

                    <div class="animate-[fadeIn_.5s_ease-in-out]">
                        <div class="w-24 h-24 bg-white rounded-2xl border-4 border-white shadow-md flex items-center justify-center mb-5">
                            <img src="{{ $logoPerusahaan }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo Perusahaan"
                                 class="w-full h-full rounded-xl object-contain">
                        </div>

                        <p class="text-sm font-bold text-yellow-600 uppercase tracking-wide mb-2">
                            {{ $namaPerusahaan }}
                        </p>

                        <h1 class="text-3xl md:text-4xl font-black text-gray-900 leading-tight">
                            {{ $judulLoker }}
                        </h1>

                        <div class="flex flex-wrap gap-3 mt-5 text-sm text-gray-700">

                            <span class="inline-flex items-center bg-yellow-50 border border-yellow-200 px-4 py-2 rounded-full">
                                <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>
                                {{ $lokasi }}
                            </span>

                            <span class="inline-flex items-center bg-yellow-50 border border-yellow-200 px-4 py-2 rounded-full">
                                <i class="fas fa-briefcase text-red-600 mr-2"></i>
                                {{ $tipePekerjaan }}
                            </span>

                            <span class="inline-flex items-center bg-yellow-50 border border-yellow-200 px-4 py-2 rounded-full">
                                <i class="fas fa-calendar-alt text-red-600 mr-2"></i>
                                Dipublish {{ $tanggalPublish }}
                            </span>

                            <span class="inline-flex items-center bg-yellow-50 border border-yellow-200 px-4 py-2 rounded-full">
                                <i class="fas fa-clock text-red-600 mr-2"></i>
                                Deadline: {{ $tanggalDeadline }}
                            </span>

                        </div>
                    </div>

                    <div class="w-full lg:w-auto">
                        @auth
                            <a href="{{ route('lamaran.create', $loker->id) }}"
                               class="inline-flex w-full lg:w-auto justify-center items-center bg-red-600 hover:bg-red-700 text-white px-9 py-3.5 rounded-2xl font-bold shadow-sm transition duration-300 hover:-translate-y-1">
                                Apply Now
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="inline-flex w-full lg:w-auto justify-center items-center bg-red-600 hover:bg-red-700 text-white px-9 py-3.5 rounded-2xl font-bold shadow-sm transition duration-300 hover:-translate-y-1">
                                Login untuk Apply
                            </a>
                        @endauth
                    </div>

                </div>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-7">

            {{-- LEFT --}}
            <div class="lg:col-span-2 space-y-7">

                <div class="bg-yellow-100/70 p-6 md:p-8 rounded-3xl shadow-sm border border-yellow-300 transition duration-300 hover:shadow-md">
                    <h2 class="text-xl font-black text-gray-900 mb-4 pb-3 border-b border-yellow-300">
                        Job Description
                    </h2>

                    <div class="text-gray-700 leading-relaxed whitespace-pre-line text-sm md:text-base">
                        {{ $deskripsi }}
                    </div>

                    <h2 class="text-xl font-black text-gray-900 mt-8 mb-4 pb-3 border-b border-yellow-300">
                        Job Requirements
                    </h2>

                    <div class="text-gray-700 leading-relaxed text-sm md:text-base">
                        <p>
                            Persyaratan lengkap dapat dilihat pada deskripsi lowongan atau akan diinformasikan oleh perusahaan saat proses seleksi.
                        </p>
                    </div>
                </div>

                <div class="bg-yellow-100/70 p-6 md:p-8 rounded-3xl shadow-sm border border-yellow-300 transition duration-300 hover:shadow-md">
                    <h2 class="text-xl font-black text-gray-900 mb-6 pb-3 border-b border-yellow-300">
                        About the Company
                    </h2>

                    <div class="flex flex-col sm:flex-row items-start gap-5">

                        <div class="w-17 h-17 bg-white rounded-2xl border border-yellow-300 shadow-sm flex-shrink-0 p-2">
                            <img src="{{ $logoPerusahaan }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo"
                                 class="w-16 h-16 rounded-xl object-contain bg-white">
                        </div>

                        <div class="flex-1">
                            <h3 class="font-black text-lg text-gray-900">
                                {{ $namaPerusahaan }}
                            </h3>

                            <p class="text-gray-700 text-sm mt-2 leading-relaxed">
                                {{ $tentangPerusahaan }}
                            </p>

                            <div class="mt-5 pt-5 border-t border-yellow-300">
                                <p class="font-bold text-gray-800 mb-1">
                                    <i class="fas fa-map-marked-alt text-red-600 mr-2"></i>
                                    Alamat Kantor
                                </p>

                                <p class="text-gray-700 text-sm">
                                    {{ $perusahaan->alamat ?? 'Alamat belum ditambahkan oleh perusahaan.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($perusahaan)
                        <a href="{{ route('perusahaan.detail', $loker->perusahaan_id) }}"
                           class="mt-6 inline-flex w-full justify-center py-3 border border-red-600 text-red-600 font-bold rounded-2xl hover:bg-red-600 hover:text-white transition duration-300">
                            Show More
                        </a>
                    @else
                        <a href="{{ route('loker.index') }}"
                           class="mt-6 inline-flex w-full justify-center py-3 border border-red-600 text-red-600 font-bold rounded-2xl hover:bg-red-600 hover:text-white transition duration-300">
                            Show More
                        </a>
                    @endif
                </div>

            </div>

            {{-- SIDEBAR --}}
            <div class="space-y-7">

                <div class="bg-yellow-100 p-6 rounded-3xl shadow-sm border border-yellow-300 transition duration-300 hover:shadow-md">
                    <h2 class="text-lg font-black text-gray-900 mb-5 pb-3 border-b border-yellow-300">
                        Ringkasan Pekerjaan
                    </h2>

                    <div class="space-y-4 text-sm">

                        <div>
                            <p class="text-gray-500 mb-1">Tipe Kontrak</p>
                            <p class="font-bold text-gray-900">
                                {{ $tipePekerjaan }}
                            </p>
                        </div>

                        <div class="border-t border-yellow-300 pt-4">
                            <p class="text-gray-500 mb-1">Gaji</p>
                            <p class="font-bold text-red-600">
                                {{ $gaji }}
                            </p>
                        </div>

                        <div class="border-t border-yellow-300 pt-4">
                            <p class="text-gray-500 mb-1">Deadline</p>
                            <p class="font-bold text-gray-900">
                                {{ $tanggalDeadline }}
                            </p>
                        </div>

                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-yellow-200 text-center transition duration-300 hover:shadow-md">
                    <p class="text-sm font-bold mb-4 text-gray-700">
                        Bagikan lowongan ini
                    </p>

                    <div class="flex justify-center gap-4">
                        <a href="https://web.facebook.com/"
                           class="w-10 h-10 rounded-full bg-yellow-50 border border-yellow-200 flex items-center justify-center text-blue-600 hover:bg-yellow-100 transition">
                            <i class="fab fa-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/"
                           class="w-10 h-10 rounded-full bg-yellow-50 border border-yellow-200 flex items-center justify-center text-pink-500 hover:bg-yellow-100 transition">
                            <i class="fab fa-instagram"></i>
                        </a>

                        <a href="https://web.whatsapp.com/"
                           class="w-10 h-10 rounded-full bg-yellow-50 border border-yellow-200 flex items-center justify-center text-green-500 hover:bg-yellow-100 transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>

                        <a href="{{ route('loker.show', $loker->id) }}"
                           class="w-10 h-10 rounded-full bg-yellow-50 border border-yellow-200 flex items-center justify-center text-gray-600 hover:bg-yellow-100 transition">
                            <i class="fas fa-link"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection