<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg p-8">

        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-red-600">
                Tambah Event
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan data event baru
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.event.store') }}"
      method="POST">

    @csrf

            <!-- Nama Event -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Nama Event
                </label>

                <input type="text" name="nama_event"
                       placeholder="Masukkan nama event"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Tanggal -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Tanggal Event
                </label>

                <input type="date" name="tanggal_event"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">

            </div>

            <!-- Lokasi -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Lokasi
                </label>

                <input type="text" name="lokasi"
                       placeholder="Masukkan lokasi event"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Deskripsi -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea rows="5" name="deskripsi"
                          placeholder="Masukkan deskripsi event"
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>

            </div>

<div class="mb-5">

    <label class="block text-gray-700 font-semibold mb-2">
        Kuota
    </label>

    <input type="number"
           name="kuota"
           placeholder="Masukkan kuota peserta"
           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

</div>

<div class="mb-5">

    <label class="block text-gray-700 font-semibold mb-2">
        Perusahaan
    </label>

    <select name="perusahaan_id"
            class="w-full border border-gray-300 rounded-xl px-4 py-3">

        @foreach($perusahaan as $p)

            <option value="{{ $p->id }}">
                {{ $p->nama_perusahaan }}
            </option>

        @endforeach

    </select>

</div>
            <!-- Button -->
            <div class="flex justify-end gap-3">

                <a href="/admin/event"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-5 py-3 rounded-xl font-semibold transition">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl font-semibold transition">

                    Simpan Event

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>