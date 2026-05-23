@extends('perusahaan.layouts.app')

@section('title', 'Manajemen Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Manajemen Perusahaan
        </h1>

        <p class="text-gray-500 mt-2">
            Pantau informasi, aktivitas, dan performa perusahaan Anda.
        </p>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow p-6 min-w-0">
            <p class="text-gray-500 text-lg">Total Lowongan</p>
            <h2 class="text-5xl font-black text-red-600 mt-4">12</h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 min-w-0">
            <p class="text-gray-500 text-lg">Lamaran Masuk</p>
            <h2 class="text-5xl font-black text-red-600 mt-4">248</h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 min-w-0">
            <p class="text-gray-500 text-lg">Event Dibuat</p>
            <h2 class="text-5xl font-black text-red-600 mt-4">5</h2>
        </div>

        <div class="bg-white rounded-3xl shadow p-6 min-w-0">
            <p class="text-gray-500 text-lg">Review Perusahaan</p>
            <h2 class="text-5xl font-black text-red-600 mt-4">4.8</h2>
        </div>

    </div>

    {{-- INFORMASI + PROFILE --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">

        {{-- INFORMASI --}}
        <div class="xl:col-span-2 bg-white rounded-3xl shadow p-6 min-w-0 break-words">

            <h2 class="text-3xl font-black text-gray-800 mb-2">
                Informasi Perusahaan
            </h2>

            <p class="text-gray-500 mb-8 text-lg">
                Kelola identitas dan status perusahaan Anda.
            </p>

            <div class="space-y-6">

                <div>
                    <p class="text-gray-500 text-sm mb-1">Nama Perusahaan</p>
                    <h3 class="text-2xl font-bold break-words">
                        PT Shopee Indonesia
                    </h3>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">Email</p>
                    <h3 class="text-xl font-semibold break-all">
                        shopee@gmail.com
                    </h3>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">Website</p>
                    <h3 class="text-xl font-semibold break-all">
                        shopee.com
                    </h3>
                </div>

                <div>
                    <p class="text-gray-500 text-sm mb-1">Alamat</p>
                    <h3 class="text-xl font-semibold break-words">
                        Jakarta, Indonesia
                    </h3>
                </div>

            </div>

        </div>

        {{-- KELENGKAPAN PROFIL --}}
        <div class="bg-white rounded-3xl shadow p-6 min-w-0">

            <h2 class="text-3xl font-black text-gray-800 mb-6">
                Kelengkapan Profil
            </h2>

            <div class="w-full bg-gray-200 rounded-full h-5 overflow-hidden">
                <div class="bg-red-600 h-full rounded-full" style="width: 80%"></div>
            </div>

            <h3 class="text-5xl font-black text-red-600 mt-6">
                80%
            </h3>

            <p class="text-gray-500 mt-4 text-lg leading-relaxed">
                Lengkapi profil perusahaan untuk meningkatkan kepercayaan pelamar.
            </p>

            <a href="{{ route('perusahaan.profil.index') }}"
               class="mt-8 inline-block w-full text-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-bold transition">
                Lengkapi Profil
            </a>

        </div>

    </div>

    {{-- AKTIVITAS + QUICK ACTION --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

        {{-- AKTIVITAS TERBARU --}}
        <div class="bg-white rounded-3xl shadow p-6 min-w-0">

            <h2 class="text-2xl font-black text-gray-800 mb-6">
                Aktivitas Terbaru
            </h2>

            <div class="space-y-5">

                <div class="border-b pb-4">
                    <h3 class="font-bold text-gray-800">
                        Lowongan UI/UX Designer berhasil dipublish
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        10 menit yang lalu
                    </p>
                </div>

                <div class="border-b pb-4">
                    <h3 class="font-bold text-gray-800">
                        5 pelamar baru masuk untuk Backend Developer
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        1 jam yang lalu
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-gray-800">
                        Event Seminar Karier berhasil dibuat
                    </h3>
                    <p class="text-gray-500 text-sm mt-1">
                        Kemarin
                    </p>
                </div>

            </div>

        </div>

        {{-- QUICK ACTION --}}
        <div class="bg-white rounded-3xl shadow p-6 min-w-0">

            <h2 class="text-2xl font-black text-gray-800 mb-6">
                Quick Action
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <a href="{{ route('perusahaan.lowongan.create') }}"
                   class="bg-red-600 hover:bg-red-700 text-white p-6 rounded-2xl text-center font-bold transition">
                    + Tambah Lowongan
                </a>

                <a href="{{ route('perusahaan.event.create') }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white p-6 rounded-2xl text-center font-bold transition">
                    + Tambah Event
                </a>

                <a href="{{ route('perusahaan.lamaran.index') }}"
                   class="bg-gray-800 hover:bg-gray-900 text-white p-6 rounded-2xl text-center font-bold transition sm:col-span-2">
                    Lihat Lamaran Masuk
                </a>

            </div>

        </div>

    </div>

</div>

@endsection