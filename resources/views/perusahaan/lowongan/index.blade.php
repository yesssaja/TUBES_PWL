@extends('perusahaan.layouts.app')

@section('title', 'Lowongan Saya')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-xl p-6 sm:p-8 mb-8 text-white">

        <div class="absolute -top-12 -right-12 w-44 h-44 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-12 -left-12 w-44 h-44 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <p class="text-white/80 font-semibold mb-2">
                    Dashboard Perusahaan
                </p>

                <h1 class="text-3xl sm:text-4xl font-black">
                    Lowongan Saya
                </h1>

                <p class="text-white/90 mt-3 text-base sm:text-lg max-w-2xl">
                    Kelola seluruh lowongan pekerjaan perusahaan Anda dengan mudah.
                </p>
            </div>

            <a href="{{ route('perusahaan.lowongan.create') }}"
               class="inline-flex items-center justify-center bg-white text-red-600 hover:bg-red-50 px-6 py-4 rounded-2xl font-black shadow-lg transition">
                + Tambah Lowongan
            </a>
        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-bold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- DESKTOP TABLE --}}
    <div class="hidden lg:block bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-6 border-b border-gray-100">
            <h2 class="text-2xl font-black text-gray-800">
                Daftar Lowongan
            </h2>

            <p class="text-gray-500 mt-1">
                Total {{ $lowongans->count() }} lowongan tersedia.
            </p>
        </div>

        <table class="w-full text-left">

            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Lowongan</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Lokasi</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Tipe</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Gaji</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($lowongans as $lowongan)

                    <tr class="hover:bg-orange-50/40 transition">

                        <td class="px-6 py-5">
                            <h3 class="font-black text-gray-800 text-lg">
                                {{ $lowongan->judul_loker }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Dipublish {{ $lowongan->created_at ? $lowongan->created_at->format('d M Y') : '-' }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <p class="font-semibold text-gray-700 max-w-[160px] truncate">
                                {{ $lowongan->lokasi ?? '-' }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <span class="inline-flex bg-blue-50 text-blue-600 border border-blue-100 px-4 py-2 rounded-full text-sm font-black">
                                {{ $lowongan->tipe_pekerjaan ?? '-' }}
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <p class="font-black text-gray-800">
                                {{ $lowongan->gaji ?? '-' }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <span class="inline-flex bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black">
                                Aktif
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-2 items-center">

                                <a href="{{ route('perusahaan.lowongan.show', $lowongan->id) }}"
                                   class="w-28 text-center bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl font-black hover:bg-blue-100 transition">
                                    Detail
                                </a>

                                <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
                                   class="w-28 text-center bg-yellow-50 text-yellow-600 px-4 py-2.5 rounded-xl font-black hover:bg-yellow-100 transition">
                                    Edit
                                </a>

                                <form action="{{ route('perusahaan.lowongan.destroy', $lowongan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="w-28 bg-red-50 text-red-600 px-4 py-2.5 rounded-xl font-black hover:bg-red-100 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="7" class="p-14 text-center">
                            <div class="max-w-md mx-auto">
                                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                                    📄
                                </div>

                                <h3 class="text-xl font-black text-gray-700">
                                    Belum ada lowongan
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    Lowongan yang dibuat perusahaan akan tampil di halaman ini.
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    {{-- MOBILE CARD --}}
    <div class="grid grid-cols-1 gap-6 lg:hidden">

        @forelse($lowongans as $lowongan)

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 p-5 sm:p-6">

                <div class="flex flex-col gap-4">

                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-black text-gray-800 leading-snug">
                                {{ $lowongan->judul_loker }}
                            </h2>

                            <p class="text-gray-500 mt-2">
                                Dipublish {{ $lowongan->created_at ? $lowongan->created_at->format('d M Y') : '-' }}
                            </p>
                        </div>

                        <span class="bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black shrink-0">
                            Aktif
                        </span>
                    </div>

                    <div class="bg-gray-50 rounded-3xl p-4 space-y-4">

                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Lokasi</p>
                            <p class="text-gray-800 font-bold mt-1">
                                {{ $lowongan->lokasi ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Tipe Pekerjaan</p>
                            <p class="text-blue-600 font-bold mt-1">
                                {{ $lowongan->tipe_pekerjaan ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Gaji</p>
                            <p class="text-gray-800 font-bold mt-1">
                                {{ $lowongan->gaji ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                        <a href="{{ route('perusahaan.lowongan.show', $lowongan->id) }}"
                           class="text-center bg-blue-50 text-blue-600 px-4 py-3 rounded-xl font-black hover:bg-blue-100 transition">
                            Detail
                        </a>

                        <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
                           class="text-center bg-yellow-50 text-yellow-600 px-4 py-3 rounded-xl font-black hover:bg-yellow-100 transition">
                            Edit
                        </a>

                        <form action="{{ route('perusahaan.lowongan.destroy', $lowongan->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="w-full bg-red-50 text-red-600 px-4 py-3 rounded-xl font-black hover:bg-red-100 transition">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                    📄
                </div>

                <h3 class="text-xl font-black text-gray-700">
                    Belum ada lowongan
                </h3>

                <p class="text-gray-500 mt-2">
                    Lowongan yang dibuat perusahaan akan tampil di halaman ini.
                </p>
            </div>

        @endforelse

    </div>

</div>

@endsection