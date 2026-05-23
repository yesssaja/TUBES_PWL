@extends('perusahaan.layouts.app')

@section('title', 'Dashboard Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- WELCOME --}}
    <div class="bg-gradient-to-r from-red-500 to-yellow-400 rounded-3xl shadow-lg p-6 md:p-10 text-white mb-8">

        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-6">

            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-3">
                    Selamat Datang, {{ Auth::user()->name }} 👋
                </h2>

                <p class="text-base md:text-lg opacity-90 max-w-2xl">
                    Kelola lowongan pekerjaan, event perusahaan, dan temukan kandidat terbaik untuk perusahaan Anda.
                </p>

                <div class="mt-6 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('perusahaan.lowongan.create') }}"
                       class="bg-white text-red-600 px-6 py-3 rounded-xl font-bold shadow text-center">
                        + Tambah Lowongan
                    </a>

                    <a href="{{ route('perusahaan.event.create') }}"
                       class="bg-black/20 border border-white px-6 py-3 rounded-xl font-semibold text-center">
                        + Tambah Event
                    </a>
                </div>
            </div>

            <div class="hidden lg:block">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                    class="w-56">
            </div>

        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-red-500">
            <p class="text-gray-500 mb-2">Total Lowongan</p>
            <h2 class="text-4xl font-bold text-red-600">
                {{ $totalLowongan ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-orange-500">
            <p class="text-gray-500 mb-2">Lamaran Masuk</p>
            <h2 class="text-4xl font-bold text-orange-500">
                {{ $totalLamaran ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-green-500">
            <p class="text-gray-500 mb-2">Kandidat Diterima</p>
            <h2 class="text-4xl font-bold text-green-500">
                {{ $totalDiterima ?? 0 }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-blue-500">
            <p class="text-gray-500 mb-2">Event Aktif</p>
            <h2 class="text-4xl font-bold text-blue-500">
                {{ $totalEvent ?? 0 }}
            </h2>
        </div>

    </div>

    {{-- LOWONGAN + LAMARAN --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">

        {{-- LOWONGAN --}}
        <div class="xl:col-span-2 bg-white rounded-2xl shadow p-6">

            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">Lowongan Aktif</h2>
                    <p class="text-gray-500">Daftar lowongan yang sedang berjalan</p>
                </div>

                <a href="{{ route('perusahaan.lowongan.index') }}"
                   class="text-red-600 font-semibold">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-4">

                @forelse($lowongans ?? [] as $loker)

                    <div class="border rounded-2xl p-5 hover:shadow transition">

                        <div class="flex flex-col sm:flex-row sm:justify-between gap-3">

                            <div>
                                <h3 class="font-bold text-xl">
                                    {{ $loker->judul_loker ?? $loker->judul ?? '-' }}
                                </h3>

                                <p class="text-gray-500">
                                    {{ $loker->lokasi ?? '-' }} • {{ $loker->tipe_pekerjaan ?? $loker->tipe ?? '-' }}
                                </p>
                            </div>

                            <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm h-fit w-fit">
                                Aktif
                            </span>

                        </div>

                        <div class="flex justify-between mt-5">
                            <p class="text-gray-600">
                                {{ $loker->lamarans_count ?? 0 }} Pelamar
                            </p>

                            <a href="{{ route('perusahaan.lowongan.show', $loker->id) }}"
                               class="text-red-600 font-semibold">
                                Detail
                            </a>
                        </div>

                    </div>

                @empty

                    <p class="text-gray-500 text-center py-8">
                        Belum ada lowongan aktif.
                    </p>

                @endforelse

            </div>

        </div>

        {{-- LAMARAN TERBARU --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <div class="mb-6">
                <h2 class="text-2xl font-bold">Lamaran Terbaru</h2>
                <p class="text-gray-500">Kandidat terbaru</p>
            </div>

            <div class="space-y-5">

                @forelse($lamarans ?? [] as $lamaran)

                    @php
                        $namaPelamar = $lamaran->nama ?? $lamaran->user->name ?? 'Pelamar';
                        $emailPelamar = $lamaran->email ?? $lamaran->user->email ?? '-';
                    @endphp

                    <div class="flex items-center gap-4">

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($namaPelamar) }}&background=fee2e2&color=dc2626&bold=true"
                            class="w-14 h-14 rounded-full">

                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold truncate">
                                {{ $namaPelamar }}
                            </h3>

                            <p class="text-gray-500 text-sm truncate">
                                {{ $lamaran->loker->judul_loker ?? '-' }}
                            </p>
                        </div>

                    </div>

                @empty

                    <p class="text-gray-500 text-center py-8">
                        Belum ada lamaran masuk.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

    {{-- PROGRESS + EVENT --}}
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

        {{-- PROFILE --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-bold mb-5">
                Kelengkapan Profil Perusahaan
            </h2>

            <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                <div
                    class="bg-red-600 h-4 rounded-full"
                    style="width: {{ $kelengkapanProfil ?? 80 }}%">
                </div>
            </div>

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <div>
                    <h3 class="text-3xl font-bold text-red-600">
                        {{ $kelengkapanProfil ?? 80 }}%
                    </h3>

                    <p class="text-gray-500 mt-2">
                        Lengkapi profil agar lebih dipercaya pelamar.
                    </p>
                </div>

                <a href="{{ route('perusahaan.profil.index') }}"
                   class="bg-red-600 text-white px-5 py-3 rounded-xl font-semibold text-center">
                    Lengkapi
                </a>
            </div>

        </div>

        {{-- EVENT --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">Event Mendatang</h2>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="text-red-600 font-semibold">
                    Lihat Semua →
                </a>
            </div>

            <div class="space-y-5">

                @forelse($events ?? [] as $event)

                    <div class="border rounded-2xl p-5">

                        <h3 class="font-bold text-xl">
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

                    <p class="text-gray-500 text-center py-8">
                        Belum ada event mendatang.
                    </p>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection