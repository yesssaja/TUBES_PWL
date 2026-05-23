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

        {{-- BUTTON --}}
        <a href="{{ route('perusahaan.lowongan.create') }}"
           class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

            + Tambah Lowongan

        </a>

    </div>

    {{-- TABLE DESKTOP --}}
    <div class="hidden lg:block bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-red-50">

                <tr>

                    <th class="p-5 font-bold text-gray-700">
                        Lowongan
                    </th>

                    <th class="font-bold text-gray-700">
                        Lokasi
                    </th>

                    <th class="font-bold text-gray-700">
                        Tipe
                    </th>

                    <th class="font-bold text-gray-700">
                        Gaji
                    </th>

                    <th class="font-bold text-gray-700">
                        Pelamar
                    </th>

                    <th class="font-bold text-gray-700">
                        Status
                    </th>

                    <th class="font-bold text-gray-700">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                {{-- ITEM --}}
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="p-5">

                        <div>

                            <h3 class="font-bold text-lg">
                                UI/UX Designer
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Dipublish 20 Mei 2026
                            </p>

                        </div>

                    </td>

                    <td>
                        Jakarta
                    </td>

                    <td>
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                            Full Time
                        </span>
                    </td>

                    <td class="font-semibold">
                        Rp 5.000.000
                    </td>

                    <td>
                        45 Pelamar
                    </td>

                    <td>

                        <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                            Aktif
                        </span>

                    </td>

                    <td>

                        <div class="flex items-center gap-3">

                            <a href="{{ route('perusahaan.lowongan.show') }}"
                               class="text-blue-600 font-semibold hover:underline">

                                Detail

                            </a>

                            <a href="{{ route('perusahaan.lowongan.edit') }}"
                               class="text-yellow-600 font-semibold hover:underline">

                                Edit

                            </a>

                            <button
                                class="text-red-600 font-semibold hover:underline">

                                Hapus

                            </button>

                        </div>

                    </td>

                </tr>

                {{-- ITEM --}}
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="p-5">

                        <div>

                            <h3 class="font-bold text-lg">
                                Backend Developer
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                Dipublish 18 Mei 2026
                            </p>

                        </div>

                    </td>

                    <td>
                        Medan
                    </td>

                    <td>
                        <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-sm">
                            Remote
                        </span>
                    </td>

                    <td class="font-semibold">
                        Rp 7.000.000
                    </td>

                    <td>
                        62 Pelamar
                    </td>

                    <td>

                        <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-semibold">
                            Review
                        </span>

                    </td>

                    <td>

                        <div class="flex items-center gap-3">

                            <a href="{{ route('perusahaan.lowongan.show') }}"
                               class="text-blue-600 font-semibold hover:underline">

                                Detail

                            </a>

                            <a href="{{ route('perusahaan.lowongan.edit') }}"
                               class="text-yellow-600 font-semibold hover:underline">

                                Edit

                            </a>

                            <button
                                class="text-red-600 font-semibold hover:underline">

                                Hapus

                            </button>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    {{-- MOBILE CARD --}}
    <div class="grid grid-cols-1 gap-6 lg:hidden">

        {{-- CARD --}}
        <div class="bg-white rounded-3xl shadow p-6">

            <div class="flex justify-between items-start mb-4">

                <div>

                    <h2 class="text-2xl font-bold">
                        UI/UX Designer
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Jakarta • Full Time
                    </p>

                </div>

                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm font-semibold">
                    Aktif
                </span>

            </div>

            <div class="space-y-2 mb-5">

                <p>
                    <span class="font-semibold">
                        Gaji:
                    </span>

                    Rp 5.000.000
                </p>

                <p>
                    <span class="font-semibold">
                        Pelamar:
                    </span>

                    45 Orang
                </p>

            </div>

            <div class="flex flex-wrap gap-3">

                <a href="{{ route('perusahaan.lowongan.show') }}"
                   class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold">

                    Detail

                </a>

                <a href="{{ route('perusahaan.lowongan.edit') }}"
                   class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-xl font-semibold">

                    Edit

                </a>

                <button
                    class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold">

                    Hapus

                </button>

            </div>

        </div>

    </div>

</div>

@endsection