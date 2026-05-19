<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Perusahaan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">

<div class="min-h-screen p-4 md:p-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-8 mb-8 text-white">

        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-5">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Kelola Perusahaan
                </h1>

                <p class="mt-2 text-white/90">
                    Tambah, edit, dan hapus data perusahaan yang bekerja sama.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                    ← Dashboard
                </a>

                <a href="{{ route('admin.perusahaan.create') }}"
                   class="bg-white hover:bg-gray-100 text-red-600 font-black px-5 py-3 rounded-2xl shadow transition text-center">
                    + Tambah Perusahaan
                </a>

            </div>

        </div>

    </div>

    <!-- Success -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-red-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Total Perusahaan
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $perusahaans->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    🏢
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Dengan Website
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $perusahaans->filter(fn($p) => !empty($p->website ?? $p->situs ?? null))->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    🌐
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-orange-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Dengan Email
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $perusahaans->filter(fn($p) => !empty($p->email ?? null))->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl">
                    ✉️
                </div>
            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Data Perusahaan
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar seluruh perusahaan yang tersimpan di database.
                </p>
            </div>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Logo</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Nama Perusahaan</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Bidang</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Email</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Website</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
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

                        <tr class="hover:bg-yellow-50 transition align-middle">

                            <td class="p-4">
                                <div class="w-16 h-16 rounded-2xl bg-gray-100 border border-gray-200 shadow-sm flex items-center justify-center overflow-hidden">
                                    <img src="{{ $logoUrl }}"
                                         onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                         alt="Logo"
                                         class="w-full h-full object-contain p-2">
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="font-black text-gray-800">
                                    {{ $namaPerusahaan }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    📍 {{ $perusahaan->alamat ?? $perusahaan->lokasi ?? '-' }}
                                </div>
                            </td>

                            <td class="p-4">
                                <span class="inline-block bg-red-50 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $bidang }}
                                </span>
                            </td>

                            <td class="p-4">
                                @if(!empty($perusahaan->email))
                                    <span class="text-gray-700">
                                        {{ $perusahaan->email }}
                                    </span>
                                @else
                                    <span class="text-gray-400">
                                        -
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                @if($website)
                                    <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                                       target="_blank"
                                       class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 hover:underline font-semibold">
                                        {{ $website }}
                                        <span>↗</span>
                                    </a>
                                @else
                                    <span class="text-gray-400">
                                        -
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('admin.perusahaan.edit', $perusahaan->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus perusahaan ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="p-12 text-center">

                                <div class="max-w-md mx-auto">
                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        🏢
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data perusahaan
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Silakan tambahkan perusahaan baru terlebih dahulu.
                                    </p>

                                    <a href="{{ route('admin.perusahaan.create') }}"
                                       class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow transition">
                                        + Tambah Perusahaan
                                    </a>
                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>