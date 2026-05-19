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

    <div class="bg-gradient-to-r from-red-600 to-yellow-400 text-white rounded-2xl shadow-lg p-6 mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">Dashboard Admin</h1>
            <p class="mt-2">Selamat datang admin.</p>
        </div>

        @auth
            <div class="relative">
                <button onclick="toggleProfile()" class="flex items-center gap-2 text-white font-bold">
                    <div class="w-10 h-10 rounded-full bg-white text-red-600 flex items-center justify-center font-black text-lg">
                        {{strtoupper(substr(Auth::user()->name,0,1))}}
                    </div>
                </button>

                <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl p-4 z-50">
                    <p class=" font-bold text-slate-900 px-2 mb-2">
                        {{Auth::user()->name}}
                    </p>
                    <hr class="mb-2">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="w-full text-left px-2 py-2 font-bold text-red-600 hover:bg-red-100 rounded-xl">Logout</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>

    <!-- Notifikasi Admin -->
<div class="bg-white rounded-3xl shadow-xl p-6 mb-6 border-l-8 border-red-600">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <h2 class="text-2xl font-black text-red-600">
                🔔 Butuh Diproses
            </h2>

            <p class="text-gray-500 mt-1">
                Data yang menunggu persetujuan atau balasan admin.
            </p>
        </div>

        <div class="bg-red-100 text-red-700 px-5 py-3 rounded-2xl font-black text-xl">
            {{ $totalButuhTindakan ?? 0 }} Tugas
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-5">

        <a href="{{ route('admin.rsvp.index') }}"
           class="bg-red-50 hover:bg-red-100 rounded-2xl p-5 border border-red-100 transition">

            <p class="text-gray-500 font-semibold">
                RSVP Pending
            </p>

            <h3 class="text-4xl font-black text-red-600 mt-2">
                {{ $pendingRsvp ?? 0 }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Perlu diterima / ditolak
            </p>
        </a>

        <a href="{{ route('admin.lamaran.index') }}"
           class="bg-yellow-50 hover:bg-yellow-100 rounded-2xl p-5 border border-yellow-100 transition">

            <p class="text-gray-500 font-semibold">
                Lamaran Pending
            </p>

            <h3 class="text-4xl font-black text-yellow-600 mt-2">
                {{ $pendingLamaran ?? 0 }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Perlu diterima / ditolak
            </p>
        </a>

        <a href="{{ route('admin.course.index') }}"
           class="bg-orange-50 hover:bg-orange-100 rounded-2xl p-5 border border-orange-100 transition">

            <p class="text-gray-500 font-semibold">
                Course Pending
            </p>

            <h3 class="text-4xl font-black text-orange-600 mt-2">
                {{ $pendingCourse ?? 0 }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Menunggu persetujuan
            </p>
        </a>

        <a href="{{ route('admin.course.index') }}"
           class="bg-blue-50 hover:bg-blue-100 rounded-2xl p-5 border border-blue-100 transition">

            <p class="text-gray-500 font-semibold">
                Pembayaran Pending
            </p>

            <h3 class="text-4xl font-black text-blue-600 mt-2">
                {{ $pendingPayment ?? 0 }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Bukti bayar perlu dicek
            </p>
        </a>

        <a href="{{ route('admin.review.index') }}"
           class="bg-purple-50 hover:bg-purple-100 rounded-2xl p-5 border border-purple-100 transition">

            <p class="text-gray-500 font-semibold">
                Review Belum Dibalas
            </p>

            <h3 class="text-4xl font-black text-purple-600 mt-2">
                {{ $reviewBelumDibalas ?? 0 }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Perlu dibalas
            </p>
        </a>

    </div>

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

    <div class="bg-white rounded-2xl p-5 shadow border-l-8 border-purple-500">
    <h2 class="text-gray-500">Total Review</h2>
    <p class="text-3xl font-bold text-purple-600">
        {{ $totalReview }}
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

        <a href="{{ route('admin.course.index') }}" class="bg-purple-500 text-white rounded-2xl p-6 shadow-lg hover:bg-purple-600 transition">
            <h2 class="text-2xl font-bold mb-2">🎓 Course</h2>
            <p>Kelola pendaftaran course</p>
        </a>

        <a href="{{ route('admin.perusahaan.index') }}" class="bg-blue-500 text-white rounded-2xl p-6 shadow-lg hover:bg-blue-600 transition">
            <h2 class="text-2xl font-bold mb-2">🏢 Perusahaan</h2>
            <p>Kelola perusahaan</p>
        </a>

        <a href="{{ route('admin.review.index') }}" class="bg-purple-500 text-white rounded-2xl p-6 shadow-lg hover:bg-purple-600 transition">
            <h2 class="text-2xl font-bold mb-2">⭐ Review</h2>
            <p>Kelola review perusahaan</p>
        </a>

        <a href="{{ route('admin.user.index') }}" class="bg-red-400 text-white rounded-2xl p-6 shadow-lg hover:bg-red-500 transition">
            <h2 class="text-2xl font-bold mb-2">🧑 User</h2>
            <p>Data user</p>
        </a>

    </div>

</div>

<script>
    function toggleProfile() {
        document.getElementById('profileDropdown').classList.toggle('hidden');
    }
</script>
</body>
</html>