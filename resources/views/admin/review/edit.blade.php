@php
    $title = 'Edit Review';
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
                            d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6L12 16.76 6.6 19.6l1.03-6-4.36-4.25 6.03-.88L12 3z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-wide">
                        Edit Review
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Perbarui data review perusahaan.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.review.index') }}"
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
                    Form Edit Review
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Sesuaikan data reviewer, rating, ulasan, dan balasan perusahaan.
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

        <form action="{{ route('admin.review.update', $review->id) }}"
            method="POST"
            class="p-7">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Perusahaan --}}
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">
                        Perusahaan
                    </label>

                    <select name="perusahaan_id"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">

                        <option value="">-- Pilih Perusahaan --</option>

                        @foreach($perusahaans as $perusahaan)
                            @php
                                $namaPerusahaan = $perusahaan->nama_perusahaan
                                    ?? $perusahaan->nama
                                    ?? $perusahaan->name
                                    ?? 'Perusahaan';
                            @endphp

                            <option value="{{ $perusahaan->id }}"
                                {{ old('perusahaan_id', $review->perusahaan_id) == $perusahaan->id ? 'selected' : '' }}>
                                {{ $namaPerusahaan }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Nama Reviewer --}}
                <div>
                    <label class="block text-gray-700 font-bold mb-2">
                        Nama Reviewer
                    </label>

                    <input type="text"
                        name="nama"
                        value="{{ old('nama', $review->nama) }}"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                </div>

                {{-- Posisi --}}
                <div>
                    <label class="block text-gray-700 font-bold mb-2">
                        Posisi / Jabatan
                    </label>

                    <input type="text"
                        name="posisi"
                        value="{{ old('posisi', $review->posisi) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                </div>

                {{-- Rating Utama --}}
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">
                        Rating Utama
                    </label>

                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 fill-current"
                                viewBox="0 0 24 24">

                                <path d="M12 2.5l2.9 5.88 6.49.94-4.69 4.57 1.11 6.46L12 17.3l-5.81 3.05 1.11-6.46-4.69-4.57 6.49-.94L12 2.5z" />
                            </svg>
                        </div>

                        <input type="number"
                            name="rating"
                            value="{{ old('rating', $review->rating) }}"
                            min="1"
                            max="5"
                            step="0.1"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                    </div>
                </div>

                {{-- Rating Detail --}}
                <div>
                    <label class="block text-gray-700 font-bold mb-2">
                        Rating Gaji
                    </label>

                    <input type="number"
                        name="rating_gaji"
                        value="{{ old('rating_gaji', $review->rating_gaji) }}"
                        min="1"
                        max="5"
                        step="0.1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">
                        Rating Kultur
                    </label>

                    <input type="number"
                        name="rating_kultur"
                        value="{{ old('rating_kultur', $review->rating_kultur) }}"
                        min="1"
                        max="5"
                        step="0.1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">
                        Rating Fasilitas
                    </label>

                    <input type="number"
                        name="rating_fasilitas"
                        value="{{ old('rating_fasilitas', $review->rating_fasilitas) }}"
                        min="1"
                        max="5"
                        step="0.1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition">
                </div>

                {{-- Spacer agar grid tetap rapi --}}
                <div class="hidden lg:block"></div>

                {{-- Ulasan --}}
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">
                        Ulasan
                    </label>

                    <textarea name="ulasan"
                        rows="5"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition resize-none">{{ old('ulasan', $review->ulasan) }}</textarea>
                </div>

                {{-- Balasan Perusahaan --}}
                <div class="lg:col-span-2">
                    <label class="block text-gray-700 font-bold mb-2">
                        Balasan Perusahaan
                    </label>

                    <textarea name="balasan_perusahaan"
                        rows="4"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:border-red-500 transition resize-none">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">

                <a href="{{ route('admin.review.index') }}"
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

@endsection