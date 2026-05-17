{{-- resources/views/admin/loker/create.blade.php --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Loker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center p-6">
    <div class="bg-white w-full max-w-3xl rounded-2xl shadow-lg p-8">
        <div class="mb-6">
            <h1 class="text-3xl font-black text-red-600">Tambah Loker</h1>
            <p class="text-gray-500 mt-2">Buat lowongan kerja baru</p>
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

        <form action="{{ route('admin.loker.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Perusahaan</label>
                <select name="perusahaan_id" required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="">Pilih Perusahaan</option>
                    @foreach($perusahaan as $p)
                        <option value="{{ $p->id }}" {{ old('perusahaan_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->nama_perusahaan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Posisi / Judul Loker</label>
                <input type="text" name="judul_loker" value="{{ old('judul_loker') }}" required
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tipe Pekerjaan</label>
                    <select name="tipe_pekerjaan" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                        <option value="">Pilih Tipe</option>
                        <option value="Full Time" {{ old('tipe_pekerjaan') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                        <option value="Part Time" {{ old('tipe_pekerjaan') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                        <option value="Internship" {{ old('tipe_pekerjaan') == 'Internship' ? 'selected' : '' }}>Internship</option>
                        <option value="Freelance" {{ old('tipe_pekerjaan') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                        <option value="Contract" {{ old('tipe_pekerjaan') == 'Contract' ? 'selected' : '' }}>Contract</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Gaji</label>
                    <input type="text" name="gaji" value="{{ old('gaji') }}"
                           placeholder="Contoh: Rp 3.000.000 - Rp 5.000.000"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Batas Lamaran</label>
                    <input type="date" name="batas_lamaran" value="{{ old('batas_lamaran') }}" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="6" required
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.loker.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-5 py-3 rounded-xl font-semibold transition">
                    Kembali
                </a>

                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl font-semibold transition">
                    Simpan Loker
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>