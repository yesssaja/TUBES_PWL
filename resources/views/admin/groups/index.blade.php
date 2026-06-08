@php($title = 'Monitoring Group')

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
                        Monitoring Group
                    </h1>

                    <p class="mt-1 text-white/90 font-medium">
                        Pantau aktivitas, status, dan jumlah anggota group.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.groups.create') }}"
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

                Tambah Group
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
                        Total Group
                    </h2>

                    <p class="text-4xl font-black text-primary mt-2">
                        {{ $groups->count() }}
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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-green-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Group Aktif
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $groups->where('is_public', true)->count() }}
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

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-orange-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">
                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total Member
                    </h2>

                    <p class="text-4xl font-black text-orange-600 mt-2">
                        {{ $groups->sum('members_count') }}
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
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft border border-slate-100 overflow-hidden max-w-full">

        <div class="px-7 py-6 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>
                <h2 class="text-2xl font-black text-dark">
                    Daftar Group
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Semua group yang tersimpan di database.
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
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                </svg>

                {{ $groups->count() }} Data Group
            </div>

        </div>

        <div class="w-full max-w-full overflow-x-auto overflow-y-hidden scrollbar-thin scrollbar-thumb-red-200 scrollbar-track-red-50">

            <table class="w-full min-w-[950px]">

                <thead>
                    <tr class="bg-red-50 text-primary border-b border-red-100">
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Nama Group
                        </th>

                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wider font-black">
                            Kategori
                        </th>

                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black">
                            Anggota
                        </th>

                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wider font-black min-w-[210px]">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($groups as $group)

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-primary flex items-center justify-center font-black">
                                        {{ strtoupper(substr($group->name ?? 'G', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-slate-800">
                                            {{ $group->name }}
                                        </div>

                                        <div class="text-sm text-slate-500 mt-1">
                                            Slug: {{ $group->slug }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <span class="inline-flex items-center bg-red-50 text-primary px-3 py-2 rounded-full text-sm font-bold">
                                    {{ $group->category ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5 text-center">
                                <span class="inline-flex items-center justify-center bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-black text-sm">
                                    {{ $group->members_count }} member
                                </span>
                            </td>

                            <td class="px-6 py-5 text-center">
                                @if($group->is_public)
                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 bg-slate-100 text-slate-600 px-4 py-2 rounded-full text-sm font-black">
                                        <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 min-w-[210px]">
                                <div class="flex justify-center items-center gap-2 flex-nowrap">

                                    <a href="{{ route('admin.groups.edit', $group->slug) }}"
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

                                    <form action="{{ route('admin.groups.destroy', $group->slug) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus group ini?')">

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
                            <td colspan="5" class="px-6 py-16 text-center">

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
                                                d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-slate-800">
                                        Belum ada data group
                                    </h3>

                                    <p class="text-slate-500 mt-2">
                                        Silakan tambahkan group baru terlebih dahulu.
                                    </p>

                                    <a href="{{ route('admin.groups.create') }}"
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

                                        Tambah Group
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