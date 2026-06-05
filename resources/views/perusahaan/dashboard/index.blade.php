@extends('perusahaan.layouts.app')

@section('title', 'Dashboard Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- WELCOME --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-10 text-white">

        <div class="relative z-10 flex flex-col lg:flex-row lg:justify-between lg:items-center gap-8">

            <div class="max-w-3xl">
                <p class="text-white/80 font-semibold mb-2">
                    Dashboard Perusahaan
                </p>

                <h2 class="text-3xl md:text-5xl font-extrabold leading-tight mb-4">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h2>

                <p class="text-base md:text-lg text-white/90">
                    Kelola lowongan pekerjaan, event perusahaan, dan pantau kandidat terbaik untuk perusahaan Anda.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('perusahaan.lowongan.create') }}"
                       class="bg-white text-red-600 px-6 py-3 rounded-xl font-bold shadow hover:bg-gray-100 transition text-center">
                        + Tambah Lowongan
                    </a>

                    <a href="{{ route('perusahaan.event.create') }}"
                       class="bg-black/20 border border-white/60 px-6 py-3 rounded-xl font-semibold hover:bg-black/30 transition text-center">
                        + Tambah Event
                    </a>
                </div>
            </div>

            <div class="hidden lg:block">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                     class="w-56 drop-shadow-2xl">
            </div>

        </div>

        <div class="absolute -right-16 -bottom-16 w-64 h-64 bg-white/20 rounded-full"></div>
        <div class="absolute right-32 -top-20 w-40 h-40 bg-white/10 rounded-full"></div>
    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
            <p class="text-gray-500 mb-3">Total Lowongan</p>
            <h2 class="text-4xl font-extrabold text-red-600">
                {{ $totalLowongan ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
            <p class="text-gray-500 mb-3">Lamaran Masuk</p>
            <h2 class="text-4xl font-extrabold text-orange-500">
                {{ $totalLamaran ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
            <p class="text-gray-500 mb-3">Kandidat Diterima</p>
            <h2 class="text-4xl font-extrabold text-green-600">
                {{ $totalDiterima ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100 hover:shadow-lg transition">
            <p class="text-gray-500 mb-3">Event Aktif</p>
            <h2 class="text-4xl font-extrabold text-blue-600">
                {{ $totalEvent ?? 0 }}
            </h2>
        </div>

    </div>

    {{-- LOWONGAN + LAMARAN --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        {{-- LOWONGAN --}}
        <div class="xl:col-span-2 bg-white rounded-3xl shadow-md border border-gray-100 p-6">

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-800">
                        Lowongan Aktif
                    </h2>
                    <p class="text-gray-500">
                        Daftar lowongan yang sedang berjalan
                    </p>
                </div>

                <a href="{{ route('perusahaan.lowongan.index') }}"
                   class="text-red-600 font-bold hover:underline">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-4">

                @forelse($lowongans ?? [] as $loker)

                    <div class="border border-gray-100 rounded-2xl p-5 hover:shadow-md transition bg-gray-50/50">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">

                            <div>
                                <h3 class="font-bold text-xl text-gray-800">
                                    {{ $loker->judul_loker ?? $loker->judul ?? '-' }}
                                </h3>

                                <p class="text-gray-500 mt-1">
                                    {{ $loker->lokasi ?? '-' }} • {{ $loker->tipe_pekerjaan ?? $loker->tipe ?? '-' }}
                                </p>
                            </div>

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold h-fit w-fit">
                                Aktif
                            </span>

                        </div>

                        <div class="flex justify-between items-center mt-5 pt-4 border-t border-gray-200">
                            <p class="text-gray-600">
                                {{ $loker->lamarans_count ?? 0 }} Pelamar
                            </p>

                            <a href="{{ route('perusahaan.lowongan.show', $loker->id) }}"
                               class="text-red-600 font-bold hover:underline">
                                Detail
                            </a>
                        </div>

                    </div>

                @empty

                    <div class="text-center py-10">
                        <p class="text-gray-500">
                            Belum ada lowongan aktif.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

        {{-- LAMARAN TERBARU --}}
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">

            <div class="mb-6">
                <h2 class="text-2xl font-extrabold text-gray-800">
                    Lamaran Terbaru
                </h2>
                <p class="text-gray-500">
                    Kandidat terbaru yang melamar
                </p>
            </div>

            <div class="space-y-5">

                @forelse($lamarans ?? [] as $lamaran)

                    @php
                        $namaPelamar = $lamaran->nama ?? $lamaran->user->name ?? 'Pelamar';
                    @endphp

                    <div class="flex items-center gap-4 p-3 rounded-2xl hover:bg-gray-50 transition">

                        <img src="https://ui-avatars.com/api/?name={{ urlencode($namaPelamar) }}&background=fee2e2&color=dc2626&bold=true"
                             class="w-14 h-14 rounded-full shadow">

                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-gray-800 truncate">
                                {{ $namaPelamar }}
                            </h3>

                            <p class="text-gray-500 text-sm truncate">
                                {{ $lamaran->loker->judul_loker ?? '-' }}
                            </p>
                        </div>

                    </div>

                @empty

                    <div class="text-center py-10">
                        <p class="text-gray-500">
                            Belum ada lamaran masuk.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- PROFIL + EVENT --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

        {{-- PROFILE --}}
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">

            <h2 class="text-2xl font-extrabold text-gray-800 mb-5">
                Kelengkapan Profil Perusahaan
            </h2>

            <div class="w-full bg-gray-200 rounded-full h-4 mb-4 overflow-hidden">
                <div class="bg-gradient-to-r from-red-600 to-orange-500 h-4 rounded-full"
                     style="width: {{ $kelengkapanProfil ?? 80 }}%">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-5">
                <div>
                    <h3 class="text-4xl font-extrabold text-red-600">
                        {{ $kelengkapanProfil ?? 80 }}%
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Lengkapi profil agar perusahaan lebih dipercaya pelamar.
                    </p>
                </div>

                <a href="{{ route('perusahaan.profil.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold text-center transition">
                    Lengkapi Profil
                </a>
            </div>

        </div>

        {{-- EVENT --}}
        <div class="bg-white rounded-3xl shadow-md border border-gray-100 p-6">

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-800">
                        Event Mendatang
                    </h2>
                    <p class="text-gray-500">
                        Event perusahaan yang akan berjalan
                    </p>
                </div>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="text-red-600 font-bold hover:underline">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-5">

                @forelse($events ?? [] as $event)

                    <div class="border border-gray-100 rounded-2xl p-5 bg-gray-50/50 hover:shadow-md transition">

                        <h3 class="font-bold text-xl text-gray-800">
                            {{ $event->nama_event ?? '-' }}
                        </h3>

                        <p class="text-gray-500 mt-2">
                            {{ $event->tanggal_event ?? '-' }} • {{ $event->lokasi ?? '-' }}
                        </p>

                        <p class="mt-3 text-sm text-gray-600">
                            {{ method_exists($event, 'rsvps') ? $event->rsvps()->count() : 0 }} peserta telah RSVP
                        </p>

                    </div>

                @empty

                    <div class="text-center py-10">
                        <p class="text-gray-500">
                            Belum ada event mendatang.
                        </p>
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection