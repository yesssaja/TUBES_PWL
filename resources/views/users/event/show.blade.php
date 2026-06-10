@extends('users.layouts.app')

@section('title', $event->nama_event . ' - Detail Event')

@section('content')

@php
    $sudahRsvp = false;

    if (Auth::check()) {
        $sudahRsvp = \App\Models\Rsvp::where('pelamar_id', Auth::id())
            ->where('event_id', $event->id)
            ->exists();
    }

    $jumlahDiterima = \App\Models\Rsvp::where('event_id', $event->id)
        ->where('status_kehadiran', 'hadir')
        ->count();

    $sisaKuota = max(($event->kuota ?? 0) - $jumlahDiterima, 0);
@endphp

<section class="relative overflow-hidden min-h-screen bg-gradient-to-br from-[#2A050A] via-[#4A0E17] to-red-100 pt-28 pb-24 px-4 sm:px-6 text-white">

    <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 left-0 w-96 h-96 bg-red-500/20 rounded-full blur-3xl"></div>

    <div class="relative z-20 max-w-6xl mx-auto">

        {{-- BACK --}}
        <div class="mb-8">
            <a href="{{ route('event.index') }}"
               class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white px-5 py-3 rounded-2xl font-black transition no-underline">
                ← Kembali ke Daftar Event
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.6fr] gap-10 lg:gap-12 items-start">

            {{-- POSTER --}}
            <div class="relative group">

                <div class="absolute -inset-1 bg-gradient-to-br from-red-500 via-orange-400 to-yellow-400 rounded-[34px] blur opacity-30 group-hover:opacity-60 transition duration-700"></div>

                <div class="relative bg-[#2A050A]/90 backdrop-blur-md rounded-[32px] p-4 border border-white/10 shadow-2xl">

                    @if($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}"
                             alt="{{ $event->nama_event }}"
                             class="w-full aspect-[3/4] rounded-[24px] object-cover shadow-xl"
                             onerror="this.onerror=null; this.src='{{ asset($event->poster) }}';">
                    @else
                        <div class="w-full aspect-[3/4] bg-white/5 rounded-[24px] flex flex-col items-center justify-center text-center p-8 border border-dashed border-white/20">
                            <div class="text-6xl mb-4">🎪</div>
                            <p class="text-sm text-gray-300 font-bold">
                                Poster Belum Tersedia
                            </p>
                        </div>
                    @endif

                </div>

            </div>

            {{-- DETAIL --}}
            <div class="space-y-7">

                {{-- TITLE --}}
                <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-[32px] p-6 md:p-8 shadow-2xl">

                    <span class="inline-flex items-center gap-2 bg-yellow-400 text-[#2A050A] px-4 py-2 rounded-full text-xs uppercase tracking-widest font-black mb-5">
                        Detail Informasi Event
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black tracking-tight text-white leading-tight break-words">
                        {{ $event->nama_event }}
                    </h1>

                    <p class="text-yellow-300 font-black text-base md:text-lg mt-4 flex items-center gap-2">
                        By: {{ $event->perusahaan->nama_perusahaan ?? 'Penyelenggara Perusahaan' }}
                    </p>

                </div>

                {{-- INFO GRID --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    <div class="bg-white/10 backdrop-blur-md p-5 rounded-3xl border border-white/10 shadow-lg">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center mb-4 text-2xl">
                            📅
                        </div>

                        <p class="text-xs text-gray-300 font-black uppercase tracking-wider">
                            Tanggal
                        </p>

                        <p class="text-base font-black text-yellow-200 mt-1">
                            {{ $event->tanggal_event ?? $event->tanggal ?? '-' }}
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md p-5 rounded-3xl border border-white/10 shadow-lg">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center mb-4 text-2xl">
                            🕘
                        </div>

                        <p class="text-xs text-gray-300 font-black uppercase tracking-wider">
                            Waktu
                        </p>

                        <p class="text-base font-black text-yellow-200 mt-1">
                            {{ $event->jam ? substr($event->jam, 0, 5) . ' WIB' : ($event->waktu_mulai ? substr($event->waktu_mulai, 0, 5) . ' WIB' : '-') }}
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-md p-5 rounded-3xl border border-white/10 shadow-lg">
                        <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center mb-4 text-2xl">
                            👥
                        </div>

                        <p class="text-xs text-gray-300 font-black uppercase tracking-wider">
                            Kuota
                        </p>

                        <p class="text-base font-black text-yellow-200 mt-1">
                            {{ $sisaKuota }} Peserta
                        </p>
                    </div>

                </div>

                {{-- LOCATION --}}
                <div class="bg-white/10 backdrop-blur-md p-6 rounded-[32px] border border-white/10 shadow-lg">

                    <div class="flex items-start gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-yellow-400 text-[#2A050A] flex items-center justify-center text-2xl shrink-0">
                            📍
                        </div>

                        <div>
                            <p class="text-xs text-gray-300 font-black uppercase tracking-wider">
                                Lokasi Tempat
                            </p>

                            <p class="text-xl md:text-2xl font-black text-white mt-1 leading-relaxed break-words">
                                {{ $event->lokasi ?? 'Lokasi belum tersedia' }}
                            </p>
                        </div>

                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div class="bg-white/10 backdrop-blur-md p-6 md:p-8 rounded-[32px] border border-white/10 shadow-lg">

                    <h3 class="text-xl font-black text-yellow-300 border-b border-white/10 pb-4 mb-5">
                        Deskripsi Event
                    </h3>

                    <div class="text-red-50 leading-relaxed text-base whitespace-pre-line break-words">
                        {!! $event->deskripsi !!}
                    </div>

                </div>

                {{-- BUTTONS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">

    @if($sudahRsvp && !empty($event->link_wa_group))
        <a href="{{ $event->link_wa_group }}"
           target="_blank"
           class="inline-flex items-center justify-center bg-green-600 hover:bg-green-700 text-white font-black text-center px-8 py-4 rounded-2xl transition duration-300 hover:-translate-y-1 shadow-lg no-underline">
            Join WhatsApp Group
        </a>
    @endif

    @if($sudahRsvp)
        <div class="inline-flex items-center justify-center bg-white/10 border border-white/10 text-yellow-300 font-black text-center px-8 py-4 rounded-2xl">
            Kamu sudah RSVP
        </div>
    @else
        <a href="{{ route('rsvp.create', $event->id) }}"
           class="inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-300 text-red-950 font-black text-center px-8 py-4 rounded-2xl transition duration-300 hover:-translate-y-1 shadow-xl no-underline {{ empty($event->link_wa_group) ? 'sm:col-span-2' : '' }}">
            Ambil Tiket RSVP ➔
        </a>
    @endif

</div>

            </div>

        </div>

    </div>

</section>

@endsection