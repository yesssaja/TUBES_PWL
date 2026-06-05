@extends('perusahaan.layouts.app')

@section('title', 'Detail Lowongan')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4">

            <div>

                <h2 class="text-4xl font-bold text-red-600">
                    {{ $lowongan->judul_loker }}
                </h2>

                <p class="text-gray-500 mt-3 text-lg">
                    {{ $lowongan->lokasi }}
                    •
                    {{ $lowongan->tipe_pekerjaan }}
                </p>

            </div>

            <div>
                <span class="bg-green-100 text-green-600 px-5 py-2 rounded-full font-semibold">
                    Aktif
                </span>
            </div>

        </div>

        {{-- INFO --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

            <div class="bg-red-50 rounded-2xl p-5">

                <p class="text-gray-500 text-sm">
                    Gaji
                </p>

                <h3 class="text-xl font-bold mt-2">
                    {{ $lowongan->gaji ?? '-' }}
                </h3>

            </div>

            <div class="bg-blue-50 rounded-2xl p-5">

                <p class="text-gray-500 text-sm">
                    Deadline Lamaran
                </p>

                <h3 class="text-xl font-bold mt-2">
                    {{ $lowongan->batas_lamaran ? $lowongan->batas_lamaran->format('d M Y') : '-' }}
                </h3>

            </div>

            <div class="bg-green-50 rounded-2xl p-5">

                <p class="text-gray-500 text-sm">
                    Jumlah Pelamar
                </p>

                <h3 class="text-xl font-bold mt-2">
                    {{ $lowongan->lamarans->count() }}
                    Pelamar
                </h3>

            </div>

        </div>

        {{-- DESKRIPSI --}}
        <div class="mt-10">

            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                Deskripsi Pekerjaan
            </h3>

            <div class="bg-gray-50 rounded-2xl p-6">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $lowongan->deskripsi }}
                </p>
            </div>

        </div>

        {{-- INFORMASI TAMBAHAN --}}
        <div class="mt-10">

            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                Informasi Lowongan
            </h3>

            <div class="bg-gray-50 rounded-2xl p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <span class="font-semibold text-gray-700">
                            Dibuat:
                        </span>

                        <p class="mt-1">
                            {{ $lowongan->created_at->format('d M Y H:i') }}
                        </p>
                    </div>

                    <div>
                        <span class="font-semibold text-gray-700">
                            Terakhir Diupdate:
                        </span>

                        <p class="mt-1">
                            {{ $lowongan->updated_at->format('d M Y H:i') }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="flex flex-wrap gap-4 mt-10">

            <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold transition">
                Edit Lowongan
            </a>

            <a href="{{ route('perusahaan.lowongan.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-2xl font-semibold transition">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection