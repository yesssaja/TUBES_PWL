@extends('perusahaan.layouts.app')

@section('title', 'Detail RSVP')

@section('content')

@php
    $nama = $rsvp->name ?? $rsvp->nama ?? $rsvp->user->name ?? 'Peserta';
    $email = $rsvp->email ?? $rsvp->user->email ?? '-';
    $hp = $rsvp->hp ?? $rsvp->no_hp ?? '-';

    $namaEvent = $rsvp->event->nama_event ?? '-';
    $tanggalEvent = $rsvp->event->tanggal_event ?? '-';
    $lokasiEvent = $rsvp->event->lokasi ?? '-';

    $status = $rsvp->status_kehadiran ?? $rsvp->status ?? 'pending';

    $alasan = $rsvp->alasan
        ?? $rsvp->motivasi
        ?? $rsvp->catatan
        ?? 'Tidak ada alasan yang ditulis.';

    $avatar = 'https://ui-avatars.com/api/?name=' . urlencode($nama) . '&background=fee2e2&color=dc2626&bold=true';
@endphp

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Detail RSVP
            </h1>

            <p class="text-gray-500 mt-2">
                Informasi lengkap peserta event.
            </p>
        </div>

        <a href="{{ route('perusahaan.rsvp.index') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold transition">
            ← Kembali
        </a>

    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        {{-- TOP --}}
        <div class="bg-gradient-to-r from-red-600 to-orange-400 p-8 text-white">

            <div class="flex flex-col md:flex-row md:items-center gap-6">

                <img
                    src="{{ $avatar }}"
                    class="w-28 h-28 rounded-3xl object-cover bg-white p-1 shadow">

                <div class="min-w-0">

                    <h2 class="text-3xl md:text-4xl font-black break-words">
                        {{ $nama }}
                    </h2>

                    <p class="text-white/90 mt-2 break-all">
                        {{ $email }}
                    </p>

                    <p class="text-white/90 mt-1">
                        {{ $hp }}
                    </p>

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-6 md:p-8">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                {{-- EVENT --}}
                <div class="bg-red-50 rounded-2xl p-5 min-w-0">

                    <h3 class="font-bold text-gray-700 mb-2">
                        Event
                    </h3>

                    <p class="text-xl font-bold text-red-600 break-words">
                        {{ $namaEvent }}
                    </p>

                    <p class="text-gray-500 mt-1 break-words">
                        {{ $tanggalEvent }} • {{ $lokasiEvent }}
                    </p>

                </div>

                {{-- STATUS --}}
                <div class="bg-gray-50 rounded-2xl p-5">

                    <h3 class="font-bold text-gray-700 mb-2">
                        Status RSVP
                    </h3>

                    @if($status == 'diterima' || $status == 'hadir')
                        <span class="inline-block bg-green-100 text-green-700 px-5 py-2 rounded-full text-sm font-bold">
                            Diterima
                        </span>
                    @elseif($status == 'ditolak' || $status == 'tidak hadir')
                        <span class="inline-block bg-red-100 text-red-700 px-5 py-2 rounded-full text-sm font-bold">
                            Ditolak
                        </span>
                    @else
                        <span class="inline-block bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full text-sm font-bold">
                            Pending
                        </span>
                    @endif

                </div>

            </div>

            {{-- ALASAN --}}
            <div class="bg-white border rounded-2xl p-6 mb-8">

                <h3 class="font-bold text-gray-800 text-xl mb-3">
                    Alasan Mengikuti Event
                </h3>

                <p class="text-gray-700 leading-relaxed whitespace-pre-line break-words">
                    {{ $alasan }}
                </p>

            </div>

            {{-- BUTTON --}}
            @if($status == 'pending')
                <div class="flex flex-col sm:flex-row gap-4">

                    <form action="{{ route('perusahaan.rsvp.approve', $rsvp->id) }}"
                          method="POST"
                          class="w-full sm:w-auto">
                        @csrf
                        @method('PUT')

                        <button class="w-full bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-2xl font-bold shadow transition">
                            Terima RSVP
                        </button>
                    </form>

                    <form action="{{ route('perusahaan.rsvp.reject', $rsvp->id) }}"
                          method="POST"
                          class="w-full sm:w-auto">
                        @csrf
                        @method('PUT')

                        <button class="w-full bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow transition">
                            Tolak RSVP
                        </button>
                    </form>

                </div>
            @else
                <div class="bg-gray-100 text-gray-600 px-5 py-4 rounded-2xl font-semibold">
                    RSVP ini sudah diproses.
                </div>
            @endif

        </div>

    </div>

</div>

@endsection