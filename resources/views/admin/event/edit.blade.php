@php($title = 'Edit Event')

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
                        d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 10-3.536-3.536L4 16.928V20z" />
                </svg>
            </div>

            <div>
                <h1 class="text-4xl font-black tracking-wide">
                    Edit Event
                </h1>

                <p class="mt-1 text-white/90 font-medium">
                    Ubah data event yang sudah tersimpan.
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
                Form Edit Event
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Pastikan data event sudah benar sebelum disimpan.
            </p>

        </div>

        <form action="{{ route('admin.event.update', $event->id) }}"
            method="POST"
            class="p-7">

            @csrf
            @method('PUT')

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
                            value="{{ $event->nama_event }}"
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
                        value="{{ $event->tanggal_event }}"
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
                            value="{{ $event->lokasi }}"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-12 pr-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                    </div>
                </div>

                {{-- Perusahaan --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Perusahaan
                    </label>

                    <select name="perusahaan_id"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">

                        @foreach($perusahaan as $p)

                            <option value="{{ $p->id }}"
                                {{ $event->perusahaan_id == $p->id ? 'selected' : '' }}>

                                {{ $p->nama_perusahaan }}

                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Kuota --}}
                <div>
                    <label class="block text-slate-700 font-bold mb-2">
                        Kuota
                    </label>

                    <input type="number"
                        name="kuota"
                        value="{{ $event->kuota }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition">
                </div>

                {{-- Deskripsi --}}
                <div class="lg:col-span-2">
                    <label class="block text-slate-700 font-bold mb-2">
                        Deskripsi
                    </label>

                    <textarea rows="5"
                        name="deskripsi"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3.5 font-semibold text-slate-700 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition resize-none">{{ $event->deskripsi }}</textarea>
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
                            d="M5 13l4 4L19 7" />
                    </svg>

                    Update Event
                </button>

            </div>

        </form>

    </div>

@endsection