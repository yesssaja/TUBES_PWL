<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Lamaran</title>
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
                    Data Lamaran
                </h1>

                <p class="mt-2 text-white/90">
                    Kelola lamaran kerja yang dikirim oleh user.
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="bg-white/20 hover:bg-white/30 text-white font-bold px-5 py-3 rounded-2xl shadow transition text-center">
                ← Dashboard
            </a>

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
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Total Lamaran
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $lamarans->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl">
                    📩
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-yellow-400 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Pending
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $lamarans->where('status_lamaran', 'pending')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-2xl">
                    ⏳
                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border-l-8 border-green-500 hover:-translate-y-1 transition">
            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-gray-500 text-sm font-semibold">
                        Diterima
                    </h2>

                    <p class="text-4xl font-black text-green-600 mt-2">
                        {{ $lamarans->where('status_lamaran', 'diterima')->count() }}
                    </p>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                    ✅
                </div>

            </div>
        </div>

    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-white">

        <div class="px-6 py-5 border-b bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-xl font-black text-gray-800">
                    Daftar Lamaran
                </h2>

                <p class="text-sm text-gray-500">
                    Semua data lamaran kerja yang tersimpan di database.
                </p>
            </div>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">No</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Pelamar</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Loker</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Perusahaan</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">HP</th>
                        <th class="p-4 text-left text-sm uppercase tracking-wide">Dokumen</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Status</th>
                        <th class="p-4 text-center text-sm uppercase tracking-wide">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($lamarans as $lamaran)

                        <tr class="hover:bg-yellow-50 transition align-middle">

                            <td class="p-4 font-bold text-gray-700">
                                {{ $loop->iteration }}
                            </td>

                            <td class="p-4">
                                <div class="font-black text-gray-800">
                                    {{ $lamaran->nama }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    {{ $lamaran->email }}
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="font-bold text-gray-800">
                                    {{ $lamaran->loker->judul_loker ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500 mt-1">
                                    {{ $lamaran->loker->lokasi ?? '-' }}
                                </div>
                            </td>

                            <td class="p-4">
                                <span class="inline-block bg-red-50 text-red-600 px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $lamaran->loker->perusahaan->nama_perusahaan
                                        ?? $lamaran->loker->perusahaan->nama
                                        ?? $lamaran->loker->perusahaan->name
                                        ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4 text-gray-700">
                                {{ $lamaran->hp ?? '-' }}
                            </td>

                            <td class="p-4">
                                <div class="flex flex-col gap-2">

                                    @if($lamaran->cv)
                                        <a href="{{ asset('storage/' . $lamaran->cv) }}"
                                           target="_blank"
                                           class="inline-block bg-red-50 hover:bg-red-100 text-red-600 px-3 py-2 rounded-xl text-sm font-bold transition text-center">
                                            Lihat CV
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-sm">
                                            CV tidak ada
                                        </span>
                                    @endif

                                    @if($lamaran->portfolio)
                                        <a href="{{ $lamaran->portfolio }}"
                                           target="_blank"
                                           class="inline-block bg-blue-50 hover:bg-blue-100 text-blue-600 px-3 py-2 rounded-xl text-sm font-bold transition text-center">
                                            Portfolio
                                        </a>
                                    @endif

                                </div>
                            </td>

                            <td class="p-4 text-center">

                                @if($lamaran->status_lamaran == 'diterima')

                                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Diterima
                                    </span>

                                @elseif($lamaran->status_lamaran == 'ditolak')

                                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="inline-block bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td class="p-4">

                                @if($lamaran->status_lamaran == 'pending')

                                    <div class="flex justify-center items-center gap-2">

                                        <form action="{{ route('admin.lamaran.approve', $lamaran->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menerima lamaran ini?')">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                                Terima
                                            </button>

                                        </form>

                                        <form action="{{ route('admin.lamaran.reject', $lamaran->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menolak lamaran ini?')">

                                            @csrf
                                            @method('PUT')

                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow transition">
                                                Tolak
                                            </button>

                                        </form>

                                    </div>

                                @else

                                    <div class="text-center">
                                        <span class="inline-block bg-gray-100 text-gray-500 px-4 py-2 rounded-full text-sm font-bold">
                                            Sudah diproses
                                        </span>
                                    </div>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="p-12 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center text-4xl mx-auto mb-4">
                                        📩
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada lamaran
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data lamaran kerja dari user belum tersedia.
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

</body>
</html>