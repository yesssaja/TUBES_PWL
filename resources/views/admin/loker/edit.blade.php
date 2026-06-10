```blade
{{-- resources/views/admin/loker/edit.blade.php --}}

@php
    $title = 'Edit Loker';
@endphp

@extends('admin.layouts.app')

@section('content')

<div class="relative overflow-hidden bg-gradient-to-r from-red-700 via-primary to-red-900 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">
    <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full"></div>
    <div class="absolute right-36 -bottom-28 w-72 h-72 bg-white/10 rounded-full"></div>

    <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <div>
            <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20 px-4 py-2 rounded-full text-sm font-bold mb-4">
                <span>Edit Data</span>
            </div>

            <h1 class="text-3xl md:text-4xl font-black leading-tight">
                Edit Loker
            </h1>

            <p class="text-white/80 mt-2 max-w-2xl">
                Ubah informasi lowongan kerja yang sudah terdaftar pada sistem.
            </p>
        </div>

        <a href="{{ route('admin.loker.index') }}"
            class="inline-flex items-center justify-center gap-2 bg-white text-primary hover:bg-red-50 px-5 py-3 rounded-2xl font-black shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>
</div>

@if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
        <div class="flex items-start gap-3">
            <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                </svg>
            </div>

            <div>
                <p class="font-black mb-1">Data belum bisa disimpan</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">
    <div class="px-7 py-6 border-b border-slate-100 flex items-center gap-4">
        <div class="w-12 h-12 rounded-2xl bg-red-50 text-primary flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6V5a2 2 0 012-2h0a2 2 0 012 2v1m-8 0h12a2 2 0 012 2v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>
        </div>

        <div>
            <h2 class="text-xl font-black text-slate-800">
                Form Edit Loker
            </h2>
            <p class="text-sm text-slate-500">
                Pastikan data lowongan kerja sudah sesuai sebelum diperbarui.
            </p>
        </div>
    </div>

    <form action="{{ route('admin.loker.update', $loker->id) }}" method="POST" class="p-7 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-slate-700 font-black mb-2">
                Perusahaan
            </label>

            <select name="perusahaan_id" required
                class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 bg-white text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
                @foreach($perusahaan as $p)
                    <option value="{{ $p->id }}" {{ old('perusahaan_id', $loker->perusahaan_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-slate-700 font-black mb-2">
                Posisi / Judul Loker
            </label>

            <input type="text" name="judul_loker" value="{{ old('judul_loker', $loker->judul_loker) }}" required
                placeholder="Masukkan posisi atau judul loker"
                class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-slate-700 font-black mb-2">
                    Lokasi
                </label>

                <input type="text" name="lokasi" value="{{ old('lokasi', $loker->lokasi) }}" required
                    placeholder="Contoh: Malang"
                    class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
            </div>

            <div>
                <label class="block text-slate-700 font-black mb-2">
                    Tipe Pekerjaan
                </label>

                <select name="tipe_pekerjaan" required
                    class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 bg-white text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
                    @foreach(['Full Time', 'Part Time', 'Internship', 'Freelance', 'Contract'] as $tipe)
                        <option value="{{ $tipe }}" {{ old('tipe_pekerjaan', $loker->tipe_pekerjaan) == $tipe ? 'selected' : '' }}>
                            {{ $tipe }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-slate-700 font-black mb-2">
                    Gaji
                </label>

                <input type="text" name="gaji" value="{{ old('gaji', $loker->gaji) }}"
                    placeholder="Contoh: Rp 3.000.000 - Rp 5.000.000"
                    class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
            </div>

            <div>
                <label class="block text-slate-700 font-black mb-2">
                    Batas Lamaran
                </label>

                <input type="date" name="batas_lamaran" value="{{ old('batas_lamaran', $loker->batas_lamaran->format('Y-m-d')) }}" required
                    class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition">
            </div>
        </div>

        <div>
            <label class="block text-slate-700 font-black mb-2">
                Deskripsi
            </label>

            <textarea name="deskripsi" rows="7" required
                placeholder="Masukkan deskripsi lowongan kerja"
                class="w-full border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-700 font-semibold focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-primary transition resize-none">{{ old('deskripsi', $loker->deskripsi) }}</textarea>
        </div>

        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-3">
            <a href="{{ route('admin.loker.index') }}"
                class="inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3.5 rounded-2xl font-black transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>

            <button type="submit"
                class="inline-flex items-center justify-center gap-2 bg-primary hover:bg-red-700 text-white px-6 py-3.5 rounded-2xl font-black shadow-glow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                Update Loker
            </button>
        </div>
    </form>
</div>

@endsection
```
