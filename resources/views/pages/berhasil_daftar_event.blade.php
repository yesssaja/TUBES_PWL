<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil Daftar Event</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-yellow-500 via-orange-50 to-red-100 min-h-screen flex items-center justify-center text-gray-800">

    <div class="bg-white rounded-3xl shadow-2xl p-10 max-w-lg text-center">

        <div class="text-6xl mb-5">
            ✅
        </div>

        <h1 class="text-4xl font-black text-red-600 mb-4">
            RSVP Berhasil!
        </h1>

        <p class="text-gray-600 mb-8">
            Kamu berhasil mendaftar event. Status kehadiran kamu masih pending.
        </p>

        <a href="{{ url('/') }}"
           class="inline-block bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-full transition shadow-lg">

            Kembali ke Home

        </a>

    </div>

</body>
</html>