@php
    $title = 'Kelola Perusahaan';

    $totalWebsite = 0;
    $totalEmail = 0;

    foreach ($perusahaans as $perusahaanItem) {
        if (!empty($perusahaanItem->website ?? $perusahaanItem->situs ?? null)) {
            $totalWebsite++;
        }

        if (!empty($perusahaanItem->email ?? null)) {
            $totalEmail++;
        }
    }
@endphp

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-red-700 via-primary to-red-900 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">

        <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full"></div>
        <div class="absolute right-36 -bottom-28 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:justify-between md:items-center gap-5">

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
                        Kelola Perusahaan
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Tambah, edit, dan hapus data perusahaan yang bekerja sama.
                    </p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.perusahaan.create') }}"
                    class="inline-flex items-center justify-center gap-2 bg-white hover:bg-gray-100 text-red-600 font-black px-5 py-3 rounded-2xl shadow-lg transition text-center">

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

                    Tambah Perusahaan
                </a>

            </div>

        </div>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
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
            </div>

            <span>
                {{ session('success') }}
            </span>

        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7">

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-red-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total Perusahaan
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $perusahaans->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-3M9 9h1m-1 4h1m-1 4h1m4-4h1m-1 4h1" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Dengan Website
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $totalWebsite }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3a9 9 0 100 18 9 9 0 000-18z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.6 9h16.8M3.6 15h16.8M12 3c2.5 2.4 3.7 5.4 3.7 9S14.5 18.6 12 21M12 3C9.5 5.4 8.3 8.4 8.3 12S9.5 18.6 12 21" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-orange-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Dengan Email
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $totalEmail }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 8l9 6 9-6" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft overflow-hidden border border-slate-100 max-w-full">

        <div class="px-7 py-6 border-b border-slate-100 bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Data Perusahaan
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Daftar seluruh perusahaan yang tersimpan di database.
                </p>
            </div>

            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-2xl text-sm font-black">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-3" />
                </svg>

                {{ $perusahaans->count() }} Data Perusahaan
            </div>

        </div>

        <div class="w-full max-w-full overflow-x-auto overflow-y-hidden">

            <table class="w-full min-w-[1050px]">

                <thead class="bg-red-50 text-red-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Logo</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Nama Perusahaan</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Bidang</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Email</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Website</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($perusahaans as $perusahaan)

                        @php
                            $namaPerusahaan = $perusahaan->nama_perusahaan
                                ?? $perusahaan->nama
                                ?? $perusahaan->name
                                ?? '-';

                            $bidang = $perusahaan->bidang
                                ?? $perusahaan->industri
                                ?? $perusahaan->industry
                                ?? '-';

                            $website = $perusahaan->website
                                ?? $perusahaan->situs
                                ?? null;

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

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            <td class="px-6 py-5">
                                <div class="w-16 h-16 rounded-2xl bg-gray-100 border border-gray-200 shadow-sm flex items-center justify-center overflow-hidden">
                                    <img src="{{ $logoUrl }}"
                                        onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                        alt="Logo"
                                        class="w-full h-full object-contain p-2">
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-black text-gray-800">
                                    {{ $namaPerusahaan }}
                                </div>

                                <div class="flex items-center gap-1 text-sm text-gray-500 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 text-red-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 11a3 3 0 100-6 3 3 0 000 6z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 22s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z" />
                                    </svg>

                                    {{ $perusahaan->alamat ?? $perusahaan->lokasi ?? '-' }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-block bg-red-50 text-red-600 px-3 py-2 rounded-full text-sm font-bold">
                                    {{ $bidang }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                @if(!empty($perusahaan->email))
                                    <span class="text-gray-700 font-semibold">
                                        {{ $perusahaan->email }}
                                    </span>
                                @else
                                    <span class="text-gray-400">
                                        -
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                @if($website)
                                    <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                                        target="_blank"
                                        class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:underline font-semibold">

                                        {{ $website }}

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M13 7h4m0 0v4m0-4L10 14M5 5h6M5 5v14h14v-6" />
                                        </svg>
                                    </a>
                                @else
                                    <span class="text-gray-400">
                                        -
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('admin.perusahaan.edit', $perusahaan->id) }}"
                                        class="inline-flex items-center gap-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-4 py-2 rounded-xl text-sm font-black transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.232 5.232l3.536 3.536M4 20h4l10.5-10.5a2.5 2.5 0 10-3.536-3.536L4 16.928V20z" />
                                        </svg>

                                        Edit
                                    </a>

                                    <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus perusahaan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center gap-2 bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-black transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-8 0l1 13h8l1-13M10 11v6m4-6v6" />
                                            </svg>

                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center">

                                <div class="max-w-md mx-auto">
                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-3M9 9h1m-1 4h1m-1 4h1m4-4h1m-1 4h1" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data perusahaan
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Silakan tambahkan perusahaan baru terlebih dahulu.
                                    </p>

                                    <a href="{{ route('admin.perusahaan.create') }}"
                                        class="inline-flex items-center gap-2 mt-6 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow transition">

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

                                        Tambah Perusahaan
                                    </a>
                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection         