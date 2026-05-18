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

            @guest
                <a href="{{route('login')}}" class="text-white font-bold uppercase hover:underline">Login</a>
                <a href="{{route('register')}}" class="text-white font-bold uppercase hover:underline">Register</a>
            @endguest

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

        <!-- Shopee -->
        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">

            <img src="{{ asset('images/shopee.png') }}"
                 alt="Shopee"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Shopee</p>

        </div>

        <!-- Tokopedia -->
        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">

            <img src="{{ asset('images/tokopedia.png') }}"
                 alt="Tokopedia"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Tokopedia</p>

        </div>

        <!-- Lazada -->
        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">

            <img src="{{ asset('images/lazada.png') }}"
                 alt="Lazada"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Lazada</p>

        </div>

        <!-- Blibli -->
        <div class="bg-white p-6 rounded-3xl shadow-xl text-center hover:scale-105 transition">

            <img src="{{ asset('images/blibli.png') }}"
                 alt="Blibli"
                 class="w-20 h-20 object-contain mx-auto mb-3">

            <p class="font-black">Blibli</p>

        </div>

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
    <!-- LOKER POPULER -->
<section id="loker" class="max-w-7xl mx-auto px-6 py-12">

    <h2 class="text-4xl font-black text-center text-slate-900 mb-10">
        Loker <span class="text-red-600">Populer</span>
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Backend -->
        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">

            <img src="{{ asset('images/backend.png') }}"
                 alt="Backend Developer"
                 class="w-40 h-40 object-contain mx-auto mb-4">

            <h3 class="text-2xl font-black text-slate-900">
                Backend Developer
            </h3>

            <p class="text-gray-600 mt-2">
                PT Shopee Indonesia
            </p>

            <p class="text-gray-500 mt-1">
                📍 Bandung
            </p>

            <a href="/detail-loker"
               class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">
                Detail
            </a>

        </div>

        <!-- UI UX -->
        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">

            <img src="{{ asset('images/uiux.png') }}"
                 alt="UI UX Designer"
                 class="w-40 h-40 object-contain mx-auto mb-4">

            <h3 class="text-2xl font-black text-slate-900">
                UI/UX Designer
            </h3>

            <p class="text-gray-600 mt-2">
                PT Lazada Indonesia
            </p>

            <p class="text-gray-500 mt-1">
                📍 Jakarta
            </p>

            <a href="/detail-loker"
               class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">
                Detail
            </a>

        </div>

        <!-- Marketing -->
        <div class="bg-white p-8 rounded-3xl shadow-xl text-center">

            <img src="{{ asset('images/marketing.png') }}"
                 alt="Marketing Staff"
                 class="w-40 h-40 object-contain mx-auto mb-4">

            <h3 class="text-2xl font-black text-slate-900">
                Marketing Staff
            </h3>

            <p class="text-gray-600 mt-2">
                PT Tokopedia Indonesia
            </p>

            <p class="text-gray-500 mt-1">
                📍 Medan
            </p>

            <a href="/detail-loker"
               class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-2xl font-bold">
                Detail
            </a>

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

function toggleProfile() {
    document.getElementById('profileDropdown').classList.toggle('hidden');
}
</script>

</body>
</html>