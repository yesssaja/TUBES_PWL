<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold text-red-600">
                Data User
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola data seluruh user
            </p>
        </div>

        <button
            class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-5 py-3 rounded-xl shadow transition">

            + Tambah User

        </button>

    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-red-500">
            <h2 class="text-gray-500 text-sm">
                Total User
            </h2>

            <p class="text-3xl font-bold text-red-600 mt-2">
                120
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-yellow-400">
            <h2 class="text-gray-500 text-sm">
                Admin
            </h2>

            <p class="text-3xl font-bold text-yellow-500 mt-2">
                5
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-5 border-l-8 border-orange-500">
            <h2 class="text-gray-500 text-sm">
                User Aktif
            </h2>

            <p class="text-3xl font-bold text-orange-500 mt-2">
                98
            </p>
        </div>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-red-500 text-white">

                <tr>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <tr class="border-b hover:bg-yellow-50 transition">

                    <td class="p-4 font-semibold">
                        Yezica
                    </td>

                    <td class="p-4">
                        yezica@gmail.com
                    </td>

                    <td class="p-4">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                            User
                        </span>

                    </td>

                    <td class="p-4 text-center space-x-2">

                        <button
                            class="bg-yellow-400 hover:bg-yellow-500 px-4 py-2 rounded-lg text-sm font-semibold">

                            Edit

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