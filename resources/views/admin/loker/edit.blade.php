<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Loker</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-2xl rounded-2xl shadow-lg p-8">

        <div class="mb-6">
            <h1 class="text-3xl font-bold text-yellow-500">
                Edit Loker
            </h1>

            <p class="text-gray-500 mt-2">
                Ubah data lowongan kerja
            </p>
        </div>

        <form>

            <!-- Posisi -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Posisi
                </label>

                <input type="text"
                       value="Frontend Developer"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Perusahaan -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Perusahaan
                </label>

                <input type="text"
                       value="ABC Company"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">

            </div>

            <!-- Gaji -->
            <div class="mb-5">

                <label class="block text-gray-700 font-semibold mb-2">
                    Gaji
                </label>

                <input type="text"
                       value="Rp 5.000.000"
                       class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-400">

            </div>

            <!-- Deskripsi -->
            <div class="mb-6">

                <label class="block text-gray-700 font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea rows="5"
                          class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-yellow-400">Mencari frontend developer yang menguasai HTML, CSS, JavaScript, dan Laravel.</textarea>

            </div>

            <!-- Button -->
            <div class="flex justify-end gap-3">

                <a href="/admin/loker"
                   class="bg-gray-300 hover:bg-gray-400 text-black px-5 py-3 rounded-xl font-semibold transition">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black px-5 py-3 rounded-xl font-semibold transition">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>