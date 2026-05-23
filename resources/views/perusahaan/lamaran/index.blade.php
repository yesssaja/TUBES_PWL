@extends('perusahaan.layouts.app')

@section('title', 'Lamaran Masuk')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Lamaran Masuk
        </h1>

        <p class="text-gray-500 mt-2">
            Kelola seluruh kandidat yang melamar lowongan perusahaan Anda.
        </p>

    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-red-50">

                <tr>

                    <th class="p-5">
                        Pelamar
                    </th>

                    <th>
                        Lowongan
                    </th>

                    <th>
                        CV
                    </th>

                    <th>
                        Portfolio
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse ($lamarans as $lamaran)

                    @php

                        $foto = $lamaran->foto
                            ? asset('storage/' . $lamaran->foto)
                            : 'https://ui-avatars.com/api/?name=' . urlencode($lamaran->nama);

                    @endphp

                    <tr class="border-b hover:bg-gray-50">

                        {{-- PELAMAR --}}
                        <td class="p-5">

                            <div class="flex items-center gap-4">

                                <img
                                    src="{{ $foto }}"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>

                                    <h3 class="font-bold text-lg">
                                        {{ $lamaran->nama }}
                                    </h3>

                                    <p class="text-gray-500 text-sm">
                                        {{ $lamaran->email }}
                                    </p>

                                </div>

                            </div>

                        </td>

                        {{-- LOKER --}}
                        <td>

                            <div>

                                <h3 class="font-semibold">
                                    {{ $lamaran->loker->judul_loker ?? '-' }}
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $lamaran->hp }}
                                </p>

                            </div>

                        </td>

                        {{-- CV --}}
                        <td>

                            @if($lamaran->cv)

                                <a href="{{ asset('storage/' . $lamaran->cv) }}"
                                   target="_blank"
                                   class="text-blue-600 font-semibold">

                                    Lihat CV

                                </a>

                            @else

                                -

                            @endif

                        </td>

                        {{-- PORTFOLIO --}}
                        <td>

                            @if($lamaran->portfolio)

                                <a href="{{ $lamaran->portfolio }}"
                                   target="_blank"
                                   class="text-blue-600 font-semibold">

                                    Portfolio

                                </a>

                            @else

                                -

                            @endif

                        </td>

                        {{-- STATUS --}}
                        <td>

                            @if($lamaran->status_lamaran == 'diterima')

                                <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Diterima
                                </span>

                            @elseif($lamaran->status_lamaran == 'ditolak')

                                <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Ditolak
                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Pending
                                </span>

                            @endif

                        </td>

                        {{-- AKSI --}}
                        <td>

                            <a href="#"
                               class="text-blue-600 font-semibold">

                                Detail

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="p-10 text-center text-gray-500">

                            Belum ada lamaran masuk.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection