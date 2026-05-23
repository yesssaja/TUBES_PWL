@extends('perusahaan.layouts.app')

@section('title', 'Event Perusahaan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Event Perusahaan
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola event perusahaan dan pantau peserta yang mengikuti event Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.event.create') }}"
           class="inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-bold shadow-lg transition">
            + Tambah Event
        </a>

    </div>

    {{-- TABLE DESKTOP --}}
    <div class="hidden lg:block bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-red-50">
                <tr>
                    <th class="p-5 font-bold text-gray-700">Event</th>
                    <th class="font-bold text-gray-700">Tanggal</th>
                    <th class="font-bold text-gray-700">Lokasi</th>
                    <th class="font-bold text-gray-700">Kuota</th>
                    <th class="font-bold text-gray-700">Status</th>
                    <th class="font-bold text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($events as $event)

                    @php
                        $judulEvent = $event->judul_event
                            ?? $event->nama_event
                            ?? $event->title
                            ?? '-';

                        $deskripsiEvent = $event->deskripsi
                            ?? $event->description
                            ?? 'Tidak ada deskripsi.';

                        $tanggalEvent = $event->tanggal_event
                            ?? $event->tanggal
                            ?? $event->date
                            ?? '-';

                        $jamEvent = $event->jam
                            ?? $event->jam_event
                            ?? $event->time
                            ?? null;

                        $lokasiEvent = $event->lokasi
                            ?? $event->location
                            ?? '-';

                        $kuotaEvent = $event->kuota
                            ?? $event->quota
                            ?? '-';

                        $posterEvent = $event->poster
                            ? asset('storage/' . $event->poster)
                            : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f';

                        $statusEvent = $event->status ?? 'aktif';
                    @endphp

                    <tr class="border-b hover:bg-gray-50 transition">

                        {{-- EVENT --}}
                        <td class="p-5">
                            <div class="flex items-center gap-4">

                                <img
                                    src="{{ $posterEvent }}"
                                    class="w-20 h-16 rounded-2xl object-cover"
                                    onerror="this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f'">

                                <div>
                                    <h3 class="font-bold text-lg text-gray-800">
                                        {{ $judulEvent }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-1 line-clamp-2">
                                        {{ $deskripsiEvent }}
                                    </p>
                                </div>

                            </div>
                        </td>

                        {{-- TANGGAL --}}
                        <td>
                            <div class="font-semibold text-gray-800">
                                {{ $tanggalEvent }}
                            </div>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $jamEvent ? $jamEvent . ' WIB' : '-' }}
                            </p>
                        </td>

                        {{-- LOKASI --}}
                        <td>
                            {{ $lokasiEvent }}
                        </td>

                        {{-- KUOTA --}}
                        <td>
                            <div class="font-bold text-red-600">
                                {{ $kuotaEvent }} Peserta
                            </div>
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if ($statusEvent == 'aktif')
                                <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Aktif
                                </span>
                            @elseif ($statusEvent == 'selesai')
                                <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Selesai
                                </span>
                            @elseif ($statusEvent == 'ditunda')
                                <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Ditunda
                                </span>
                            @else
                                <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    {{ ucfirst($statusEvent) }}
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td>
                            <div class="flex justify-center gap-3">

                                <a href="{{ route('perusahaan.event.show', $event->id) }}"
                                   class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold hover:bg-blue-200 transition">
                                    Detail
                                </a>

                                <a href="{{ route('perusahaan.event.edit', $event->id) }}"
                                   class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl font-semibold hover:bg-yellow-200 transition">
                                    Edit
                                </a>

                                <form action="{{ route('perusahaan.event.destroy', $event->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold hover:bg-red-200 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-10 text-center text-gray-500">
                            Belum ada event perusahaan.
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
                $judulEvent = $event->judul_event
                    ?? $event->nama_event
                    ?? $event->title
                    ?? '-';

                $deskripsiEvent = $event->deskripsi
                    ?? $event->description
                    ?? 'Tidak ada deskripsi.';

                $tanggalEvent = $event->tanggal_event
                    ?? $event->tanggal
                    ?? $event->date
                    ?? '-';

                $lokasiEvent = $event->lokasi
                    ?? $event->location
                    ?? '-';

                $kuotaEvent = $event->kuota
                    ?? $event->quota
                    ?? '-';

                $posterEvent = $event->poster
                    ? asset('storage/' . $event->poster)
                    : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f';

                $statusEvent = $event->status ?? 'aktif';
            @endphp

            <div class="bg-white rounded-3xl shadow overflow-hidden">

                <img
                    src="{{ $posterEvent }}"
                    class="w-full h-52 object-cover"
                    onerror="this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f'">

                <div class="p-6">

                    <div class="flex justify-between items-start gap-4 mb-4">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $judulEvent }}
                            </h2>

                            <p class="text-gray-500 mt-1">
                                {{ $deskripsiEvent }}
                            </p>
                        </div>

                        @if ($statusEvent == 'aktif')
                            <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold shrink-0">
                                Aktif
                            </span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm font-semibold shrink-0">
                                {{ ucfirst($statusEvent) }}
                            </span>
                        @endif

                    </div>

                    <div class="space-y-3 text-gray-700 mb-6">
                        <p>
                            <span class="font-semibold">Tanggal:</span>
                            {{ $tanggalEvent }}
                        </p>

                        <p>
                            <span class="font-semibold">Lokasi:</span>
                            {{ $lokasiEvent }}
                        </p>

                        <p>
                            <span class="font-semibold">Kuota:</span>
                            {{ $kuotaEvent }} Peserta
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-3">

                        <a href="{{ route('perusahaan.event.show', $event->id) }}"
                           class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold">
                            Detail
                        </a>

                        <a href="{{ route('perusahaan.event.edit', $event->id) }}"
                           class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl font-semibold">
                            Edit
                        </a>

                        <form action="{{ route('perusahaan.event.destroy', $event->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus event ini?')">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow p-8 text-center text-gray-500">
                Belum ada event perusahaan.
            </div>

        @endforelse

    </div>

</div>

@endsection