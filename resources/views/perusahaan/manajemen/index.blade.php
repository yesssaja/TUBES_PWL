@extends('perusahaan.layouts.app')

@section('title', 'Manajemen Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HERO --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-2xl p-8 mb-8 text-white">
        <div class="absolute -top-16 -right-16 w-52 h-52 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-16 -left-16 w-52 h-52 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative">
            <p class="font-bold text-white/90 mb-2">
                Dashboard Perusahaan
            </p>

            <h1 class="text-4xl sm:text-5xl font-black leading-tight">
                Manajemen Perusahaan
            </h1>

            <p class="text-white/90 mt-4 text-lg max-w-2xl">
                Pantau informasi, aktivitas, dan performa perusahaan Anda dalam satu halaman.
            </p>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                💼
            </div>

            <p class="text-gray-500 text-lg font-semibold">Total Lowongan</p>

            <h2 class="text-5xl font-black text-red-600 mt-4">
                {{ $totalLowongan }}
            </h2>
        </div>

        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                📩
            </div>

            <p class="text-gray-500 text-lg font-semibold">Lamaran Masuk</p>

            <h2 class="text-5xl font-black text-red-600 mt-4">
                {{ $totalLamaran }}
            </h2>
        </div>

        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                🎤
            </div>

            <p class="text-gray-500 text-lg font-semibold">Event Dibuat</p>

            <h2 class="text-5xl font-black text-red-600 mt-4">
                {{ $totalEvent }}
            </h2>
        </div>

        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 hover:-translate-y-1 transition">
            <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-5">
                ⭐
            </div>

            <p class="text-gray-500 text-lg font-semibold">Review Perusahaan</p>

            <h2 class="text-5xl font-black text-red-600 mt-4">
                {{ number_format($ratingReview, 1) }}
            </h2>
        </div>

    </div>

    {{-- INFORMASI + KELENGKAPAN PROFIL --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">

        {{-- INFORMASI PERUSAHAAN --}}
        <div class="xl:col-span-2 bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 sm:p-8 break-words">

            <h2 class="text-3xl font-black text-gray-800 mb-2">
                Informasi Perusahaan
            </h2>

            <p class="text-gray-500 mb-8 text-lg">
                Kelola identitas dan status perusahaan Anda.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="bg-gray-50 rounded-3xl p-5">
                    <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-2">
                        Nama Perusahaan
                    </p>

                    <h3 class="text-2xl font-black text-gray-800 break-words">
                        {{ $profile->nama_perusahaan ?? '-' }}
                    </h3>
                </div>

                <div class="bg-gray-50 rounded-3xl p-5">
                    <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-2">
                        Email
                    </p>

                    <h3 class="text-xl font-bold text-gray-800 break-all">
                        {{ Auth::user()->email }}
                    </h3>
                </div>

                <div class="bg-gray-50 rounded-3xl p-5">
                    <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-2">
                        Website
                    </p>

                    <h3 class="text-xl font-bold text-gray-800 break-all">
                        {{ $profile->website ?? '-' }}
                    </h3>
                </div>

                <div class="bg-gray-50 rounded-3xl p-5">
                    <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-2">
                        Alamat
                    </p>

                    <h3 class="text-xl font-bold text-gray-800 break-words">
                        {{ $profile->alamat ?? '-' }}
                    </h3>
                </div>

            </div>

        </div>

        {{-- KELENGKAPAN PROFIL --}}
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 sm:p-8">

            <h2 class="text-3xl font-black text-gray-800 mb-6">
                Kelengkapan Profil
            </h2>

            <div class="w-full bg-gray-200 rounded-full h-5 overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-yellow-400 h-full rounded-full transition-all"
                     style="width: {{ $kelengkapan }}%">
                </div>
            </div>

            <h3 class="text-5xl font-black text-red-600 mt-6">
                {{ $kelengkapan }}%
            </h3>

            <p class="text-gray-500 mt-4 text-lg leading-relaxed">
                Lengkapi profil perusahaan untuk meningkatkan kepercayaan pelamar.
            </p>

            <a href="{{ route('perusahaan.profil.index') }}"
               class="mt-8 inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-lg transition">
                Lengkapi Profil
            </a>

        </div>

    </div>

    {{-- AKTIVITAS + QUICK ACTION --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        {{-- AKTIVITAS TERBARU --}}
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 sm:p-8">

            <h2 class="text-2xl font-black text-gray-800 mb-6">
                Aktivitas Terbaru
            </h2>

            <div class="space-y-5">
                @forelse($aktivitas as $item)

                    <div class="flex gap-4 border-b border-gray-100 pb-5 last:border-b-0 last:pb-0">
                        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center shrink-0">
                            🔔
                        </div>

                        <div>
                            <h3 class="font-black text-gray-800">
                                {{ $item['judul'] }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                {{ $item['waktu'] }}
                            </p>
                        </div>
                    </div>

                @empty

                    <div class="bg-gray-50 rounded-3xl p-8 text-center">
                        <div class="w-16 h-16 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-4 text-3xl">
                            📭
                        </div>

                        <p class="text-gray-500 font-semibold">
                            Belum ada aktivitas terbaru.
                        </p>
                    </div>

                @endforelse
            </div>

        </div>

        {{-- QUICK ACTION --}}
        <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6 sm:p-8">

            <h2 class="text-2xl font-black text-gray-800 mb-6">
                Quick Action
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <a href="{{ route('perusahaan.lowongan.create') }}"
                   class="group bg-red-600 hover:bg-red-700 text-white p-6 rounded-3xl font-black shadow-lg transition">
                    <div class="text-3xl mb-4">➕</div>
                    <p>Tambah Lowongan</p>
                </a>

                <a href="{{ route('perusahaan.event.create') }}"
                   class="group bg-gradient-to-br from-orange-500 to-yellow-400 hover:from-orange-600 hover:to-yellow-500 text-white p-6 rounded-3xl font-black shadow-lg transition">
                    <div class="text-3xl mb-4">🎤</div>
                    <p>Tambah Event</p>
                </a>

                <a href="{{ route('perusahaan.lamaran.index') }}"
                   class="bg-gray-900 hover:bg-black text-white p-6 rounded-3xl font-black shadow-lg transition sm:col-span-2">
                    <div class="text-3xl mb-4">📩</div>
                    <p>Lihat Lamaran Masuk</p>
                </a>

            </div>

        </div>

    </div>

</div>

@endsection