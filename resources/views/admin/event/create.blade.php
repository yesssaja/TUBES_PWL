@php($title = 'Tambah Event')

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
                    Tambah Event
                </h1>

                <p class="mt-1 text-white/90 font-medium">
                    Tambahkan data event baru ke LOKER SEEKER.
                </p>
            </div>
        </div>

        <a href="{{ route('admin.event.index') }}"
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

    {{-- FORM CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">

        <div class="px-7 py-6 border-b border-slate-100">

            <h2 class="text-2xl font-black text-dark">
                Form Tambah Event
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Lengkapi data event sebelum disimpan.
            </p>

        </div>

        <form action="{{ route('admin.event.store') }}"
            method="POST"
            class="p-7">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Nama Event --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Nama Event
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
                                    d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
                            </svg>
                        </div>

                        <input type="text"
                            name="nama_event"
                            placeholder="Masukkan nama event"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Tanggal Event --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Tanggal Event
                    </label>

                    <input type="date"
                        name="tanggal_event"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Jam Event --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Jam Event
                    </label>

                    <input type="time"
                        name="jam"
                        value="{{ old('jam', isset($event) ? substr($event->jam, 0, 5) : '') }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Lokasi --}}
                <div class="lg:col-span-2">
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
                            placeholder="Masukkan lokasi event"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Kuota --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Kuota
                    </label>

                    <input type="number"
                        name="kuota"
                        placeholder="Masukkan kuota peserta"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Perusahaan --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Perusahaan
                    </label>

                    <select name="perusahaan_id"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">

                        @foreach($perusahaan as $p)

                            <option value="{{ $p->id }}">
                                {{ $p->nama_perusahaan }}
                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Deskripsi --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Deskripsi
                    </label>

                    <textarea rows="5"
                        name="deskripsi"
                        placeholder="Masukkan deskripsi event"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none"></textarea>
                </div>

                {{-- Link WhatsApp Group --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Link WhatsApp Group Event
                    </label>

                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-green-600">
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

                        <input type="url"
                            name="link_wa_group"
                            value="{{ old('link_wa_group', $event->link_wa_group ?? '') }}"
                            placeholder="Contoh: https://chat.whatsapp.com/xxxxxxx"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-green-400/40 focus:border-green-500 transition">
                    </div>

                    <p class="text-sm text-slate-500 mt-2">
                        Link ini akan muncul di inbox user setelah RSVP diterima.
                    </p>
                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8 pt-6 border-t border-slate-100">

                <a href="/admin/event"
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

                    Simpan Event
                </button>

            </div>

        </form>

    </div>

@endsection