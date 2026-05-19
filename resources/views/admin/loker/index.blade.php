<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Loker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-50 via-orange-50 to-red-100 min-h-screen text-gray-800">

<div class="min-h-screen p-4 md:p-8">

    <!-- Header -->
    <div class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-3xl shadow-xl p-6 md:p-8 mb-8 text-white">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div>
                <h1 class="text-3xl md:text-4xl font-black">
                    Data Loker
                </h1>

                <p class="mt-2 text-white/90">
                    Kelola semua lowongan kerja yang tersedia di LOKER SEEKER.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3">

                <a href="{{ route('admin.dashboard') }}"
                   class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                    ← Dashboard
                </a>

                <a href="{{ route('admin.loker.create') }}"
                   class="bg-white hover:bg-gray-100 text-red-600 font-black px-5 py-3 rounded-2xl shadow transition text-center">
                    + Tambah Loker
                </a>

            </div>

        </div>

    </div>

    <!-- Success Message -->
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
                    <p class="text-gray-500 text-sm font-semibold">
                        Total Loker
                    </p>

                    <h2 class="text-4xl font-black text-red-600 mt-2">
                        {{ $totalLoker }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    💼
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-green-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500 text-sm font-semibold">
                        Loker Aktif
                    </p>

                    <h2 class="text-4xl font-black text-green-600 mt-2">
                        {{ $lokerAktif }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                    ✅
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500 text-sm font-semibold">
                        Total Perusahaan
                    </p>

                    <h2 class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $totalPerusahaan }}
                    </h2>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    🏢
                </div>

            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Daftar Lowongan Kerja
                </h2>

                <p class="text-sm text-gray-500">
                    Semua data loker yang tersimpan di database.
                </p>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1050px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">No</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Judul</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Perusahaan</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Lokasi</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Tipe</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Batas</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Lamaran</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($lokers as $loker)

                        <tr class="hover:bg-yellow-50 transition align-middle">

                            <td class="p-4 font-bold text-gray-700">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4">
                                <div class="font-black text-gray-800">
                                    {{ $loker->judul_loker }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    Gaji: {{ $loker->gaji ?? 'Kompetitif' }}
                                </div>
                            </td>

                            <td class="p-4">
                                <span class="inline-block bg-red-50 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $loker->perusahaan->nama_perusahaan
                                        ?? $loker->perusahaan->nama
                                        ?? $loker->perusahaan->name
                                        ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4 text-gray-700">
                                📍 {{ $loker->lokasi ?? '-' }}
                            </td>

                            <td class="p-4">
                                <span class="inline-block bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $loker->tipe_pekerjaan ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4">
                                <span class="inline-block bg-yellow-50 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    @if($loker->batas_lamaran)
                                        {{ $loker->batas_lamaran instanceof \Carbon\Carbon
                                            ? $loker->batas_lamaran->format('d M Y')
                                            : \Carbon\Carbon::parse($loker->batas_lamaran)->format('d M Y') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </td>

                            <td class="p-4 text-center">
                                <span class="inline-flex items-center justify-center bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-black text-sm">
                                    {{ $loker->lamarans->count() }}
                                </span>
                            </td>

                            <td class="p-4">
                                <div class="flex justify-center items-center gap-2">

                                    <a href="{{ route('admin.loker.edit', $loker->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.loker.destroy', $loker->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus loker ini?')">

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
                            <td colspan="8" class="p-12 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        💼
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data loker
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Silakan tambahkan lowongan kerja baru terlebih dahulu.
                                    </p>

                                    <a href="{{ route('admin.loker.create') }}"
                                       class="inline-block mt-6 bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-2xl font-bold shadow transition">
                                        + Tambah Loker
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