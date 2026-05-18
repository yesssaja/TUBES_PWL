<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? $perusahaan->name
        ?? '';

    $bidang = $perusahaan->bidang
        ?? $perusahaan->industri
        ?? $perusahaan->industry
        ?? '';

    $alamat = $perusahaan->alamat
        ?? $perusahaan->lokasi
        ?? '';

    $website = $perusahaan->website
        ?? $perusahaan->situs
        ?? '';

    $deskripsi = $perusahaan->deskripsi
        ?? $perusahaan->description
        ?? '';

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

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-red-600">
            Edit Perusahaan
        </h1>

        <p class="text-gray-500 mt-1">
            Perbarui data perusahaan.
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

        <!-- Preview Logo -->
        <div class="mb-6">
            <label class="block font-semibold mb-2">
                Logo Saat Ini
            </label>

            <img src="{{ $logoUrl }}"
                 onerror="this.src='{{ asset('foto_perusahaan/images.png') }}'"
                 alt="Logo Perusahaan"
                 class="w-24 h-24 rounded-xl object-contain bg-gray-100 border p-2">
        </div>

        <form action="{{ route('admin.perusahaan.update', $perusahaan->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Nama Perusahaan -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nama Perusahaan
                </label>

                <input type="text"
                       name="nama_perusahaan"
                       value="{{ old('nama_perusahaan', $namaPerusahaan) }}"
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
                       value="{{ old('bidang', $bidang) }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Alamat
                </label>

                <input type="text"
                       name="alamat"
                       value="{{ old('alamat', $alamat) }}"
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
                           value="{{ old('email', $perusahaan->email ?? '') }}"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        Website
                    </label>

                    <input type="text"
                           name="website"
                           value="{{ old('website', $website) }}"
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
                       value="{{ old('jumlah_karyawan', $perusahaan->jumlah_karyawan ?? '') }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Logo Baru -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Ganti Logo Perusahaan
                </label>

                <input type="file"
                       name="logo"
                       accept="image/*"
                       class="w-full border rounded-xl p-3 bg-white focus:outline-none focus:ring-2 focus:ring-red-400">

                <p class="text-sm text-gray-500 mt-1">
                    Kosongkan jika tidak ingin mengganti logo.
                </p>
            </div>

            <!-- Deskripsi -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Deskripsi Perusahaan
                </label>

                <textarea name="deskripsi"
                          rows="5"
                          class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('deskripsi', $deskripsi) }}</textarea>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Simpan Perubahan
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