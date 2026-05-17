{{-- resources/views/admin/loker/edit.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Loker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-lg p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-black text-yellow-500">Edit Loker</h1>
            <p class="text-gray-500 mt-2">Ubah data lowongan kerja</p>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.loker.update', $loker->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Perusahaan</label>
                <select name="perusahaan_id" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                    @foreach($perusahaan as $p)
                        <option value="{{ $p->id }}" {{ old('perusahaan_id', $loker->perusahaan_id) == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_perusahaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Posisi / Judul Loker</label>
                <input type="text" name="judul_loker" value="{{ old('judul_loker', $loker->judul_loker) }}" required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $loker->lokasi) }}" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tipe Pekerjaan</label>
                    <select name="tipe_pekerjaan" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                        @foreach(['Full Time', 'Part Time', 'Internship', 'Freelance', 'Contract'] as $tipe)
                            <option value="{{ $tipe }}" {{ old('tipe_pekerjaan', $loker->tipe_pekerjaan) == $tipe ? 'selected' : '' }}>
                                {{ $tipe }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Gaji</label>
                    <input type="text" name="gaji" value="{{ old('gaji', $loker->gaji) }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Batas Lamaran</label>
                    <input type="date" name="batas_lamaran" value="{{ old('batas_lamaran', $loker->batas_lamaran->format('Y-m-d')) }}" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="6" required
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('deskripsi', $loker->deskripsi) }}</textarea>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.loker.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-5 py-3 rounded-xl font-semibold transition">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-3 rounded-xl font-semibold transition">
                    Update Loker
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>