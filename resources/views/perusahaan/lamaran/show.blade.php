@extends('perusahaan.layouts.app')

@section('title', 'Detail Lamaran')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- BUTTON BACK --}}
    <a href="{{ route('perusahaan.lamaran.index') }}"
       class="inline-flex items-center gap-2 mb-6 bg-white hover:bg-gray-100 text-gray-700 px-4 sm:px-5 py-3 rounded-2xl font-semibold shadow transition text-sm sm:text-base">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

        {{-- HEADER GRADIENT --}}
        <div class="bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 p-6 sm:p-8 text-white">

            @php
                $namaPelamar = $lamaran->nama ?? $lamaran->pelamar->name ?? 'Pelamar';
                $emailPelamar = $lamaran->email ?? $lamaran->pelamar->email ?? '-';

                $foto = $lamaran->foto
                    ? asset('storage/' . $lamaran->foto)
                    : 'https://ui-avatars.com/api/?name=' . urlencode($namaPelamar) . '&background=fee2e2&color=dc2626&bold=true';
            @endphp

            <div class="flex flex-col md:flex-row md:items-center gap-6">

                <div class="flex justify-center md:justify-start">
                    <img
                        src="{{ $foto }}"
                        class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl object-cover border-4 border-white shadow-lg">
                </div>

                <div class="flex-1 text-center md:text-left min-w-0">

                    <p class="text-white/80 font-semibold mb-1 text-sm sm:text-base">
                        Detail Kandidat
                    </p>

                    <h1 class="text-3xl sm:text-4xl font-black break-words">
                        {{ $namaPelamar }}
                    </h1>

                    <p class="text-white/90 mt-2 break-all text-sm sm:text-base">
                        {{ $emailPelamar }}
                    </p>

                </div>

                <div class="flex justify-center md:justify-end">
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
        <div class="p-5 sm:p-8">

            {{-- INFO CARDS --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">

                <div class="bg-red-50 border border-red-100 rounded-3xl p-5 sm:p-6">
                    <p class="text-gray-500 text-sm mb-2">
                        Lowongan Dilamar
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 break-words">
                        {{ $lamaran->loker->judul_loker ?? '-' }}
                    </h3>
                </div>

                <div class="bg-orange-50 border border-orange-100 rounded-3xl p-5 sm:p-6">
                    <p class="text-gray-500 text-sm mb-2">
                        Tanggal Melamar
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold text-gray-800">
                        {{ $lamaran->created_at ? $lamaran->created_at->format('d M Y') : '-' }}
                    </h3>
                </div>

                <div class="bg-yellow-50 border border-yellow-100 rounded-3xl p-5 sm:p-6 sm:col-span-2 lg:col-span-1">
                    <p class="text-gray-500 text-sm mb-2">
                        Status Lamaran
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 capitalize">
                        {{ $lamaran->status_lamaran ?? 'pending' }}
                    </h3>
                </div>

            </div>

            {{-- FILE SECTION --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                {{-- CV --}}
                <div class="border border-gray-100 rounded-3xl p-5 sm:p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-800 text-lg sm:text-xl mb-2">
                        CV Pelamar
                    </h3>

                    <p class="text-gray-500 mb-5 text-sm sm:text-base">
                        Lihat dokumen CV yang dikirim pelamar.
                    </p>

                    @if(!empty($lamaran->cv))
                        <a href="{{ asset('storage/' . $lamaran->cv) }}"
                           target="_blank"
                           class="inline-flex justify-center w-full sm:w-auto bg-blue-100 text-blue-600 px-5 py-3 rounded-2xl font-bold hover:bg-blue-200 transition">
                            Download CV
                        </a>
                    @else
                        <span class="text-gray-400 font-semibold">
                            CV tidak tersedia
                        </span>
                    @endif
                </div>

                {{-- PORTFOLIO --}}
                <div class="border border-gray-100 rounded-3xl p-5 sm:p-6 hover:shadow-md transition">
                    <h3 class="font-bold text-gray-800 text-lg sm:text-xl mb-2">
                        Portfolio
                    </h3>

                    <p class="text-gray-500 mb-5 text-sm sm:text-base">
                        Lihat portfolio atau link karya pelamar.
                    </p>

                    @if(!empty($lamaran->portfolio))

                        @if(Str::startsWith($lamaran->portfolio, ['http://', 'https://']))
                            <a href="{{ $lamaran->portfolio }}"
                               target="_blank"
                               class="inline-flex justify-center w-full sm:w-auto bg-purple-100 text-purple-600 px-5 py-3 rounded-2xl font-bold hover:bg-purple-200 transition">
                                Lihat Portfolio
                            </a>
                        @else
                            <a href="{{ asset('storage/' . $lamaran->portfolio) }}"
                               target="_blank"
                               class="inline-flex justify-center w-full sm:w-auto bg-purple-100 text-purple-600 px-5 py-3 rounded-2xl font-bold hover:bg-purple-200 transition">
                                Download Portfolio
                            </a>
                        @endif

                    @else
                        <span class="text-gray-400 font-semibold">
                            Portfolio tidak tersedia
                        </span>
                    @endif
                </div>

            </div>

            {{-- MOTIVASI --}}
            <div class="bg-gray-50 border border-gray-100 rounded-3xl p-5 sm:p-6">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">
                    Motivasi Pelamar
                </h3>

                <p class="text-gray-700 leading-relaxed whitespace-pre-line text-sm sm:text-base break-words">
                    {{ $lamaran->motivasi ?? 'Tidak ada motivasi.' }}
                </p>
            </div>

        </div>

    </div>

</div>

@endsection