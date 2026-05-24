@extends('perusahaan.layouts.app')

@section('title', 'Detail Lamaran')

@section('content')

<div class="max-w-5xl mx-auto">

    <a href="{{ route('perusahaan.lamaran.index') }}"
       class="inline-block mb-6 bg-gray-200 text-gray-700 px-5 py-3 rounded-xl font-semibold">
        ← Kembali
    </a>

    <div class="bg-white rounded-3xl shadow p-8">

        <div class="flex items-center gap-5 mb-8">

            <img
                src="{{ $lamaran->user && $lamaran->user->foto_profile
                    ? asset('storage/' . $lamaran->user->foto_profile)
                    : 'https://via.placeholder.com/100' }}"
                class="w-24 h-24 rounded-full object-cover">

            <div>
                <h1 class="text-3xl font-bold text-red-600">
                    {{ $lamaran->user->name ?? '-' }}
                </h1>

                <p class="text-gray-500">
                    {{ $lamaran->user->email ?? '-' }}
                </p>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <h3 class="font-semibold text-gray-700">Lowongan Dilamar</h3>
                <p class="text-lg">{{ $lamaran->loker->judul_loker ?? '-' }}</p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">Status Lamaran</h3>
                <p class="text-lg">{{ $lamaran->status_lamaran ?? 'Dalam Proses' }}</p>
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">CV</h3>

                @if ($lamaran->cv)
                    <a href="{{ asset('storage/' . $lamaran->cv) }}"
                       target="_blank"
                       class="text-blue-600 font-semibold">
                        Download CV
                    </a>
                @else
                    <p>-</p>
                @endif
            </div>

            <div>
                <h3 class="font-semibold text-gray-700">Portfolio</h3>

                @if ($lamaran->portofolio)
                    <a href="{{ $lamaran->portofolio }}"
                       target="_blank"
                       class="text-blue-600 font-semibold">
                        Lihat Portfolio
                    </a>
                @else
                    <p>-</p>
                @endif
            </div>

        </div>

        <div class="mt-8">
            <h3 class="font-semibold text-gray-700 mb-2">Motivasi</h3>
            <p class="text-gray-700 leading-relaxed">
                {{ $lamaran->motivasi ?? 'Tidak ada motivasi.' }}
            </p>
        </div>

    </div>

</div>

@endsection