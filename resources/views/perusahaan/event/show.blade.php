@extends('perusahaan.layouts.app')

@section('title', 'Detail Event')

@section('content')

@php
    $namaEvent = $event->nama_event
        ?? $event->judul_event
        ?? $event->title
        ?? '-';

    $tanggalEvent = $event->tanggal_event
        ?? $event->tanggal
        ?? $event->date
        ?? '-';

    $jamEvent = $event->jam
        ?? $event->jam_event
        ?? $event->time
        ?? '-';

    $lokasiEvent = $event->lokasi
        ?? $event->location
        ?? '-';

    $kuotaEvent = (int) ($event->kuota ?? $event->quota ?? 0);

    $deskripsiEvent = $event->deskripsi
        ?? $event->description
        ?? 'Tidak ada deskripsi.';

    $jumlahRsvp = method_exists($event, 'rsvps') ? $event->rsvps()->count() : 0;

    $jumlahHadir = method_exists($event, 'rsvps')
        ? $event->rsvps()->where('status_kehadiran', 'hadir')->count()
        : 0;

    $statusEvent = ($kuotaEvent > 0 && $jumlahHadir >= $kuotaEvent)
        ? 'tidak_aktif'
        : ($event->status ?? 'aktif');

    $persentase = $kuotaEvent > 0 ? min(100, round(($jumlahHadir / $kuotaEvent) * 100)) : 0;

    if (!empty($event->poster)) {
        if (
            str_starts_with($event->poster, 'http://') ||
            str_starts_with($event->poster, 'https://')
        ) {
            $posterEvent = $event->poster;
        } elseif (str_starts_with($event->poster, 'poster_event/')) {
            $posterEvent = asset('storage/' . $event->poster);
        } elseif (str_starts_with($event->poster, 'images/')) {
            $posterEvent = asset($event->poster);
        } else {
            $posterEvent = file_exists(public_path('images/' . $event->poster))
                ? asset('images/' . $event->poster)
                : asset('storage/' . $event->poster);
        }
    } else {
        $posterEvent = asset('images/default-event.jpg');
    }
@endphp

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        <div class="min-w-0">
            <h1 class="text-2xl md:text-3xl font-black text-gray-900 break-words">
                Detail Event
            </h1>

            <p class="text-gray-500 mt-2 break-words">
                Informasi lengkap event perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.event.index') }}"
           class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-3 rounded-2xl font-bold transition w-full sm:w-auto">
            Kembali
        </a>

    </div>

    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

        <div class="relative min-h-[360px] md:min-h-[420px] bg-gray-100">

            <img src="{{ $posterEvent }}"
                 alt="{{ $namaEvent }}"
                 onerror="this.onerror=null; this.src='{{ asset('images/default-event.jpg') }}'"
                 class="absolute inset-0 w-full h-full object-cover">

            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-black/10"></div>

            <div class="absolute inset-x-0 bottom-0 p-5 sm:p-8 text-white">

                @if($statusEvent == 'aktif')
                    <span class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                        Aktif
                    </span>
                @elseif($statusEvent == 'selesai')
                    <span class="inline-block bg-gray-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                        Selesai
                    </span>
                @elseif($statusEvent == 'ditunda')
                    <span class="inline-block bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                        Ditunda
                    </span>
                @elseif($statusEvent == 'tidak_aktif')
                    <span class="inline-block bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold">
                        Tidak Aktif
                    </span>
                @else
                    <span class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                        {{ ucfirst($statusEvent) }}
                    </span>
                @endif

                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black mt-4 leading-tight break-words max-w-5xl">
                    {{ $namaEvent }}
                </h2>

                <p class="text-white/90 mt-3 text-base md:text-lg leading-relaxed break-words max-w-3xl">
                    {{ Str::limit($deskripsiEvent, 140) }}
                </p>

            </div>

        </div>

        <div class="p-5 sm:p-6 md:p-8">

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

                <div class="bg-red-50 rounded-3xl p-5 min-w-0">
                    <p class="text-gray-500 font-semibold">
                        Tanggal
                    </p>

                    <h3 class="text-xl md:text-2xl font-black text-red-600 mt-3 break-words">
                        {{ $tanggalEvent }}
                    </h3>
                </div>

                <div class="bg-orange-50 rounded-3xl p-5 min-w-0">
                    <p class="text-gray-500 font-semibold">
                        Jam
                    </p>

                    <h3 class="text-xl md:text-2xl font-black text-orange-500 mt-3 break-words">
                        {{ $jamEvent }} WIB
                    </h3>
                </div>

                <div class="bg-blue-50 rounded-3xl p-5 min-w-0">
                    <p class="text-gray-500 font-semibold">
                        Lokasi
                    </p>

                    <h3 class="text-xl md:text-2xl font-black text-blue-600 mt-3 break-words">
                        {{ $lokasiEvent }}
                    </h3>
                </div>

                <div class="bg-green-50 rounded-3xl p-5 min-w-0">
                    <p class="text-gray-500 font-semibold">
                        Kuota
                    </p>

                    <h3 class="text-xl md:text-2xl font-black text-green-600 mt-3 break-words">
                        {{ $kuotaEvent }} Peserta
                    </h3>
                </div>

            </div>

            <div class="bg-gray-50 rounded-3xl p-5 sm:p-6 mb-8 min-w-0">

                <h3 class="text-xl md:text-2xl font-black text-gray-800 mb-4">
                    Deskripsi Event
                </h3>

                <p class="text-gray-700 leading-relaxed text-base md:text-lg break-words whitespace-pre-line">
                    {{ $deskripsiEvent }}
                </p>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                <div class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 min-w-0 shadow-sm">

                    <p class="text-gray-500 font-semibold">
                        Jumlah RSVP
                    </p>

                    <h2 class="text-4xl md:text-5xl font-black text-red-600 mt-4">
                        {{ $jumlahRsvp }}
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Peserta telah mendaftar
                    </p>

                </div>

                <div class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 min-w-0 shadow-sm">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 mb-4">

                        <p class="text-gray-500 font-semibold">
                            Kapasitas Event
                        </p>

                        <span class="font-bold text-red-600">
                            {{ $persentase }}%
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-5 overflow-hidden">
                        <div class="bg-red-600 h-full rounded-full transition-all"
                             style="width: {{ $persentase }}%">
                        </div>
                    </div>

                    <p class="text-gray-500 mt-4 mb-6 break-words">
                        {{ $jumlahHadir }} dari {{ $kuotaEvent }} kuota telah terisi.
                    </p>

                    <a href="{{ route('perusahaan.rsvp.index') }}"
                       class="inline-flex w-full sm:w-auto justify-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-bold shadow transition">
                        Lihat Peserta RSVP
                    </a>

                </div>

            </div>

            <div class="flex flex-col sm:flex-row gap-4">

                <a href="{{ route('perusahaan.event.edit', $event->id) }}"
                   class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-4 rounded-2xl font-bold text-center shadow transition">
                    Edit Event
                </a>

                <form action="{{ route('perusahaan.event.destroy', $event->id) }}"
                      method="POST"
                      class="w-full sm:w-auto"
                      onsubmit="return confirm('Yakin ingin menghapus event ini?')">

                    @csrf
                    @method('DELETE')

                    <button class="w-full bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow transition">
                        Hapus Event
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection