@php($title = 'Data Lamaran')

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
                            d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-4xl font-black tracking-wide">
                        Data Lamaran
                    </h1>

                    <p class="mt-1 text-white/90 font-medium">
                        Kelola lamaran kerja yang dikirim oleh user.
                    </p>
                </div>
            </div>

        </div>

    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft flex items-center gap-3">
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

            <span class="font-semibold">
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
                        Total Lamaran
                    </h2>

                    <p class="text-4xl font-black text-primary mt-2">
                        {{ $lamarans->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-primary flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Pending
                    </h2>

                    <p class="text-4xl font-black text-yellow-600 mt-2">
                        {{ $lamarans->where('status_lamaran', 'pending')->count() }}
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
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-green-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Diterima
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $lamarans->where('status_lamaran', 'diterima')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden">

        <div class="px-7 py-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-2xl font-black text-dark">
                    Daftar Lamaran
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Semua data lamaran kerja yang tersimpan di database.
                </p>
            </div>

            <div class="flex items-center gap-2 bg-red-50 text-primary px-4 py-2 rounded-2xl text-sm font-bold">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2 2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
                </svg>

                {{ $lamarans->count() }} Data Lamaran
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                <thead>
                    <tr class="bg-red-50 text-primary border-b border-red-100">
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">No</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">Pelamar</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">Loker</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">Perusahaan</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">HP</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">Dokumen</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($lamarans as $lamaran)

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            <td class="px-6 py-5">
                                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-black">
                                    {{ $loop->iteration }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-primary flex items-center justify-center font-black">
                                        {{ strtoupper(substr($lamaran->nama ?? 'P', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-slate-800">
                                            {{ $lamaran->nama }}
                                        </div>

                                        <div class="text-sm text-slate-500 mt-1">
                                            {{ $lamaran->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-black text-slate-800">
                                    {{ $lamaran->loker->judul_loker ?? '-' }}
                                </div>

                                <div class="text-sm text-slate-500 mt-1">
                                    {{ $lamaran->loker->lokasi ?? '-' }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center bg-red-50 text-primary px-3 py-2 rounded-full text-sm font-bold">
                                    {{ $lamaran->loker->perusahaan->nama_perusahaan
                                        ?? $lamaran->loker->perusahaan->nama
                                        ?? $lamaran->loker->perusahaan->name
                                        ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-slate-700 font-semibold">
                                {{ $lamaran->hp ?? '-' }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex flex-col gap-2">

                                    @if($lamaran->cv)
                                        <a href="{{ asset('storage/' . $lamaran->cv) }}"
                                            target="_blank"
                                            class="inline-flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-primary px-3 py-2 rounded-xl text-sm font-black transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                                            </svg>

                                            Lihat CV
                                        </a>
                                    @else
                                        <span class="text-slate-400 text-sm">
                                            CV tidak ada
                                        </span>
                                    @endif

                                    @if($lamaran->portfolio)
                                        <a href="{{ $lamaran->portfolio }}"
                                            target="_blank"
                                            class="inline-flex items-center justify-center gap-2 bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-2 rounded-xl text-sm font-black transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
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

                                            Portfolio
                                        </a>
                                    @endif

                                </div>
                            </td>

                            <td class="px-6 py-5 text-center">

                                @if($lamaran->status_lamaran == 'diterima')

                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        Diterima
                                    </span>

                                @elseif($lamaran->status_lamaran == 'ditolak')

                                    <span class="inline-flex items-center gap-2 bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                        Ditolak
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                                        Pending
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-6 py-16 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-primary rounded-[26px] flex items-center justify-center mx-auto mb-5">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-slate-800">
                                        Belum ada lamaran
                                    </h3>

                                    <p class="text-slate-500 mt-2">
                                        Data lamaran kerja dari user belum tersedia.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection