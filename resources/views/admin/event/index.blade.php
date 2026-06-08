@php($title = 'Data Event')

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
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
                </svg>
            </div>

            <div>
                <h1 class="text-4xl font-black tracking-wide">
                    Data Event
                </h1>

                <p class="mt-1 text-white/90 font-medium">
                    Kelola semua event yang tersedia di LOKER SEEKER.
                </p>
            </div>
        </div>

        <a href="{{ route('admin.event.create') }}"
            class="inline-flex items-center justify-center gap-2 bg-white hover:bg-slate-100 text-primary font-black px-6 py-3 rounded-2xl shadow-lg transition">

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

            Tambah Event
        </a>

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
                    Total Event
                </h2>

                <p class="text-4xl font-black text-primary mt-2">
                    {{ $events->count() }}
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
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
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
                    Daftar Event
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Semua data event yang tersimpan di database.
                </p>
            </div>

            <div class="bg-red-50 text-primary px-4 py-2 rounded-2xl text-sm font-bold">
                {{ $events->count() }} Data Tersedia
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead>
                    <tr class="bg-red-50 text-primary border-b border-red-100">
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Nama Event
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Jam
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Lokasi
                        </th>

                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($events as $event)

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            <td class="px-6 py-5">
                                <div class="w-9 h-9 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center font-black">
                                    {{ $loop->iteration }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <div class="font-black text-slate-800">
                                    {{ $event->nama_event }}
                                </div>

                                <div class="text-sm text-slate-500 mt-1">
                                    {{ $event->perusahaan->nama_perusahaan
                                        ?? $event->perusahaan->nama
                                        ?? $event->perusahaan->name
                                        ?? 'Tanpa perusahaan' }}
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 bg-red-50 text-primary px-3 py-2 rounded-full text-sm font-bold">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
                                    </svg>

                                    {{ $event->tanggal_event ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 bg-yellow-50 text-yellow-600 px-3 py-2 rounded-full text-sm font-bold">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    {{ $event->jam ? substr($event->jam, 0, 5) : '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 text-slate-700 font-semibold">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 text-primary"
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

                                    {{ $event->lokasi ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('admin.event.edit', $event->id) }}"
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

                                    <form action="{{ route('admin.event.destroy', $event->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus event ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center gap-2 bg-red-100 hover:bg-red-200 text-primary px-4 py-2 rounded-xl text-sm font-black transition">

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

                                    <div class="w-20 h-20 bg-red-100 text-primary rounded-[26px] flex items-center justify-center mx-auto mb-5">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
                                        </svg>

                                    </div>

                                    <h3 class="text-2xl font-black text-slate-800">
                                        Belum ada data event
                                    </h3>

                                    <p class="text-slate-500 mt-2">
                                        Silakan tambahkan event baru terlebih dahulu.
                                    </p>

                                    <a href="{{ route('admin.event.create') }}"
                                        class="inline-flex items-center gap-2 mt-6 bg-primary hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow-lg transition">

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

                                        Tambah Event
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