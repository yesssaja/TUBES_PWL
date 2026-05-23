@extends('perusahaan.layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Pengaturan Akun
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola informasi akun dan keamanan perusahaan Anda.
            </p>
        </div>

        {{-- BUTTON --}}
        <a href="{{ route('perusahaan.dashboard') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold transition">

            ← Kembali

        </a>

    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        {{-- TOP --}}
        <div class="bg-gradient-to-r from-red-600 to-yellow-400 p-8 text-white">

            <h2 class="text-3xl font-black">
                Pengaturan Akun
            </h2>

            <p class="text-white/90 mt-2">
                Pastikan data akun dan password perusahaan selalu aman.
            </p>

        </div>

        {{-- FORM --}}
        <form class="p-6 md:p-8 space-y-8">

            {{-- INFORMASI AKUN --}}
            <div>

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Informasi Akun
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NAMA --}}
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Nama Akun
                        </label>

                        <input
                            type="text"
                            value="{{ Auth::user()->name }}"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    </div>

                    {{-- EMAIL --}}
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            value="{{ Auth::user()->email }}"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    </div>

                </div>

            </div>

            {{-- PEMBATAS --}}
            <div class="border-t pt-8">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    Ubah Password
                </h3>

                <div class="space-y-6">

                    {{-- PASSWORD LAMA --}}
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Password Lama
                        </label>

                        <input
                            type="password"
                            placeholder="Masukkan password lama"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    </div>

                    {{-- PASSWORD BARU --}}
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Password Baru
                        </label>

                        <input
                            type="password"
                            placeholder="Masukkan password baru"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    </div>

                    {{-- KONFIRMASI --}}
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Konfirmasi Password Baru
                        </label>

                        <input
                            type="password"
                            placeholder="Konfirmasi password baru"
                            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">

                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-4">

                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg transition">

                    Simpan Perubahan

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