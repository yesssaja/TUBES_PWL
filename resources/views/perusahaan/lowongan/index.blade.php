@extends('perusahaan.layouts.app')

@section('title', 'Lowongan Saya')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Lowongan Saya
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola seluruh lowongan pekerjaan perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.lowongan.create') }}"
           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">
            + Tambah Lowongan
        </a>

    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE DESKTOP --}}
    <div class="hidden lg:block bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-red-50">
                <tr>
                    <th class="p-5 font-bold text-gray-700">Lowongan</th>
                    <th class="font-bold text-gray-700">Lokasi</th>
                    <th class="font-bold text-gray-700">Tipe</th>
                    <th class="font-bold text-gray-700">Gaji</th>
                    <th class="font-bold text-gray-700">Pelamar</th>
                    <th class="font-bold text-gray-700">Status</th>
                    <th class="font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($lowongans as $lowongan)

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="p-5">
                            <div>
                                <h3 class="font-bold text-lg">
                                    {{ $lowongan->judul_loker }}
                                </h3>

                                <p class="text-gray-500 text-sm mt-1">
                                    Dipublish {{ $lowongan->created_at ? $lowongan->created_at->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </td>

                        <td>
                            {{ $lowongan->lokasi ?? '-' }}
                        </td>

                        <td>
                            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                                {{ $lowongan->tipe_pekerjaan ?? '-' }}
                            </span>
                        </td>

                        <td class="font-semibold">
                            {{ $lowongan->gaji ?? '-' }}
                        </td>

                        <td>
                            {{ $lowongan->lamarans_count ?? $lowongan->lamarans->count() }} Pelamar
                        </td>

                        <td>
                            <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                                Aktif
                            </span>
                        </td>

                        <td>
                            <div class="flex items-center gap-3">

                                <a href="{{ route('perusahaan.lowongan.show', $lowongan->id) }}"
                                   class="text-blue-600 font-semibold hover:underline">
                                    Detail
                                </a>

                                <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
                                   class="text-yellow-600 font-semibold hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('perusahaan.lowongan.destroy', $lowongan->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 font-semibold hover:underline">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="p-8 text-center text-gray-500">
                            Belum ada lowongan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- MOBILE CARD --}}
    <div class="grid grid-cols-1 gap-6 lg:hidden">

        @forelse($lowongans as $lowongan)

            <div class="bg-white rounded-3xl shadow p-6">

                <div class="flex justify-between items-start mb-4">

                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ $lowongan->judul_loker }}
                        </h2>

                        <p class="text-gray-500 mt-1">
                            {{ $lowongan->lokasi ?? '-' }} • {{ $lowongan->tipe_pekerjaan ?? '-' }}
                        </p>
                    </div>

                    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                        Aktif
                    </span>

                </div>

                <div class="space-y-2 mb-5">

                    <p>
                        <span class="font-semibold">Gaji:</span>
                        {{ $lowongan->gaji ?? '-' }}
                    </p>

                    <p>
                        <span class="font-semibold">Pelamar:</span>
                        {{ $lowongan->lamarans_count ?? $lowongan->lamarans->count() }} Orang
                    </p>

                </div>

                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('perusahaan.lowongan.show', $lowongan->id) }}"
                       class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold">
                        Detail
                    </a>

                    <a href="{{ route('perusahaan.lowongan.edit', $lowongan->id) }}"
                       class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl font-semibold">
                        Edit
                    </a>

                    <form action="{{ route('perusahaan.lowongan.destroy', $lowongan->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow p-8 text-center text-gray-500">
                Belum ada lowongan.
            </div>

        @endforelse

    </div>

</div>

@endsection