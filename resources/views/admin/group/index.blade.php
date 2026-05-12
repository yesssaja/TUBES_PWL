<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Group</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Monitoring Group
            </h1>

            <p class="text-gray-500 mt-1">
                Pantau aktivitas dan anggota group
            </p>
        </div>

        <button
            class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-5 py-3 rounded-xl shadow transition">

            + Tambah Group

        </button>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total Group
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                12
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Group Aktif
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                9
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                Total Member
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                230
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">

                <tr>
                    <th class="p-4 text-left">Nama Group</th>
                    <th class="p-4 text-left">Jumlah Anggota</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <tr class="border-b hover:bg-yellow-50 transition">

                    <td class="p-4 font-semibold">
                        UI UX Team
                    </td>

                    <td class="p-4">
                        25
                    </td>

                    <td class="p-4">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Aktif
                        </span>

                    </td>

                    <td class="p-4 text-center space-x-2">

                        <button
                            class="bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">

                            Detail

                        </button>

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