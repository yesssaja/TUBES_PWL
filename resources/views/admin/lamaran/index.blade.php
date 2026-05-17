{{-- resources/views/admin/lamaran/index.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Lamaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f7f0c8] min-h-screen p-6 md:p-10">

<div class="mb-8 flex justify-between items-center">
    <div>
        <h1 class="text-4xl font-black text-red-600">Data Lamaran</h1>
        <p class="text-gray-700 mt-2">Kelola lamaran kerja dari user</p>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="bg-gray-800 text-white px-5 py-3 rounded-xl font-bold">
        Dashboard
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-3xl shadow-xl overflow-x-auto">
    <table class="w-full min-w-[1000px]">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-4 text-left">No</th>
                <th class="p-4 text-left">Pelamar</th>
                <th class="p-4 text-left">Loker</th>
                <th class="p-4 text-left">Perusahaan</th>
                <th class="p-4 text-left">HP</th>
                <th class="p-4 text-left">CV</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($lamarans as $lamaran)
                <tr class="border-b hover:bg-yellow-50 transition align-top">
                    <td class="p-4">{{ $loop->iteration }}</td>

                    <td class="p-4">
                        <p class="font-bold">{{ $lamaran->nama }}</p>
                        <p class="text-sm text-gray-600">{{ $lamaran->email }}</p>
                    </td>

                    <td class="p-4 font-semibold">
                        {{ $lamaran->loker->judul_loker ?? '-' }}
                    </td>

                    <td class="p-4">
                        {{ $lamaran->loker->perusahaan->nama_perusahaan ?? '-' }}
                    </td>

                    <td class="p-4">
                        {{ $lamaran->hp }}
                    </td>

                    <td class="p-4 space-y-1">
                        <a href="{{ asset('storage/' . $lamaran->cv) }}" target="_blank"
                           class="text-red-600 font-bold underline">
                            Lihat CV
                        </a>

                        @if($lamaran->portfolio)
                            <br>
                            <a href="{{ $lamaran->portfolio }}" target="_blank"
                               class="text-blue-600 font-bold underline">
                                Portfolio
                            </a>
                        @endif
                    </td>

                    <td class="p-4">
                        @if($lamaran->status_lamaran == 'diterima')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">
                                Diterima
                            </span>
                        @elseif($lamaran->status_lamaran == 'ditolak')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">
                                Ditolak
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-bold">
                                Pending
                            </span>
                        @endif
                    </td>

                    <td class="p-4 text-center">
                        @if($lamaran->status_lamaran == 'pending')
                            <form action="{{ route('admin.lamaran.approve', $lamaran->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-bold">
                                    Terima
                                </button>
                            </form>

                            <form action="{{ route('admin.lamaran.reject', $lamaran->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold">
                                    Tolak
                                </button>
                            </form>
                        @else
                            <span class="text-gray-500 text-sm">
                                Sudah diproses
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="p-8 text-center text-gray-500">
                        Belum ada lamaran.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>