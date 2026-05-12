<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Loker Seeker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F7F0C8] min-h-screen font-sans">

    <!-- HEADER -->
    <header class="bg-red-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <h1 class="text-white text-3xl font-black">
            LOKER SEEKER🔥
        </h1>

        <div class="flex items-center gap-4">

            <form action="#loker" class="flex items-center gap-2">
                <input type="text"
                       placeholder="Cari loker..."
                       class="w-80 p-3 rounded-xl">

                <button class="bg-white px-4 py-2 rounded-xl font-bold">
                    Cari
                </button>
            </form>

            <!-- Hamburger -->
            <div class="relative">

                <button onclick="toggleMenu()"
                        class="text-white text-3xl font-bold">
                    ☰
                </button>

                <div id="menuDropdown"
                     class="hidden absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl p-4 z-50">

                    <a href="/group"
                        class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                         Temukan Group Sesuai Minatmu
                    </a>

                    <a href="/detail-loker"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        Maintenance Manager Shopee
                    </a>

                    <a href="/event"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        Seminar Karir & Job Fair
                    </a>

                    <a href="/rsvp"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        RSVP Event
                    </a>

                </div>

            </div>

        </div>
    </div>
</header>

    <!-- HERO -->
    <section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <p class="text-red-600 font-black tracking-[6px] uppercase mb-4">
                Platform Lowongan Kerja
            </p>

            <h2 class="text-6xl font-black text-slate-900 leading-tight mb-6">
                Cari <span class="text-red-600">Pekerjaan</span><br>
                Impianmu
            </h2>

            <p class="text-gray-700 text-lg mb-8 max-w-xl">
                Temukan lowongan kerja terbaik berdasarkan skill, lokasi, dan minatmu bersama Loker Seeker.
            </p>

            <div class="flex gap-4">
                <a href="#loker"
                   class="bg-red-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl hover:bg-red-700 transition">
                    Cari Loker
                </a>

                <a href="/group"
                   class="bg-white text-slate-900 px-8 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition">
                    Gabung Group
                </a>
            </div>
        </div>

        <div class="bg-white rounded-[36px] p-6 shadow-2xl">
            <div class="bg-red-600 text-white rounded-[28px] p-8">
                <p class="text-sm uppercase tracking-[4px] mb-4">
                    Loker Terbaru
                </p>

                <h3 class="text-4xl font-black mb-4">
                    Backend Developer
                </h3>

                <p class="mb-6">
                    PT Shopee Indonesia • Bandung • Full Time
                </p>

                <a href="/detail-loker"
                   class="inline-block bg-white text-red-600 px-6 py-3 rounded-2xl font-bold">
                    Lihat Detail
                </a>
            </div>
        </div>
    </section>

    <!-- MITRA -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
            Mitra <span class="text-red-600">Kerjasama</span>
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-3xl shadow-xl text-center font-black hover:scale-105 transition">Shopee</div>
            <div class="bg-white p-8 rounded-3xl shadow-xl text-center font-black hover:scale-105 transition">Shopee Medan</div>
              <div class="bg-white p-8 rounded-3xl shadow-xl text-center font-black hover:scale-105 transition">Shopee Bandung </div>
            <div class="bg-white p-8 rounded-3xl shadow-xl text-center font-black hover:scale-105 transition">Shopee Indonesia</div>
        </div>
    </section>

    <!-- KATEGORI -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
            Kategori <span class="text-red-600">Loker</span>
        </h2>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

 <a href="#loker"
       class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
       💻 Programmer
    </a>

   <a href="#loker"
       class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
       🎨 UI/UX
    </a>
<a href="#loker"
       class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
       📈 Marketing
    </a>

    <a href="#loker"
       class="bg-red-600 text-white p-8 rounded-3xl text-center font-bold shadow-xl block hover:bg-red-700 transition">
       🎥 Content Creator
    </a>
    

</div>

    <!-- LOKER POPULER -->
    <section id="loker" class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
            Loker <span class="text-red-600">Populer</span>
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-3xl shadow-xl">
                <h3 class="text-2xl font-black text-slate-900">Backend Developer</h3>
                <p class="text-gray-600 mt-2">PT Shopee Indonesia</p>
                <p class="text-gray-500 mt-1">📍 Bandung</p>
                <a href="/detail-loker" class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">Detail</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl">
                <h3 class="text-2xl font-black text-slate-900">UI/UX Designer</h3>
                <p class="text-gray-600 mt-2">PT Shopee Indonesia</p>
                <p class="text-gray-500 mt-1">📍 Jakarta</p>
                <a href="/detail-loker" class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">Detail</a>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl">
                <h3 class="text-2xl font-black text-slate-900">Marketing Staff</h3>
                <p class="text-gray-600 mt-2">PT Shopee Indonesia</p>
                <p class="text-gray-500 mt-1">📍 Medan</p>
                <a href="/detail-loker" class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">Detail</a>
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section class="max-w-7xl mx-auto px-6 py-12">
        <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
            Info <span class="text-red-600">Pelamar</span>
        </h2>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
                <h3 class="text-5xl font-black text-red-600">120+</h3>
                <p class="font-bold mt-2">Pelamar Mendaftar</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
                <h3 class="text-5xl font-black text-red-600">45</h3>
                <p class="font-bold mt-2">Pelamar Diterima</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl text-center">
                <h3 class="text-5xl font-black text-red-600">20</h3>
                <p class="font-bold mt-2">Pelamar Ditolak</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-red-600 text-white py-12 mt-16">
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