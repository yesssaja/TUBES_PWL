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

        <a href="/admin/event/create"
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

                <tr class="border-b hover:bg-yellow-50 transition">

                    <td class="p-4">1</td>

                    <td class="p-4 font-semibold">
                        Seminar Teknologi
                    </td>

                    <td class="p-4">
                        10 Mei 2026
                    </td>

                    <td class="p-4 text-center space-x-2">

                        <a href="/admin/event/edit"
                           class="bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">

                            Edit

                        </a>

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">

                            Hapus

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>