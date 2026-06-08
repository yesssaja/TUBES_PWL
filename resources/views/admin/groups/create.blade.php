@php($title = 'Tambah Group')

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-primary via-red-700 to-red-900 text-white rounded-[30px] shadow-glow p-8 mb-7">

        <div class="absolute -right-16 -top-16 w-52 h-52 bg-white/10 rounded-full"></div>
        <div class="absolute right-32 -bottom-24 w-64 h-64 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-4xl font-black tracking-wide">
                        Tambah Group
                    </h1>

                    <p class="mt-1 text-white/90 font-medium">
                        Buat group baru untuk komunitas pengguna LOKER SEEKER.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.groups.index') }}"
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

    </div>

    {{-- ERROR MESSAGE --}}
    @if ($errors->any())
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
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    @endif

    {{-- FORM CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">

        <div class="px-7 py-6 border-b border-slate-100 flex items-center justify-between gap-4">

            <div>
                <h2 class="text-2xl font-black text-dark">
                    Form Tambah Group
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Lengkapi data group sebelum disimpan.
                </p>
            </div>

            <div class="hidden md:flex w-14 h-14 rounded-2xl bg-red-100 text-primary items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 4v16m8-8H4" />
                </svg>
            </div>

        </div>

        <form action="{{ route('admin.groups.store') }}"
            method="POST"
            class="p-7">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Nama Group --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Nama Group
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
                                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                            </svg>
                        </div>

                        <input type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Contoh: Web Developer Community"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Kategori
                    </label>

                    <input type="text"
                        name="category"
                        value="{{ old('category') }}"
                        placeholder="Contoh: Teknologi"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Icon Letter --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Icon Letter
                    </label>

                    <input type="text"
                        name="icon_letter"
                        value="{{ old('icon_letter') }}"
                        maxlength="5"
                        placeholder="Contoh: W"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Cover Image --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Cover Image URL
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
                                    d="M13.828 10.172a4 4 0 010 5.656l-2 2a4 4 0 01-5.656-5.656l1-1" />

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10.172 13.828a4 4 0 010-5.656l2-2a4 4 0 015.656 5.656l-1 1" />
                            </svg>
                        </div>

                        <input type="text"
                            name="cover_image"
                            value="{{ old('cover_image') }}"
                            placeholder="Masukkan URL gambar cover"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Deskripsi
                    </label>

                    <textarea name="description"
                        rows="5"
                        placeholder="Masukkan deskripsi group"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none">{{ old('description') }}</textarea>
                </div>

                {{-- Status Public --}}
                <div class="lg:col-span-2">
                    <label class="flex items-center justify-between gap-4 bg-red-50 border border-red-100 rounded-2xl px-5 py-4 cursor-pointer">

                        <div>
                            <p class="font-black text-slate-800">
                                Group Aktif / Public
                            </p>

                            <p class="text-sm text-slate-500 mt-1">
                                Jika aktif, group dapat terlihat dan diakses oleh user.
                            </p>
                        </div>

                        <input type="checkbox"
                            name="is_public"
                            value="1"
                            checked
                            class="w-5 h-5 accent-red-600">

                    </label>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">

                <a href="{{ route('admin.groups.index') }}"
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

                    Simpan
                </button>

            </div>

        </form>

    </div>

@endsection