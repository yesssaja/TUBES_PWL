<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen p-6">

    <div class="bg-gradient-to-r from-red-600 to-yellow-400 text-white rounded-2xl shadow-lg p-6 mb-6">
        <h1 class="text-3xl font-bold">Dashboard Admin</h1>
        <p class="mt-2">Selamat datang admin.</p>
    </div>

    <!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-red-500">
        <h2 class="text-gray-500">Total User</h2>
        <p class="text-3xl font-bold text-red-600">
            {{ $totalUser }}
        </p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-yellow-400">
        <h2 class="text-gray-500">Total Event</h2>
        <p class="text-3xl font-bold text-yellow-500">
            {{ $totalEvent }}
        </p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-orange-500">
        <h2 class="text-gray-500">Total Loker</h2>
        <p class="text-3xl font-bold text-orange-500">
            {{ $totalLoker }}
        </p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-green-500">
        <h2 class="text-gray-500">Total Lamaran</h2>
        <p class="text-3xl font-bold text-green-600">
            {{ $totalLamaran }}
        </p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-red-400">
        <h2 class="text-gray-500">Total Group</h2>
        <p class="text-3xl font-bold text-red-400">
            {{ $totalGroup }}
        </p>
    </div>

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-blue-500">
        <h2 class="text-gray-500">Total Perusahaan</h2>
        <p class="text-3xl font-bold text-blue-600">
            {{ $totalPerusahaan }}
        </p>
    </div>

</div>

    <!-- Menu -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="{{ route('admin.event.index') }}" class="bg-red-500 text-white rounded-2xl p-6 shadow-lg hover:bg-red-600 transition">
            <h2 class="text-2xl font-bold mb-2">📅 Event</h2>
            <p>Kelola event</p>
        </a>

        <a href="{{ route('admin.rsvp.index') }}" class="bg-red-500 text-white rounded-2xl p-6 shadow-lg hover:bg-red-600 transition">
            <h2 class="text-2xl font-bold mb-2">📝 RSVP</h2>
            <p>Kelola RSVP Event</p>
        </a>

        <a href="{{ route('admin.loker.index') }}" class="bg-yellow-400 text-black rounded-2xl p-6 shadow-lg hover:bg-yellow-500 transition">
            <h2 class="text-2xl font-bold mb-2">💼 Loker</h2>
            <p>Kelola lowongan kerja</p>
        </a>

        <a href="{{ route('admin.lamaran.index') }}" class="bg-yellow-400 text-black rounded-2xl p-6 shadow-lg hover:bg-yellow-500 transition">
            <h2 class="text-2xl font-bold mb-2">📩 Lamaran</h2>
            <p>Kelola lamaran kerja</p>
        </a>

        <a href="{{ route('admin.groups.index') }}" class="bg-orange-500 text-white rounded-2xl p-6 shadow-lg hover:bg-orange-600 transition">
            <h2 class="text-2xl font-bold mb-2">👥 Group</h2>
            <p>Monitoring group</p>
        </a>

        <a href="{{ route('admin.perusahaan.index') }}" class="bg-blue-500 text-white rounded-2xl p-6 shadow-lg hover:bg-blue-600 transition">
            <h2 class="text-2xl font-bold mb-2">🏢 Perusahaan</h2>
            <p>Kelola perusahaan</p>
        </a>

        <a href="/admin/user" class="bg-red-400 text-white rounded-2xl p-6 shadow-lg hover:bg-red-500 transition">
            <h2 class="text-2xl font-bold mb-2">🧑 User</h2>
            <p>Data user</p>
        </a>

    </div>

</div>

</body>
</html>