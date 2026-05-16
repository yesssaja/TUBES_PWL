<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg p-8">

        <!-- Header -->
        <div class="mb-6">

            <h1 class="text-3xl font-bold text-red-600">
                Edit Event
            </h1>

            <p class="text-gray-500 mt-2">
                Ubah data event
            </p>

        </div>

        <!-- Form -->
        <form action="{{ route('admin.event.update', $event->id) }}"
      method="POST">

    @csrf
    @method('PUT')

            <!-- Nama Event -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Nama Event
                </label>

                <input type="text" name="nama_event"
                       value="{{ $event->nama_event }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Tanggal -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Tanggal Event
                </label>

                <input type="date" name="tanggal_event"
                value="{{ $event->tanggal_event }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">

            </div>

            <!-- Lokasi -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Lokasi
                </label>

                <input type="text"
                      name="lokasi" value="{{ $event->lokasi }}"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Deskripsi -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea rows="5"
                name="deskripsi"
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">{{ $event->deskripsi }}</textarea>

            </div>

<select name="perusahaan_id"
        class="w-full border border-gray-300 rounded-xl px-4 py-3">

    @foreach($perusahaan as $p)

        <option value="{{ $p->id }}"
            {{ $event->perusahaan_id == $p->id ? 'selected' : '' }}>

            {{ $p->nama_perusahaan }}

        </option>

    @endforeach

</select>

<div class="mb-5">

    <label class="block text-gray-700 font-semibold mb-2">
        Kuota
    </label>

    <input type="number"
           name="kuota"
           value="{{ $event->kuota }}"
           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

</div>

            <!-- Button -->
            <div class="flex justify-end gap-3">

                <a href="/admin/event"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-5 py-3 rounded-xl font-semibold transition">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-3 rounded-xl font-semibold transition">

                    Update Event

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>