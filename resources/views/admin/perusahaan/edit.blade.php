@php
    $title = 'Edit Perusahaan';

    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? $perusahaan->name
        ?? '';

    $bidang = $perusahaan->bidang
        ?? $perusahaan->industri
        ?? $perusahaan->industry
        ?? '';

    $alamat = $perusahaan->alamat
        ?? $perusahaan->lokasi
        ?? '';

    $website = $perusahaan->website
        ?? $perusahaan->situs
        ?? '';

    $deskripsi = $perusahaan->deskripsi
        ?? $perusahaan->description
        ?? '';

    $logo = $perusahaan->logo
        ?? $perusahaan->foto
        ?? $perusahaan->foto_perusahaan
        ?? null;

    if ($logo) {
        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
            $logoUrl = $logo;
        } elseif (str_starts_with($logo, 'storage/')) {
            $logoUrl = asset($logo);
        } elseif (str_contains($logo, '/')) {
            $logoUrl = asset('storage/' . $logo);
        } else {
            $logoUrl = asset('foto_perusahaan/' . $logo);
        }
    } else {
        $logoUrl = asset('foto_perusahaan/images.png');
    }
@endphp

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-red-700 via-primary to-red-900 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">

        <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full"></div>
        <div class="absolute right-36 -bottom-28 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-3M9 9h1m-1 4h1m-1 4h1m4-4h1m-1 4h1" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-wide">
                        Edit Perusahaan
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Perbarui data perusahaan yang sudah tersimpan.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.perusahaan.index') }}"
                class="inline-flex items-center justify-center gap-2 bg-white/15 hover:bg-white/25 text-white font-bold px-5 py-3 rounded-2xl border border-white/20 transition text-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                Kembali
            </a>

        </div>

    </div>

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft">

            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                </div>

                <div>
                    <h3 class="font-black mb-1">
                        Ada data yang belum sesuai
                    </h3>

                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    @endif

    {{-- FORM CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">

        <div class="px-7 py-6 border-b border-slate-100 bg-white flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Form Edit Perusahaan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Lengkapi dan perbarui informasi perusahaan dengan benar.
                </p>
            </div>

            <div class="hidden md:flex w-14 h-14 rounded-2xl bg-red-100 text-red-600 items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 10-3.536-3.536L4 16.928V20z" />
                </svg>
            </div>

        </div>

        <div class="p-7">

            {{-- PREVIEW LOGO --}}
            <div class="mb-7 bg-red-50 border border-red-100 rounded-[26px] p-5 flex flex-col sm:flex-row sm:items-center gap-5">

                <div class="w-24 h-24 rounded-2xl bg-white border border-red-100 shadow-sm flex items-center justify-center overflow-hidden shrink-0">
                    <img src="{{ $logoUrl }}"
                        onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                        alt="Logo Perusahaan"
                        class="w-full h-full object-contain p-2">
                </div>

                <div>
                    <h3 class="text-lg font-black text-gray-800">
                        Logo Saat Ini
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Logo ini akan tetap digunakan jika kamu tidak mengunggah logo baru.
                    </p>
                </div>

            </div>

            <form action="{{ route('admin.perusahaan.update', $perusahaan->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- Nama Perusahaan --}}
                    <div class="lg:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">
                            Nama Perusahaan
                        </label>

                        <input type="text"
                            name="nama_perusahaan"
                            value="{{ old('nama_perusahaan', $namaPerusahaan) }}"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Bidang --}}
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">
                            Bidang / Industri
                        </label>

                        <input type="text"
                            name="bidang"
                            value="{{ old('bidang', $bidang) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Alamat --}}
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">
                            Alamat
                        </label>

                        <input type="text"
                            name="alamat"
                            value="{{ old('alamat', $alamat) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">
                            Email
                        </label>

                        <input type="email"
                            name="email"
                            value="{{ old('email', $perusahaan->email ?? '') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Website --}}
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">
                            Website
                        </label>

                        <input type="text"
                            name="website"
                            value="{{ old('website', $website) }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Jumlah Karyawan --}}
                    <div class="lg:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">
                            Jumlah Karyawan
                        </label>

                        <input type="text"
                            name="jumlah_karyawan"
                            value="{{ old('jumlah_karyawan', $perusahaan->jumlah_karyawan ?? '') }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>

                    {{-- Logo Baru --}}
                    <div class="lg:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">
                            Ganti Logo Perusahaan
                        </label>

                        <input type="file"
                            name="logo"
                            accept="image/*"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">

                        <p class="text-sm text-gray-500 mt-2">
                            Kosongkan jika tidak ingin mengganti logo.
                        </p>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="lg:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2">
                            Deskripsi Perusahaan
                        </label>

                        <textarea name="deskripsi"
                            rows="5"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition resize-none">{{ old('deskripsi', $deskripsi) }}</textarea>
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">

                    <a href="{{ route('admin.perusahaan.index') }}"
                        class="inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-2xl font-bold transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>

                        Kembali
                    </a>

                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-black shadow-lg transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7" />
                        </svg>

                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection