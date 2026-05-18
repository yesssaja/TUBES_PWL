<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-red-600">
            Tambah Perusahaan
        </h1>

        <p class="text-gray-500 mt-1">
            Isi data perusahaan baru.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 max-w-4xl">

        @if($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc ml-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.perusahaan.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Nama Perusahaan -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nama Perusahaan
                </label>

                <input type="text"
                       name="nama_perusahaan"
                       value="{{ old('nama_perusahaan') }}"
                       placeholder="Contoh: CV Digital Nusantara"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400"
                       required>
            </div>

            <!-- Bidang -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Bidang / Industri
                </label>

                <input type="text"
                       name="bidang"
                       value="{{ old('bidang') }}"
                       placeholder="Contoh: Technology, Digital Agency, Retail"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Alamat
                </label>

                <input type="text"
                       name="alamat"
                       value="{{ old('alamat') }}"
                       placeholder="Contoh: Medan, Indonesia"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Email dan Website -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                <div>
                    <label class="block font-semibold mb-2">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="hrd@perusahaan.com"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        Website
                    </label>

                    <input type="text"
                           name="website"
                           value="{{ old('website') }}"
                           placeholder="www.perusahaan.com"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

            </div>

            <!-- Jumlah Karyawan -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Jumlah Karyawan
                </label>

                <input type="text"
                       name="jumlah_karyawan"
                       value="{{ old('jumlah_karyawan') }}"
                       placeholder="Contoh: 50-100"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Logo -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Logo Perusahaan
                </label>

                <input type="file"
                       name="logo"
                       accept="image/*"
                       class="w-full border rounded-xl p-3 bg-white focus:outline-none focus:ring-2 focus:ring-red-400">

                <p class="text-sm text-gray-500 mt-1">
                    Format: jpg, jpeg, png, webp. Maksimal 2MB.
                </p>
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Deskripsi Perusahaan
                </label>

                <textarea name="deskripsi"
                          rows="5"
                          placeholder="Tulis deskripsi singkat perusahaan..."
                          class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Simpan Perusahaan
                </button>

                <a href="{{ route('admin.perusahaan.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-xl font-semibold">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>