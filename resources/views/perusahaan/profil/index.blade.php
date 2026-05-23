@extends('perusahaan.layouts.app')

@section('title', 'Profil Perusahaan')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Profil Perusahaan
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola identitas dan informasi perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.dashboard') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold transition">
            ← Kembali
        </a>
    </div>

    {{-- ALERT SUCCESS --}}
    @if (session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl shadow-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- CARD --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        {{-- TOP --}}
        <div class="bg-gradient-to-r from-red-600 to-yellow-400 p-8 text-white">
            <h2 class="text-3xl font-black">
                Lengkapi Profil Perusahaan
            </h2>

            <p class="text-white/90 mt-2">
                Profil yang lengkap meningkatkan kepercayaan pelamar terhadap perusahaan Anda.
            </p>
        </div>

        {{-- FORM --}}
        <form
            action="{{ route('perusahaan.profil.update') }}"
            method="POST"
            enctype="multipart/form-data"
            class="p-6 md:p-8 space-y-8"
        >
            @csrf

            {{-- LOGO --}}
            <div class="bg-red-50 rounded-3xl p-6">
                <label class="block font-bold text-gray-800 mb-4">
                    Logo Perusahaan
                </label>

                <div class="flex flex-col sm:flex-row sm:items-center gap-6">

                    <div class="w-32 h-32 rounded-3xl overflow-hidden border bg-white shadow-sm shrink-0">
                        <img
                            src="{{ $perusahaan && $perusahaan->logo ? asset('storage/' . $perusahaan->logo) : 'https://via.placeholder.com/150' }}"
                            class="w-full h-full object-cover"
                            alt="Logo Perusahaan">
                    </div>

                    <div class="flex-1">
                        <input
                            type="file"
                            name="logo"
                            accept="image/png, image/jpeg, image/jpg"
                            class="w-full border border-gray-300 rounded-2xl p-4 bg-white focus:ring-2 focus:ring-red-500 outline-none">

                        <p class="text-sm text-gray-500 mt-3">
                            Format: JPG, PNG, JPEG. Maksimal 2MB.
                        </p>
                    </div>

                </div>
            </div>

            {{-- GRID INPUT --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAMA --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Nama Perusahaan
                    </label>

                    <input
                        type="text"
                        name="nama_perusahaan"
                        value="{{ old('nama_perusahaan', $perusahaan->nama_perusahaan ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="PT Shopee Indonesia">
                </div>

                {{-- EMAIL --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Email Perusahaan
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $perusahaan->email ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="contoh@email.com">
                </div>

                {{-- NO HP --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Nomor HP
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp', $perusahaan->no_hp ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="08123456789">
                </div>

                {{-- WEBSITE --}}
                <div>
                    <label class="block font-bold text-gray-700 mb-2">
                        Website
                    </label>

                    <input
                        type="text"
                        name="website"
                        value="{{ old('website', $perusahaan->website ?? '') }}"
                        class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                        placeholder="https://www.perusahaan.com">
                </div>

            </div>

            {{-- ALAMAT --}}
            <div>
                <label class="block font-bold text-gray-700 mb-2">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="4"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Masukkan alamat perusahaan">{{ old('alamat', $perusahaan->alamat ?? '') }}</textarea>
            </div>

            {{-- DESKRIPSI --}}
            <div>
                <label class="block font-bold text-gray-700 mb-2">
                    Deskripsi Perusahaan
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                    placeholder="Jelaskan profil singkat perusahaan">{{ old('deskripsi', $perusahaan->deskripsi ?? '') }}</textarea>
            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg transition">
                    Simpan Profil
                </button>

                <a href="{{ route('perusahaan.dashboard') }}"
                   class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-8 py-4 rounded-2xl font-bold text-center transition">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

@endsection