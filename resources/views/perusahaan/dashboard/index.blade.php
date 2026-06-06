@extends('perusahaan.layouts.app')

@section('title', 'Dashboard Perusahaan')

@section('content')

@php
    $profile = \App\Models\ProfilePerusahaan::where('user_id', Auth::id())->first();

    $namaPerusahaan = $profile->nama_perusahaan ?? Auth::user()->name;

    $logoPerusahaan = $profile && $profile->logo
        ? asset('storage/' . $profile->logo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($namaPerusahaan) . '&size=256&background=dc2626&color=ffffff&bold=true';
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

    {{-- HERO --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-xl p-6 sm:p-8 lg:p-10 text-white">

        <div class="absolute -top-14 -right-14 w-56 h-56 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-16 -left-16 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

            <div class="max-w-3xl">
                <p class="text-white/80 font-bold mb-3">
                    Dashboard Perusahaan
                </p>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black leading-tight">
                    Selamat Datang, {{ $namaPerusahaan }} 👋
                </h1>

                <p class="text-white/90 mt-5 text-base sm:text-lg leading-relaxed">
                    Kelola aktivitas perusahaan Anda dengan lebih mudah melalui Loker Seeker.
                    Buat lowongan, pantau lamaran, adakan event, dan bangun citra perusahaan yang profesional.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('perusahaan.lowongan.create') }}"
                       class="bg-white text-red-600 px-6 py-3 rounded-2xl font-black shadow hover:bg-red-50 transition text-center">
                        + Tambah Lowongan
                    </a>

                    <a href="{{ route('perusahaan.event.create') }}"
                       class="bg-black/20 border border-white/50 text-white px-6 py-3 rounded-2xl font-bold hover:bg-black/30 transition text-center">
                        + Tambah Event
                    </a>
                </div>
            </div>

            {{-- LOGO PERUSAHAAN --}}
            <div class="flex justify-center lg:justify-end">
                <div class="bg-white/20 backdrop-blur rounded-[2rem] p-5 border border-white/30 shadow-xl">
                    <img src="{{ $logoPerusahaan }}"
                         alt="{{ $namaPerusahaan }}"
                         class="w-40 h-40 sm:w-48 sm:h-48 lg:w-52 lg:h-52 object-contain bg-white p-5 rounded-[1.5rem] shadow-2xl">
                </div>
            </div>

        </div>
    </div>

    {{-- MENU CEPAT --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <a href="{{ route('perusahaan.lowongan.index') }}"
           class="group bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 hover:shadow-xl hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                📄
            </div>

            <h3 class="text-xl font-black text-gray-800">
                Kelola Lowongan
            </h3>

            <p class="text-gray-500 mt-2 leading-relaxed">
                Buat, ubah, dan atur lowongan pekerjaan perusahaan Anda.
            </p>

            <p class="text-red-600 font-bold mt-5 group-hover:underline">
                Buka Halaman →
            </p>
        </a>

        <a href="{{ route('perusahaan.lamaran.index') }}"
           class="group bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 hover:shadow-xl hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                👥
            </div>

            <h3 class="text-xl font-black text-gray-800">
                Lamaran Masuk
            </h3>

            <p class="text-gray-500 mt-2 leading-relaxed">
                Lihat kandidat yang melamar dan kelola status lamarannya.
            </p>

            <p class="text-orange-600 font-bold mt-5 group-hover:underline">
                Lihat Lamaran →
            </p>
        </a>

        <a href="{{ route('perusahaan.event.index') }}"
           class="group bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 hover:shadow-xl hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                📅
            </div>

            <h3 class="text-xl font-black text-gray-800">
                Kelola Event
            </h3>

            <p class="text-gray-500 mt-2 leading-relaxed">
                Publikasikan event perusahaan dan pantau peserta yang mendaftar.
            </p>

            <p class="text-yellow-600 font-bold mt-5 group-hover:underline">
                Buka Event →
            </p>
        </a>

        <a href="{{ route('perusahaan.profil.index') }}"
           class="group bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 hover:shadow-xl hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                🏢
            </div>

            <h3 class="text-xl font-black text-gray-800">
                Profil Perusahaan
            </h3>

            <p class="text-gray-500 mt-2 leading-relaxed">
                Lengkapi informasi perusahaan agar terlihat lebih terpercaya.
            </p>

            <p class="text-blue-600 font-bold mt-5 group-hover:underline">
                Kelola Profil →
            </p>
        </a>

    </div>

    {{-- CONTENT INFO --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 sm:p-8">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-2xl">
                    💼
                </div>

                <div>
                    <h2 class="text-2xl font-black text-gray-800">
                        Tentang Loker Seeker
                    </h2>
                    <p class="text-gray-500">
                        Platform rekrutmen digital
                    </p>
                </div>
            </div>

            <p class="text-gray-600 leading-relaxed">
                Loker Seeker membantu perusahaan memperluas jangkauan informasi lowongan kerja,
                mempermudah proses penerimaan kandidat, serta mendukung perusahaan dalam membangun
                hubungan yang lebih baik dengan para pencari kerja.
            </p>

            <p class="text-gray-600 leading-relaxed mt-4">
                Melalui dashboard perusahaan, Anda dapat mengelola lowongan, melihat lamaran masuk,
                membuat event, dan memperbarui profil perusahaan dalam satu tempat.
            </p>
        </div>

        <div class="bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 sm:p-8">
            <div class="flex items-center gap-4 mb-5">
                <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-2xl">
                    ✨
                </div>

                <div>
                    <h2 class="text-2xl font-black text-gray-800">
                        Tips untuk Perusahaan
                    </h2>
                    <p class="text-gray-500">
                        Agar proses rekrutmen lebih efektif
                    </p>
                </div>
            </div>

            <div class="space-y-4">

                <div class="flex gap-3">
                    <span class="w-7 h-7 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-black shrink-0">
                        ✓
                    </span>
                    <p class="text-gray-600">
                        Lengkapi profil perusahaan agar pelamar lebih percaya.
                    </p>
                </div>

                <div class="flex gap-3">
                    <span class="w-7 h-7 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-black shrink-0">
                        ✓
                    </span>
                    <p class="text-gray-600">
                        Buat deskripsi lowongan yang jelas dan mudah dipahami.
                    </p>
                </div>

                <div class="flex gap-3">
                    <span class="w-7 h-7 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-black shrink-0">
                        ✓
                    </span>
                    <p class="text-gray-600">
                        Periksa lamaran masuk secara berkala agar kandidat tidak menunggu terlalu lama.
                    </p>
                </div>

                <div class="flex gap-3">
                    <span class="w-7 h-7 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-black shrink-0">
                        ✓
                    </span>
                    <p class="text-gray-600">
                        Gunakan event untuk mengenalkan budaya dan peluang karier di perusahaan Anda.
                    </p>
                </div>

            </div>
        </div>

    </div>

    {{-- QUOTE --}}
    <div class="bg-white rounded-[2rem] shadow-md border border-gray-100 p-6 sm:p-8 text-center">
        <p class="text-2xl sm:text-3xl font-black text-gray-800 leading-relaxed">
            “Perusahaan yang berkembang dimulai dari tim yang tepat.”
        </p>

        <p class="text-gray-500 mt-4">
            Temukan kandidat terbaik dan kelola proses rekrutmen dengan lebih mudah bersama Loker Seeker.
        </p>
    </div>

</div>

@endsection