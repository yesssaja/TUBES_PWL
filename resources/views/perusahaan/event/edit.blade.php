@extends('perusahaan.layouts.app')

@section('title', 'Edit Event')

@section('content')

@php
    $judulEvent = $event->judul_event
        ?? $event->nama_event
        ?? $event->title
        ?? '';

    $tanggalEvent = $event->tanggal_event
        ?? $event->tanggal
        ?? '';

    $jamEvent = $event->jam
        ?? $event->jam_event
        ?? '';

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

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <p class="text-gray-500 mt-2">
                Perbarui informasi event perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.event.index') }}"
           class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-3 rounded-2xl font-bold transition">
            Kembali
        </a>

    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">
            <h3 class="font-black mb-2">
                Ada data yang belum sesuai:
            </h3>

            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden">

        <div class="bg-red-600 p-6 sm:p-8 text-white">
            <h2 class="text-2xl sm:text-3xl font-black">
                Form Edit Event
            </h2>

            <p class="text-white/90 mt-2 text-sm sm:text-base">
                Ubah detail event sesuai kebutuhan perusahaan Anda.
            </p>
        </div>

        <form action="{{ route('perusahaan.event.update', $event->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-5 sm:p-6 md:p-8 space-y-8">

            @csrf
            @method('PUT')

            {{-- POSTER --}}
<div class="bg-red-50 rounded-3xl p-5 sm:p-6 border border-red-100">

    <label class="block font-black text-gray-800 mb-4">
        Poster Event
    </label>

    <div class="grid grid-cols-1 md:grid-cols-[180px_1fr] gap-6 items-start">

        <div>
            <div class="w-full h-44 rounded-3xl overflow-hidden border border-gray-100 bg-white shadow-sm">
                <img src="{{ $posterEvent }}"
                     onerror="this.onerror=null; this.src='{{ asset('images/default-event.jpg') }}'"
                     alt="{{ $judulEvent }}"
                     class="w-full h-full object-cover">
            </div>

            <p class="text-xs text-gray-500 mt-3 leading-relaxed">
                Poster lama tetap digunakan jika tidak upload poster baru.
            </p>
        </div>

        <div class="w-full min-w-0">

            <input type="file"
                   name="poster"
                   accept="image/png, image/jpeg, image/jpg"
                   class="block w-full text-sm text-gray-700 border border-gray-300 rounded-2xl bg-white cursor-pointer
                          file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0
                          file:bg-red-600 file:text-white file:font-bold
                          hover:file:bg-red-700">

            <p class="text-sm text-gray-500 mt-3">
                Kosongkan jika tidak ingin mengganti poster.
            </p>

            <p class="text-xs text-gray-400 mt-2 break-all">
                Poster saat ini: {{ $event->poster ?? '-' }}
            </p>

        </div>

    </div>

</div>

            {{-- FORM GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Nama Event
                    </label>

                    <input type="text"
                           name="judul_event"
                           value="{{ old('judul_event', $judulEvent) }}"
                           class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Tipe Event
                    </label>

                    <select name="tipe_event"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                        <option value="">
                            Pilih Tipe Event
                        </option>

                        <option value="Online" {{ old('tipe_event', $event->tipe_event ?? '') == 'Online' ? 'selected' : '' }}>
                            Online
                        </option>

                        <option value="Offline" {{ old('tipe_event', $event->tipe_event ?? '') == 'Offline' ? 'selected' : '' }}>
                            Offline
                        </option>

                        <option value="Hybrid" {{ old('tipe_event', $event->tipe_event ?? '') == 'Hybrid' ? 'selected' : '' }}>
                            Hybrid
                        </option>

                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Tanggal Event
                    </label>

                    <input type="date"
                           name="tanggal"
                           value="{{ old('tanggal', $tanggalEvent) }}"
                           class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Jam Event
                    </label>

                    <input type="time"
                           name="jam"
                           value="{{ old('jam', $jamEvent) }}"
                           class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Lokasi
                    </label>

                    <input type="text"
                           name="lokasi"
                           value="{{ old('lokasi', $event->lokasi ?? '') }}"
                           class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Kuota Peserta
                    </label>

                    <input type="number"
                           name="kuota"
                           value="{{ old('kuota', $event->kuota ?? '') }}"
                           min="1"
                           class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

            </div>

            {{-- LINK WA --}}
            <div>
                <label class="block font-bold text-gray-700 mb-2">
                    Link Grup WhatsApp
                </label>

                <input type="url"
                       name="link_wa_group"
                       value="{{ old('link_wa_group', $event->link_wa_group ?? '') }}"
                       placeholder="https://chat.whatsapp.com/..."
                       class="w-full border border-gray-300 rounded-2xl px-4 py-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="block font-bold text-gray-700 mb-2">
                    Deskripsi Event
                </label>

                <textarea name="deskripsi"
                          rows="6"
                          class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">{{ old('deskripsi', $event->deskripsi ?? '') }}</textarea>
            </div>

            {{-- STATUS --}}
            <div>
                <label class="block font-bold text-gray-700 mb-2">
                    Status Event
                </label>

                <select name="status"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    <option value="aktif" {{ old('status', $event->status ?? '') == 'aktif' ? 'selected' : '' }}>
                        Aktif
                    </option>

                    <option value="selesai" {{ old('status', $event->status ?? '') == 'selesai' ? 'selected' : '' }}>
                        Selesai
                    </option>

                    <option value="ditunda" {{ old('status', $event->status ?? '') == 'ditunda' ? 'selected' : '' }}>
                        Ditunda
                    </option>

                    <option value="tidak_aktif" {{ old('status', $event->status ?? '') == 'tidak_aktif' ? 'selected' : '' }}>
                        Tidak Aktif
                    </option>

                </select>
            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-4">

                <button type="submit"
                        class="w-full sm:w-auto bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg transition">
                    Update Event
                </button>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-700 px-8 py-4 rounded-2xl font-bold text-center transition">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection