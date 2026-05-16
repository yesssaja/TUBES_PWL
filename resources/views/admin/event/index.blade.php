<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Data Event
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola semua event di sini
            </p>
        </div>

        <a href="{{ route('admin.event.create') }}"
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-5 py-3 rounded-xl shadow transition">

            + Tambah Event

        </a>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">

                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama Event</th>
                    <th class="p-4 text-left">Tanggal</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

@foreach($events as $event)

<tr class="border-b hover:bg-yellow-50 transition">

    <td class="p-4">
        {{ $loop->iteration }}
    </td>

    <td class="p-4 font-semibold">
        {{ $event->nama_event }}
    </td>

    <td class="p-4">
        {{ $event->tanggal_event }}
    </td>

    <td class="p-4 text-center space-x-2">

        <a href="{{ route('admin.event.edit', $event->id) }}"
           class="bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">

            Edit

        </a>

        <form action="{{ route('admin.event.destroy', $event->id) }}"
              method="POST"
              class="inline">

            @csrf
            @method('DELETE')

            <button
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">

                Hapus

            </button>

        </form>

    </td>

</tr>

@endforeach

</tbody>

        </table>

    </div>

</div>

</body>
</html>