{{-- resources/views/admin/loker/index.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Loker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7f0c8] min-h-screen p-6 md:p-10">

<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-4xl font-black text-red-600">Data Loker</h1>
        <p class="text-gray-700 mt-2">Kelola lowongan kerja</p>
    </div>

    <div class="flex gap-3">
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-800 text-white px-5 py-3 rounded-xl font-bold">
            Dashboard
        </a>

        <a href="{{ route('admin.loker.create') }}" class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl font-bold">
            Tambah Loker
        </a>
    </div>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-gray-500 font-semibold">Total Loker</p>
        <h2 class="text-3xl font-black text-red-600">{{ $totalLoker }}</h2>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-gray-500 font-semibold">Loker Aktif</p>
        <h2 class="text-3xl font-black text-green-600">{{ $lokerAktif }}</h2>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-gray-500 font-semibold">Total Perusahaan</p>
        <h2 class="text-3xl font-black text-yellow-500">{{ $totalPerusahaan }}</h2>
    </div>
</div>

<div class="bg-white rounded-3xl shadow-xl overflow-x-auto">
    <table class="w-full min-w-[1000px]">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Judul</th>
                <th class="p-4 text-left">Perusahaan</th>
                <th class="p-4 text-left">Lokasi</th>
                <th class="p-4 text-left">Tipe</th>
                <th class="p-4 text-left">Batas</th>
                <th class="p-4 text-left">Lamaran</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($lokers as $loker)
                <tr class="border-b hover:bg-yellow-50 transition">
                    <td class="p-4">{{ $loop->iteration }}</td>
                    <td class="p-4 font-bold">{{ $loker->judul_loker }}</td>
                    <td class="p-4">{{ $loker->perusahaan->nama_perusahaan ?? '-' }}</td>
                    <td class="p-4">{{ $loker->lokasi }}</td>
                    <td class="p-4">{{ $loker->tipe_pekerjaan }}</td>
                    <td class="p-4">
                        {{ $loker->batas_lamaran ? $loker->batas_lamaran->format('d M Y') : '-' }}
                    </td>
                    <td class="p-4">
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-bold">
                            {{ $loker->lamarans->count() }}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.loker.edit', $loker->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-black px-4 py-2 rounded-lg text-sm font-bold">
                            Edit
                        </a>

                        <form action="{{ route('admin.loker.destroy', $loker->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus loker ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="p-8 text-center text-gray-500">
                        Belum ada data loker.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>