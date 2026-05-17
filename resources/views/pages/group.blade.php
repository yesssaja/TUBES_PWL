<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Group</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f7f0c8] min-h-screen">

    <!-- Navbar -->
<header class="bg-red-600 text-white p-5 shadow-lg">

    <div class="max-w-7xl mx-auto flex justify-between items-center">

        <!-- Logo -->
        <h1 class="text-3xl font-black">
            LOKER SEEKER🔥
        </h1>

        <!-- Search -->
        <div class="flex gap-4 items-center">

            <form action="#loker" class="flex items-center gap-2">

                <input type="text"
                       placeholder="Cari loker..."
                       class="w-80 p-3 rounded-xl text-black">

                <button class="bg-white text-red-600 px-4 py-2 rounded-xl font-bold hover:bg-gray-200">
                    Cari
                </button>

            </form>

       <div class="relative">
    <button onclick="toggleMenu()" class="text-white text-3xl font-bold">
        ☰
    </button>

    <div id="menuDropdown"
         class="hidden absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl p-4 z-50">

        <a href="/" class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
            Cari Pekerjaan Impianmu
        </a>

        <a href="/detail-loker" class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
            Maintenance Manager Shopee
        </a>

        <a href="/event" class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
            Seminar Karir & Job Fair
        </a>

        <a href="/rsvp" class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
            RSVP Event
        </a>

    </div>
</div>

    </div>

</header>

    <!-- Hero -->
    <section class="max-w-7xl mx-auto px-6 py-14">

        <p class="text-red-600 font-black tracking-[6px] uppercase mb-4">
            Komunitas Pencari Kerja
        </p>

        <h1 class="text-6xl font-black text-slate-900 leading-tight">
            Temukan <span class="text-red-600">Group</span><br>
            Sesuai Minatmu
        </h1>

        <p class="text-gray-700 mt-6 text-lg max-w-2xl">
            Bergabung dengan komunitas pencari kerja terbaik untuk berbagi informasi,
            pengalaman, dan peluang karir terbaru.
        </p>

    </section>

  <!-- Group Cards -->
<section class="max-w-7xl mx-auto px-6 pb-16">

    <div class="grid md:grid-cols-3 gap-8">

        @forelse($groups as $group)

            <a href="{{ route('join_group', $group->slug) }}"
               class="bg-white rounded-[30px] p-8 shadow-xl hover:scale-105 transition block">

                <div class="bg-red-600 text-white w-20 h-20 rounded-3xl
                            flex items-center justify-center text-4xl font-black">
                    {{ $group->icon_letter ?? strtoupper(substr($group->name, 0, 1)) }}
                </div>

                <h2 class="text-3xl font-black text-slate-900 mt-6">
                    {{ $group->name }}
                </h2>

                <p class="text-gray-600 mt-3">
                    {{ $group->description }}
                </p>

                <div class="mt-5 text-sm text-gray-500 font-bold">
                    👥 {{ $group->members_count }} Member
                </div>

                <div class="mt-6 bg-red-600 hover:bg-red-700
                            transition text-white font-black
                            px-6 py-3 rounded-2xl shadow-lg inline-block">
                    Join Group
                </div>

            </a>

        @empty

            <div class="col-span-3 bg-white rounded-3xl p-10 text-center shadow-xl">
                <h2 class="text-2xl font-black text-slate-900">
                    Belum ada group
                </h2>

                <p class="text-gray-600 mt-3">
                    Data group belum tersedia. Silakan jalankan seeder atau tambahkan group dari admin.
                </p>
            </div>

        @endforelse

    </div>

</section>

   <!-- FOOTER -->
<footer class="bg-red-600 text-white py-8 mt-16">
    <div class="text-center">
        <h2 class="text-3xl font-black mb-4">
            LOKER SEEKER🔥
        </h2>

        <p>Email : lokerseeker@gmail.com</p>
        <p>Instagram : @lokerseeker</p>

        <p class="mt-6">
            © 2026 LOKER SEEKER🔥
        </p>
    </div>
</footer>

<script>
    function toggleMenu() {
        document.getElementById('menuDropdown').classList.toggle('hidden');
    }
</script>

</body>
</html>
\