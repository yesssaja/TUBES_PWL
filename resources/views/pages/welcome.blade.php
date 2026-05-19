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

            @auth
                @php
                    $unreadInbox = class_exists(\App\Models\Inbox::class)
                        ? \App\Models\Inbox::where('user_id', auth()->id())
                            ->where('is_read', false)
                            ->count()
                        : 0;

                    $latestInboxes = class_exists(\App\Models\Inbox::class)
                        ? \App\Models\Inbox::where('user_id', auth()->id())
                            ->latest()
                            ->take(5)
                            ->get()
                        : collect();
                @endphp
            @endauth

            <div class="flex items-center gap-4">

                <form action="#loker" class="flex items-center gap-2">
                    <input type="text"
                           placeholder="Cari loker..."
                           class="w-80 p-3 rounded-xl">

                    <button class="bg-white px-4 py-2 rounded-xl font-bold">
                        Cari
                    </button>
                </form>

                @auth
                    @if(\Illuminate\Support\Facades\Route::has('inbox.index'))
                        <!-- Notifikasi Inbox -->
                        <div class="relative">

                            <button onclick="toggleNotif()"
                                    class="relative text-white text-2xl font-bold bg-red-700 hover:bg-red-800 w-11 h-11 rounded-full flex items-center justify-center transition">
                                🔔

                                @if($unreadInbox > 0)
                                    <span class="absolute -top-2 -right-2 bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full">
                                        {{ $unreadInbox }}
                                    </span>
                                @endif
                            </button>

                            <div id="notifDropdown"
                                 class="hidden absolute right-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl overflow-hidden z-50">

                                <div class="bg-red-600 text-white px-5 py-4">
                                    <h3 class="font-black text-lg">
                                        Notifikasi
                                    </h3>

                                    <p class="text-sm text-white/80">
                                        {{ $unreadInbox }} belum dibaca
                                    </p>
                                </div>

                                <div class="max-h-96 overflow-y-auto">

                                    @forelse($latestInboxes as $notif)

                                        <a href="{{ route('inbox.index') }}"
                                           class="block px-5 py-4 border-b hover:bg-red-50 transition {{ !$notif->is_read ? 'bg-yellow-50' : 'bg-white' }}">

                                            <div class="flex items-start gap-3">

                                                <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0
                                                    {{ !$notif->is_read ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-500' }}">

                                                    @if(str_contains($notif->type ?? '', 'course'))
                                                        🎓
                                                    @elseif(str_contains($notif->type ?? '', 'lamaran'))
                                                        📩
                                                    @elseif(str_contains($notif->type ?? '', 'rsvp'))
                                                        📝
                                                    @else
                                                        🔔
                                                    @endif

                                                </div>

                                                <div class="flex-1">
                                                    <h4 class="font-black text-gray-800 text-sm leading-tight">
                                                        {{ $notif->title }}
                                                    </h4>

                                                    <p class="text-gray-500 text-xs mt-1">
                                                        {{ \Illuminate\Support\Str::limit($notif->message, 80) }}
                                                    </p>

                                                    <p class="text-gray-400 text-xs mt-2">
                                                        {{ $notif->created_at ? $notif->created_at->format('d M Y H:i') : '-' }}
                                                    </p>
                                                </div>

                                                @if(!$notif->is_read)
                                                    <span class="w-3 h-3 bg-red-500 rounded-full mt-1"></span>
                                                @endif

                                            </div>

                                        </a>

                                    @empty

                                        <div class="px-5 py-8 text-center text-gray-500">
                                            <div class="text-4xl mb-2">📭</div>

                                            <p class="font-bold">
                                                Belum ada notifikasi
                                            </p>
                                        </div>

                                    @endforelse

                                </div>

                                <div class="p-4 bg-gray-50">
                                    <a href="{{ route('inbox.index') }}"
                                       class="block text-center bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-black transition">
                                        Lihat Semua Inbox
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endif
                @endauth

                <!-- Hamburger -->
                <div class="relative">

                    <button onclick="toggleMenu()"
                            class="text-white text-3xl font-bold">
                        ☰
                    </button>

                    <div id="menuDropdown"
                         class="hidden absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl p-4 z-50">

                        @auth
                            @if(\Illuminate\Support\Facades\Route::has('inbox.index'))
                                <a href="{{ route('inbox.index') }}"
                                   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                                    🔔 Notifikasi / Inbox

                                    @if(isset($unreadInbox) && $unreadInbox > 0)
                                        <span class="bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full ml-1">
                                            {{ $unreadInbox }}
                                        </span>
                                    @endif
                                </a>
                            @endif
                        @endauth

                        <a href="{{ route('welcome') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    🏠 Home
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('loker.index') ? route('loker.index') : url('/loker') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    💼 Jobs / Lowongan Kerja
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('perusahaan.index') ? route('perusahaan.index') : url('/perusahaan') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    🏢 Company / Perusahaan
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('event.index') ? route('event.index') : url('/event') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    📅 Event
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('groups.index') ? route('groups.index') : url('/group') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    👥 Group
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('service.index') ? route('service.index') : url('/service') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    🛠️ Service
</a>

<a href="{{ \Illuminate\Support\Facades\Route::has('course.index') ? route('course.index') : url('/course') }}"
   class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
    🎓 Course
</a>

                    </div>

                </div>

                @guest
                    <a href="{{ route('login') }}" class="text-white font-bold uppercase hover:underline">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="text-white font-bold uppercase hover:underline">
                        Register
                    </a>
                @endguest

                @auth
                    <div class="relative">
                        <button onclick="toggleProfile()" class="flex items-center gap-2 text-white font-bold">
                            <div class="w-10 h-10 rounded-full bg-white text-red-600 flex items-center justify-center font-black text-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </button>

                        <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl p-4 z-50">
                            <p class="font-bold text-slate-900 px-2 mb-2">
                                {{ Auth::user()->name }}
                            </p>

                            <hr class="mb-2">

                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" class="w-full text-left px-2 py-2 font-bold text-red-600 hover:bg-red-100 rounded-xl">
                                    Logout
                                </button>
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
    </section>

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
            const menu = document.getElementById('menuDropdown');
            const notif = document.getElementById('notifDropdown');
            const profile = document.getElementById('profileDropdown');

            if (menu) {
                menu.classList.toggle('hidden');
            }

            if (notif && !notif.classList.contains('hidden')) {
                notif.classList.add('hidden');
            }

            if (profile && !profile.classList.contains('hidden')) {
                profile.classList.add('hidden');
            }
        }

        function toggleProfile() {
            const profile = document.getElementById('profileDropdown');
            const menu = document.getElementById('menuDropdown');
            const notif = document.getElementById('notifDropdown');

            if (profile) {
                profile.classList.toggle('hidden');
            }

            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }

            if (notif && !notif.classList.contains('hidden')) {
                notif.classList.add('hidden');
            }
        }

        function toggleNotif() {
            const notif = document.getElementById('notifDropdown');
            const menu = document.getElementById('menuDropdown');
            const profile = document.getElementById('profileDropdown');

            if (notif) {
                notif.classList.toggle('hidden');
            }

            if (menu && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
            }

            if (profile && !profile.classList.contains('hidden')) {
                profile.classList.add('hidden');
            }
        }
    </script>

</body>
</html>