<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Review</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-red-600">
            Edit Review
        </h1>

        <p class="text-gray-500 mt-1">
            Perbarui data review perusahaan
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

        <form action="{{ route('admin.review.update', $review->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Perusahaan -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Perusahaan
                </label>

                <select name="perusahaan_id"
                        class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">

                    <option value="">-- Pilih Perusahaan --</option>

                    @foreach($perusahaans as $perusahaan)
                        @php
                            $namaPerusahaan = $perusahaan->nama_perusahaan
                                ?? $perusahaan->nama
                                ?? $perusahaan->name
                                ?? 'Perusahaan';
                        @endphp

                        <option value="{{ $perusahaan->id }}"
                            {{ old('perusahaan_id', $review->perusahaan_id) == $perusahaan->id ? 'selected' : '' }}>
                            {{ $namaPerusahaan }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Nama Reviewer -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Nama Reviewer
                </label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama', $review->nama) }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400"
                       required>
            </div>

            <!-- Posisi -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Posisi / Jabatan
                </label>

                <input type="text"
                       name="posisi"
                       value="{{ old('posisi', $review->posisi) }}"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <!-- Rating utama -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Rating Utama
                </label>

                <input type="number"
                       name="rating"
                       value="{{ old('rating', $review->rating) }}"
                       min="1"
                       max="5"
                       step="0.1"
                       class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400"
                       required>
            </div>

            <!-- Rating Detail -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">

                <div>
                    <label class="block font-semibold mb-2">
                        Rating Gaji
                    </label>

                    <input type="number"
                           name="rating_gaji"
                           value="{{ old('rating_gaji', $review->rating_gaji) }}"
                           min="1"
                           max="5"
                           step="0.1"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        Rating Kultur
                    </label>

                    <input type="number"
                           name="rating_kultur"
                           value="{{ old('rating_kultur', $review->rating_kultur) }}"
                           min="1"
                           max="5"
                           step="0.1"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

                <div>
                    <label class="block font-semibold mb-2">
                        Rating Fasilitas
                    </label>

                    <input type="number"
                           name="rating_fasilitas"
                           value="{{ old('rating_fasilitas', $review->rating_fasilitas) }}"
                           min="1"
                           max="5"
                           step="0.1"
                           class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">
                </div>

            </div>

            <!-- Ulasan -->
            <div class="mb-4">
                <label class="block font-semibold mb-2">
                    Ulasan
                </label>

                <textarea name="ulasan"
                          rows="5"
                          class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400"
                          required>{{ old('ulasan', $review->ulasan) }}</textarea>
            </div>

            <!-- Balasan Perusahaan -->
            <div class="mb-6">
                <label class="block font-semibold mb-2">
                    Balasan Perusahaan
                </label>

                <textarea name="balasan_perusahaan"
                          rows="4"
                          class="w-full border rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-red-400">{{ old('balasan_perusahaan', $review->balasan_perusahaan) }}</textarea>
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.review.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-xl font-semibold">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>