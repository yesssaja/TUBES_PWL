@extends('perusahaan.layouts.app')

@section('title', 'Detail Lamaran')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- BUTTON BACK --}}
    <a href="{{ route('perusahaan.lamaran.index') }}"
       class="inline-flex items-center gap-2 mb-6 bg-white hover:bg-gray-100 text-gray-700 px-5 py-3 rounded-2xl font-semibold shadow transition">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        {{-- HEADER GRADIENT --}}
        <div class="bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 p-8 text-white">

            @php
                $namaPelamar = $lamaran->nama ?? $lamaran->user->name ?? 'Pelamar';
                $emailPelamar = $lamaran->email ?? $lamaran->user->email ?? '-';

                $foto = $lamaran->foto
                    ? asset('storage/' . $lamaran->foto)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($namaPelamar) . '&background=fee2e2&color=dc2626&bold=true';
            @endphp

            <div class="flex flex-col md:flex-row md:items-center gap-6">

                <img
                    src="{{ $foto }}"
                    class="w-28 h-28 rounded-3xl object-cover border-4 border-white shadow-lg">

                <div class="flex-1">

                    <p class="text-white/80 font-semibold mb-1">
                        Detail Kandidat
                    </p>

                    <h1 class="text-4xl font-black">
                        {{ $namaPelamar }}
                    </h1>

                    <p class="text-white/90 mt-2">
                        {{ $emailPelamar }}
                    </p>

                </div>

                <div>
                    @if($lamaran->status_lamaran == 'diterima')
                        <span class="bg-white text-green-600 px-5 py-3 rounded-full text-sm font-bold shadow">
                            Diterima
                        </span>
                    @elseif($lamaran->status_lamaran == 'ditolak')
                        <span class="bg-white text-red-600 px-5 py-3 rounded-full text-sm font-bold shadow">
                            Ditolak
                        </span>
                    @else
                        <span class="bg-white text-yellow-600 px-5 py-3 rounded-full text-sm font-bold shadow">
                            Pending
                        </span>
                    @endif
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-8">

            {{-- INFO CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                <div class="bg-red-50 border border-red-100 rounded-3xl p-6">
                    <p class="text-gray-500 text-sm mb-2">
                        Lowongan Dilamar
                    </p>

                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $lamaran->loker->judul_loker ?? '-' }}
                    </h3>
                </div>

                <div class="bg-orange-50 border border-orange-100 rounded-3xl p-6">
                    <p class="text-gray-500 text-sm mb-2">
                        Tanggal Melamar
                    </p>

                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $lamaran->created_at ? $lamaran->created_at->format('d M Y') : '-' }}
                    </h3>
                </div>

                <div class="bg-yellow-50 border border-yellow-100 rounded-3xl p-6">
                    <p class="text-gray-500 text-sm mb-2">
                        Status Lamaran
                    </p>

                    <h3 class="text-xl font-bold text-gray-800 capitalize">
                        {{ $lamaran->status_lamaran ?? 'pending' }}
                    </h3>
                </div>

            </div>

            {{-- FILE SECTION --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                <div class="border border-gray-100 rounded-3xl p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-800 text-xl mb-2">
                        CV Pelamar
                    </h3>

                    <p class="text-gray-500 mb-5">
                        Lihat dokumen CV yang dikirim pelamar.
                    </p>

                    @if($lamaran->cv)
                        <a href="{{ asset('storage/' . $lamaran->cv) }}"
                           target="_blank"
                           class="inline-flex bg-blue-100 text-blue-600 px-5 py-3 rounded-2xl font-bold hover:bg-blue-200 transition">
                            Download CV
                        </a>
                    @else
                        <span class="text-gray-400 font-semibold">
                            CV tidak tersedia
                        </span>
                    @endif
                </div>

                <div class="border border-gray-100 rounded-3xl p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-800 text-xl mb-2">
                        Portfolio
                    </h3>

                    <p class="text-gray-500 mb-5">
                        Lihat portfolio atau link karya pelamar.
                    </p>

                    @if($lamaran->portfolio)
                        <a href="{{ $lamaran->portfolio }}"
                           target="_blank"
                           class="inline-flex bg-purple-100 text-purple-600 px-5 py-3 rounded-2xl font-bold hover:bg-purple-200 transition">
                            Lihat Portfolio
                        </a>
                    @else
                        <span class="text-gray-400 font-semibold">
                            Portfolio tidak tersedia
                        </span>
                    @endif
                </div>

            </div>

            {{-- MOTIVASI --}}
            <div class="bg-gray-50 border border-gray-100 rounded-3xl p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">
                    Motivasi Pelamar
                </h3>

                <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $lamaran->motivasi ?? 'Tidak ada motivasi.' }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection