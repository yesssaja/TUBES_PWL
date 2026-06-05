@extends('perusahaan.layouts.app')

@section('title', 'Lamaran Masuk')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 rounded-3xl shadow-lg p-8 text-white mb-8">
        <h1 class="text-4xl font-black">
            Lamaran Masuk
        </h1>

        <p class="text-white/90 mt-3 text-lg">
            Kelola seluruh kandidat yang melamar lowongan perusahaan Anda.
        </p>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Daftar Pelamar
                </h2>

                <p class="text-gray-500 mt-1">
                    Total {{ $lamarans->count() }} lamaran masuk
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">

                <thead class="bg-red-50">
                    <tr>
                        <th class="px-6 py-5 font-bold text-gray-700">Pelamar</th>
                        <th class="px-6 py-5 font-bold text-gray-700">Lowongan</th>
                        <th class="px-6 py-5 font-bold text-gray-700">CV</th>
                        <th class="px-6 py-5 font-bold text-gray-700">Portfolio</th>
                        <th class="px-6 py-5 font-bold text-gray-700">Status</th>
                        <th class="px-6 py-5 font-bold text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse ($lamarans as $lamaran)

                        @php
                            $namaPelamar = $lamaran->nama ?? $lamaran->user->name ?? 'Pelamar';
                            $emailPelamar = $lamaran->email ?? $lamaran->user->email ?? '-';

                            $foto = $lamaran->foto
                                ? asset('storage/' . $lamaran->foto)
                                : 'https://ui-avatars.com/api/?name=' . urlencode($namaPelamar) . '&background=fee2e2&color=dc2626&bold=true';
                        @endphp

                        <tr class="hover:bg-orange-50/50 transition">

                            {{-- PELAMAR --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <img
                                        src="{{ $foto }}"
                                        class="w-14 h-14 rounded-2xl object-cover shadow-sm border">

                                    <div>
                                        <h3 class="font-bold text-gray-800 text-lg">
                                            {{ $namaPelamar }}
                                        </h3>

                                        <p class="text-gray-500 text-sm">
                                            {{ $emailPelamar }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            {{-- LOWONGAN --}}
                            <td class="px-6 py-5">
                                <h3 class="font-bold text-gray-800">
                                    {{ $lamaran->loker->judul_loker ?? '-' }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Dikirim {{ $lamaran->created_at ? $lamaran->created_at->format('d M Y') : '-' }}
                                </p>
                            </td>

                            {{-- CV --}}
                            <td class="px-6 py-5">
                                @if($lamaran->cv)
                                    <a href="{{ asset('storage/' . $lamaran->cv) }}"
                                       target="_blank"
                                       class="inline-flex bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-bold hover:bg-blue-200 transition">
                                        Lihat CV
                                    </a>
                                @else
                                    <span class="text-gray-400 font-semibold">-</span>
                                @endif
                            </td>

                            {{-- PORTFOLIO --}}
                            <td class="px-6 py-5">
                                @if($lamaran->portfolio)
                                    <a href="{{ $lamaran->portfolio }}"
                                       target="_blank"
                                       class="inline-flex bg-purple-100 text-purple-600 px-4 py-2 rounded-xl font-bold hover:bg-purple-200 transition">
                                        Portfolio
                                    </a>
                                @else
                                    <span class="text-gray-400 font-semibold">-</span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td class="px-6 py-5">
                                @if($lamaran->status_lamaran == 'diterima')
                                    <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-bold">
                                        Diterima
                                    </span>
                                @elseif($lamaran->status_lamaran == 'ditolak')
                                    <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-bold">
                                        Ditolak
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-bold">
                                        Pending
                                    </span>
                                @endif
                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-5 text-center">
                                <a href="{{ route('perusahaan.lamaran.show', $lamaran->id) }}"
                                   class="inline-flex bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-xl font-bold shadow transition">
                                    Detail
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-12 text-center">
                                <div class="max-w-md mx-auto">
                                    <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl">
                                        📄
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-700">
                                        Belum ada lamaran masuk
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Lamaran dari pelamar akan tampil di halaman ini.
                                    </p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection