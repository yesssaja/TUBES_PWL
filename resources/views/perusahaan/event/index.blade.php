@extends('perusahaan.layouts.app')

@section('title', 'Event Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-xl p-6 sm:p-8 mb-8 text-white">

        <div class="absolute -top-12 -right-12 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <p class="text-white/80 font-semibold mb-2">Dashboard Perusahaan</p>

                <h1 class="text-3xl sm:text-4xl font-black">
                    Event Perusahaan
                </h1>

                <p class="text-white/90 mt-3 text-base sm:text-lg max-w-2xl">
                    Kelola event perusahaan dan pantau peserta yang mengikuti event Anda.
                </p>
            </div>

            <a href="{{ route('perusahaan.event.create') }}"
               class="inline-flex items-center justify-center bg-white text-red-600 hover:bg-red-50 px-6 py-4 rounded-2xl font-black shadow-lg transition">
                + Tambah Event
            </a>
        </div>
    </div>

    {{-- TABLE DESKTOP --}}
    <div class="hidden lg:block bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-6 border-b border-gray-100">
            <h2 class="text-2xl font-black text-gray-800">Daftar Event</h2>
            <p class="text-gray-500 mt-1">
                Total {{ $events->count() }} event perusahaan.
            </p>
        </div>

        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Event</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Kuota</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse ($events as $event)

                    @php
                        $judulEvent = $event->judul_event ?? $event->nama_event ?? $event->title ?? '-';
                        $deskripsiEvent = $event->deskripsi ?? $event->description ?? 'Tidak ada deskripsi.';
                        $tanggalEvent = $event->tanggal_event ?? $event->tanggal ?? $event->date ?? '-';
                        $jamEvent = $event->jam ?? $event->jam_event ?? $event->time ?? null;
                        $lokasiEvent = $event->lokasi ?? $event->location ?? '-';
                        $kuotaEvent = (int) ($event->kuota ?? $event->quota ?? 0);

                        $jumlahHadir = \App\Models\Rsvp::where('event_id', $event->id)
                            ->where('status_kehadiran', 'hadir')
                            ->count();

                        $statusEvent = ($kuotaEvent > 0 && $jumlahHadir >= $kuotaEvent)
                            ? 'tidak_aktif'
                            : ($event->status ?? 'aktif');

                        if (!empty($event->poster)) {
                            if (str_starts_with($event->poster, 'http://') || str_starts_with($event->poster, 'https://')) {
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

                    <tr class="hover:bg-orange-50/40 transition">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <img src="{{ $posterEvent }}"
                                     alt="{{ $judulEvent }}"
                                     class="w-24 h-16 rounded-2xl object-cover shadow border border-gray-100"
                                     onerror="this.onerror=null; this.src='{{ asset('images/default-event.jpg') }}'">

                                <div class="min-w-0">
                                    <h3 class="font-black text-gray-800 text-lg truncate max-w-[300px]">
                                        {{ $judulEvent }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1 line-clamp-2 max-w-[360px]">
                                        {{ $deskripsiEvent }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <div class="font-bold text-gray-800">{{ $tanggalEvent }}</div>
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $jamEvent ? $jamEvent . ' WIB' : '-' }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <p class="font-semibold text-gray-700 max-w-[180px] truncate">
                                {{ $lokasiEvent }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <span class="inline-flex bg-red-50 text-red-600 px-4 py-2 rounded-full text-sm font-black">
                                {{ $kuotaEvent }} Peserta
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            @if ($statusEvent == 'aktif')
                                <span class="inline-flex bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black">
                                    Aktif
                                </span>
                            @elseif ($statusEvent == 'selesai')
                                <span class="inline-flex bg-gray-100 text-gray-700 border border-gray-200 px-4 py-2 rounded-full text-sm font-black">
                                    Selesai
                                </span>
                            @elseif ($statusEvent == 'ditunda')
                                <span class="inline-flex bg-yellow-50 text-yellow-700 border border-yellow-200 px-4 py-2 rounded-full text-sm font-black">
                                    Ditunda
                                </span>
                            @elseif ($statusEvent == 'tidak_aktif')
                                <span class="inline-flex bg-red-50 text-red-700 border border-red-200 px-4 py-2 rounded-full text-sm font-black">
                                    Tidak Aktif
                                </span>
                            @else
                                <span class="inline-flex bg-blue-50 text-blue-700 border border-blue-200 px-4 py-2 rounded-full text-sm font-black">
                                    {{ ucfirst($statusEvent) }}
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-2 items-center">
                                <a href="{{ route('perusahaan.event.show', $event->id) }}"
                                   class="w-28 text-center bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl font-black hover:bg-blue-100 transition">
                                    Detail
                                </a>

                                <a href="{{ route('perusahaan.event.edit', $event->id) }}"
                                   class="w-28 text-center bg-yellow-50 text-yellow-600 px-4 py-2.5 rounded-xl font-black hover:bg-yellow-100 transition">
                                    Edit
                                </a>

                                <form action="{{ route('perusahaan.event.destroy', $event->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="w-28 bg-red-50 text-red-600 px-4 py-2.5 rounded-xl font-black hover:bg-red-100 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="p-14 text-center">
                            <div class="max-w-md mx-auto">
                                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                                    📅
                                </div>

                                <h3 class="text-xl font-black text-gray-700">
                                    Belum ada event perusahaan
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    Event yang dibuat perusahaan akan tampil di halaman ini.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- MOBILE CARD --}}
    <div class="grid grid-cols-1 gap-6 lg:hidden">
        @forelse ($events as $event)

            @php
                $judulEvent = $event->judul_event ?? $event->nama_event ?? $event->title ?? '-';
                $deskripsiEvent = $event->deskripsi ?? $event->description ?? 'Tidak ada deskripsi.';
                $tanggalEvent = $event->tanggal_event ?? $event->tanggal ?? $event->date ?? '-';
                $jamEvent = $event->jam ?? $event->jam_event ?? $event->time ?? null;
                $lokasiEvent = $event->lokasi ?? $event->location ?? '-';
                $kuotaEvent = (int) ($event->kuota ?? $event->quota ?? 0);

                $jumlahHadir = \App\Models\Rsvp::where('event_id', $event->id)
                    ->where('status_kehadiran', 'hadir')
                    ->count();

                $statusEvent = ($kuotaEvent > 0 && $jumlahHadir >= $kuotaEvent)
                    ? 'tidak_aktif'
                    : ($event->status ?? 'aktif');

                if (!empty($event->poster)) {
                    if (str_starts_with($event->poster, 'http://') || str_starts_with($event->poster, 'https://')) {
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

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 overflow-hidden">
                <div class="relative">
                    <img src="{{ $posterEvent }}"
                         alt="{{ $judulEvent }}"
                         class="w-full h-52 object-cover"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='{{ asset('images/default-event.jpg') }}';">

                    <div class="absolute top-4 right-4">
                        @if ($statusEvent == 'aktif')
                            <span class="bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black shadow">
                                Aktif
                            </span>
                        @elseif ($statusEvent == 'selesai')
                            <span class="bg-gray-100 text-gray-700 border border-gray-200 px-4 py-2 rounded-full text-sm font-black shadow">
                                Selesai
                            </span>
                        @elseif ($statusEvent == 'ditunda')
                            <span class="bg-yellow-50 text-yellow-700 border border-yellow-200 px-4 py-2 rounded-full text-sm font-black shadow">
                                Ditunda
                            </span>
                        @elseif ($statusEvent == 'tidak_aktif')
                            <span class="bg-red-50 text-red-700 border border-red-200 px-4 py-2 rounded-full text-sm font-black shadow">
                                Tidak Aktif
                            </span>
                        @else
                            <span class="bg-blue-50 text-blue-700 border border-blue-200 px-4 py-2 rounded-full text-sm font-black shadow">
                                {{ ucfirst($statusEvent) }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-5 sm:p-6">
                    <h2 class="text-2xl font-black text-gray-800 break-words">
                        {{ $judulEvent }}
                    </h2>

                    <p class="text-gray-500 mt-2 line-clamp-3">
                        {{ $deskripsiEvent }}
                    </p>

                    <div class="mt-5 bg-gray-50 rounded-3xl p-4 space-y-4">
                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Tanggal</p>
                            <p class="text-gray-800 font-bold mt-1">{{ $tanggalEvent }}</p>
                            <p class="text-gray-500 text-sm mt-1">
                                {{ $jamEvent ? $jamEvent . ' WIB' : '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Lokasi</p>
                            <p class="text-gray-800 font-bold mt-1">{{ $lokasiEvent }}</p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Kuota</p>
                            <p class="text-red-600 font-black mt-1">
                                {{ $kuotaEvent }} Peserta
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <a href="{{ route('perusahaan.event.show', $event->id) }}"
                           class="text-center bg-blue-50 text-blue-600 px-4 py-3 rounded-xl font-black hover:bg-blue-100 transition">
                            Detail
                        </a>

                        <a href="{{ route('perusahaan.event.edit', $event->id) }}"
                           class="text-center bg-yellow-50 text-yellow-600 px-4 py-3 rounded-xl font-black hover:bg-yellow-100 transition">
                            Edit
                        </a>

                        <form action="{{ route('perusahaan.event.destroy', $event->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="w-full bg-red-50 text-red-600 px-4 py-3 rounded-xl font-black hover:bg-red-100 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📅
                </div>

                <h3 class="text-xl font-black text-gray-700">
                    Belum ada event perusahaan
                </h3>

                <p class="text-gray-500 mt-2">
                    Event yang dibuat perusahaan akan tampil di halaman ini.
                </p>
            </div>
        @endforelse
    </div>

</div>

@endsection