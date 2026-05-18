<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Kelola Perusahaan
            </h1>

            <p class="text-gray-500 mt-1">
                Tambah, edit, dan hapus data perusahaan.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="{{ route('admin.dashboard') }}"
               class="bg-gray-700 hover:bg-gray-800 text-white font-semibold px-5 py-3 rounded-xl shadow transition">
                ← Dashboard
            </a>

            <a href="{{ route('admin.perusahaan.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded-xl shadow transition">
                + Tambah Perusahaan
            </a>
        </div>

    </div>

    <!-- Success -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total Perusahaan
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                {{ $perusahaans->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Perusahaan Dengan Website
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                {{ $perusahaans->filter(fn($p) => !empty($p->website ?? $p->situs ?? null))->count() }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                Perusahaan Dengan Email
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                {{ $perusahaans->filter(fn($p) => !empty($p->email ?? null))->count() }}
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">
                <tr>
                    <th class="p-4 text-left">Logo</th>
                    <th class="p-4 text-left">Nama Perusahaan</th>
                    <th class="p-4 text-left">Bidang</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Website</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

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

                    <tr class="border-b hover:bg-yellow-50 transition align-top">

                        <td class="p-4">
                            <img src="{{ $logoUrl }}"
                                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                                 alt="Logo"
                                 class="w-16 h-16 rounded-xl object-contain bg-gray-100 border">
                        </td>

                        <td class="p-4">
                            <div class="font-bold text-gray-800">
                                {{ $namaPerusahaan }}
                            </div>

                            <div class="text-sm text-gray-500 mt-1">
                                {{ $perusahaan->alamat ?? $perusahaan->lokasi ?? '-' }}
                            </div>
                        </td>

                        <td class="p-4">
                            {{ $bidang }}
                        </td>

                        <td class="p-4">
                            {{ $perusahaan->email ?? '-' }}
                        </td>

                        <td class="p-4">
                            @if($website)
                                <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">
                                    {{ $website }}
                                </a>
                            @else
                                -
                            @endif
                        </td>

                        <td class="p-4 text-center space-y-2">

                            <a href="{{ route('perusahaan.detail', $perusahaan->id) }}"
                               target="_blank"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                Lihat
                            </a>

                            <a href="{{ route('admin.perusahaan.edit', $perusahaan->id) }}"
                               class="inline-block bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">
                                Edit
                            </a>

                            <form action="{{ route('admin.perusahaan.destroy', $perusahaan->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus perusahaan ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                                    Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="p-6 text-center text-gray-500">
                            Belum ada data perusahaan.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>