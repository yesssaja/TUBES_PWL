@php($title = 'Tambah Loker')

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-primary via-red-700 to-red-800 text-white rounded-[28px] shadow-glow p-8 mb-7 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

        <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4" />
                </svg>
            </div>

            <div>
                <h1 class="text-4xl font-black tracking-wide">
                    Tambah Loker
                </h1>

                <p class="mt-1 text-white/90 font-medium">
                    Buat lowongan kerja baru untuk LOKER SEEKER.
                </p>
            </div>
        </div>

        <a href="{{ route('admin.loker.index') }}"
            class="inline-flex items-center justify-center gap-2 bg-white/15 hover:bg-white/25 text-white font-bold px-5 py-3 rounded-2xl border border-white/20 transition">

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

    {{-- ERROR MESSAGE --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft">

            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-red-100 text-primary flex items-center justify-center shrink-0">
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

        <div class="px-7 py-6 border-b border-slate-100">

            <h2 class="text-2xl font-black text-dark">
                Form Tambah Loker
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Lengkapi data lowongan kerja sebelum disimpan.
            </p>

        </div>

        <form action="{{ route('admin.loker.store') }}"
            method="POST"
            class="p-7">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Perusahaan --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Perusahaan
                    </label>

                    <select name="perusahaan_id"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">

                        <option value="">
                            Pilih Perusahaan
                        </option>

                        @foreach($perusahaan as $p)
                            <option value="{{ $p->id }}" {{ old('perusahaan_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama_perusahaan }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Judul Loker --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Posisi / Judul Loker
                    </label>

                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10 6V5a2 2 0 012-2h0a2 2 0 012 2v1m-8 0h12a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z" />
                            </svg>
                        </div>

                        <input type="text"
                            name="judul_loker"
                            value="{{ old('judul_loker') }}"
                            required
                            placeholder="Contoh: Frontend Developer"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Lokasi
                    </label>

                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 21s7-4.35 7-11a7 7 0 10-14 0c0 6.65 7 11 7 11z" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 10a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>

                        <input type="text"
                            name="lokasi"
                            value="{{ old('lokasi') }}"
                            required
                            placeholder="Contoh: Malang"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Tipe Pekerjaan --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Tipe Pekerjaan
                    </label>

                    <select name="tipe_pekerjaan"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">

                        <option value="">
                            Pilih Tipe
                        </option>

                        <option value="Full Time" {{ old('tipe_pekerjaan') == 'Full Time' ? 'selected' : '' }}>
                            Full Time
                        </option>

                        <option value="Part Time" {{ old('tipe_pekerjaan') == 'Part Time' ? 'selected' : '' }}>
                            Part Time
                        </option>

                        <option value="Internship" {{ old('tipe_pekerjaan') == 'Internship' ? 'selected' : '' }}>
                            Internship
                        </option>

                        <option value="Freelance" {{ old('tipe_pekerjaan') == 'Freelance' ? 'selected' : '' }}>
                            Freelance
                        </option>

                        <option value="Contract" {{ old('tipe_pekerjaan') == 'Contract' ? 'selected' : '' }}>
                            Contract
                        </option>

                    </select>
                </div>

                {{-- Gaji --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Gaji
                    </label>

                    <input type="text"
                        name="gaji"
                        value="{{ old('gaji') }}"
                        placeholder="Contoh: Rp 3.000.000 - Rp 5.000.000"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Batas Lamaran --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Batas Lamaran
                    </label>

                    <input type="date"
                        name="batas_lamaran"
                        value="{{ old('batas_lamaran') }}"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Deskripsi --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Deskripsi
                    </label>

                    <textarea name="deskripsi"
                        rows="6"
                        required
                        placeholder="Masukkan deskripsi lowongan kerja"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none">{{ old('deskripsi') }}</textarea>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">

                <a href="{{ route('admin.loker.index') }}"
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
                    class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-black shadow-lg transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4v16m8-8H4" />
                    </svg>

                    Simpan Loker
                </button>

            </div>

        </form>

    </div>

@endsection