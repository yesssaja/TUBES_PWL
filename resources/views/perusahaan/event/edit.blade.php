@extends('perusahaan.layouts.app')

@section('title', 'Edit Event')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit Event</h1>
            <p class="text-gray-500 mt-2">Perbarui informasi event perusahaan Anda.</p>
        </div>

        <a href="{{ route('perusahaan.event.index') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold transition">
            ← Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-red-600 to-orange-400 p-8 text-white">
            <h2 class="text-3xl font-black">Form Edit Event</h2>
            <p class="text-white/90 mt-2">Ubah detail event sesuai kebutuhan perusahaan Anda.</p>
        </div>

        <form action="{{ route('perusahaan.event.update', $event->id) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 md:p-8 space-y-8">

            @csrf
            @method('PUT')

            <div class="bg-red-50 rounded-3xl p-6">
                <label class="block font-bold text-gray-800 mb-4">Poster Event</label>

                <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                    <div class="w-40 h-40 rounded-3xl overflow-hidden border bg-white shadow-sm shrink-0">
                        <img
                            src="{{ $event->poster ? asset('storage/' . $event->poster) : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f' }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1">
                        <input
                            type="file"
                            name="poster"
                            accept="image/png, image/jpeg, image/jpg"
                            class="w-full border border-gray-300 rounded-2xl p-4 bg-white focus:ring-2 focus:ring-red-500 outline-none">

                        <p class="text-sm text-gray-500 mt-3">
                            Kosongkan jika tidak ingin mengganti poster.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Nama Event</label>
                    <input
                        type="text"
                        name="judul_event"
                        value="{{ old('judul_event', $event->nama_event ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Tipe Event</label>
                    <select
                        name="tipe_event"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                        <option value="">Pilih Tipe Event</option>
                        <option value="Online" {{ old('tipe_event', $event->tipe_event ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ old('tipe_event', $event->tipe_event ?? '') == 'Offline' ? 'selected' : '' }}>Offline</option>
                        <option value="Hybrid" {{ old('tipe_event', $event->tipe_event ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Tanggal Event</label>
                    <input
                        type="date"
                        name="tanggal"
                        value="{{ old('tanggal', $event->tanggal_event ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Jam Event</label>
                    <input
                        type="time"
                        name="jam"
                        value="{{ old('jam', $event->jam ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Lokasi</label>
                    <input
                        type="text"
                        name="lokasi"
                        value="{{ old('lokasi', $event->lokasi ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Kuota Peserta</label>
                    <input
                        type="number"
                        name="kuota"
                        value="{{ old('kuota', $event->kuota ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-2">
                    Link Grup WhatsApp
                </label>
            
                <input
                    type="url"
                    name="link_wa_group"
                    value="{{ old('link_wa_group', $event->link_wa_group) }}"
                    class="w-full border rounded-2xl px-4 py-3">
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-2">Deskripsi Event</label>
                <textarea
                    name="deskripsi"
                    rows="6"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">{{ old('deskripsi', $event->deskripsi ?? '') }}</textarea>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-2">Status Event</label>
                <select
                    name="status"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                    <option value="aktif" {{ old('status', $event->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ old('status', $event->status ?? '') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditunda" {{ old('status', $event->status ?? '') == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
                </select>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg transition">
                    Update Event
                </button>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl font-bold text-center transition">
                    Batal
                </a>
            </div>

        </form>
    </div>

</div>

@endsection