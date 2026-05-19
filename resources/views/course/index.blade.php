<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap');

        :root {
            --course-yellow: #f6b333;
            --course-red: #d12026;
            --course-dark: #1f2937;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Oswald', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, 0.35), transparent 32%),
                radial-gradient(circle at bottom right, rgba(209, 32, 38, 0.18), transparent 34%),
                var(--course-yellow);
            min-height: 100vh;
        }

        .text-c {
            color: var(--course-red);
        }

        .border-c {
            border-color: var(--course-red);
        }

        .bg-c {
            background-color: var(--course-red);
        }

        .course-shadow {
            box-shadow: 6px 8px 0px var(--course-red);
        }

        .course-shadow-sm {
            box-shadow: 4px 5px 0px var(--course-red);
        }

        .course-card {
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 9px 11px 0px var(--course-red);
        }

        .btn-course {
            transition: transform 0.2s ease, filter 0.2s ease;
        }

        .btn-course:hover {
            transform: translateY(-2px);
            filter: brightness(0.95);
        }
    </style>
</head>

<body class="text-gray-900">

    <!-- HEADER SAMA SEPERTI WELCOME -->
    <header class="bg-red-600 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <!-- Logo -->
            <a href="{{ route('welcome') }}" class="text-white text-3xl font-black">
                LOKER SEEKER🔥
            </a>

            <!-- Menu Desktop -->
            <nav class="hidden lg:flex items-center gap-6 text-white font-bold">

                <a href="{{ route('welcome') }}"
                   class="hover:text-yellow-300 transition">
                    Home
                </a>

                <a href="{{ route('loker.index') }}"
                   class="hover:text-yellow-300 transition">
                    Jobs
                </a>

                <a href="{{ route('perusahaan.index') }}"
                   class="hover:text-yellow-300 transition">
                    Company
                </a>

                <a href="{{ route('event.index') }}"
                   class="hover:text-yellow-300 transition">
                    Event
                </a>

                <a href="{{ route('groups.index') }}"
                   class="hover:text-yellow-300 transition">
                    Group
                </a>

                <a href="{{ route('service.index') }}"
                   class="hover:text-yellow-300 transition">
                    Service
                </a>

                <a href="{{ route('course.index') }}"
                   class="text-yellow-300 border-b-2 border-yellow-300 transition">
                    Course
                </a>

                @auth
                    @if(\Illuminate\Support\Facades\Route::has('inbox.index'))
                        @php
                            $unreadInbox = class_exists(\App\Models\Inbox::class)
                                ? \App\Models\Inbox::where('user_id', auth()->id())
                                    ->where('is_read', false)
                                    ->count()
                                : 0;
                        @endphp

                        <a href="{{ route('inbox.index') }}"
                           class="relative hover:text-yellow-300 transition">
                            Inbox

                            @if($unreadInbox > 0)
                                <span class="absolute -top-3 -right-5 bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full">
                                    {{ $unreadInbox }}
                                </span>
                            @endif
                        </a>
                    @endif
                @endauth

            </nav>

            <!-- Right Area -->
            <div class="flex items-center gap-4">

                @guest
                    <div class="hidden md:flex items-center gap-3">

                        <a href="{{ route('login') }}"
                           class="text-white font-bold uppercase hover:text-yellow-300 transition">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="bg-white text-red-600 px-5 py-3 rounded-xl font-black hover:bg-yellow-300 transition">
                            Register
                        </a>

                    </div>
                @endguest

                @auth
                    <div class="relative hidden md:block">

                        <button onclick="toggleProfile()"
                                class="flex items-center gap-2 text-white font-bold">

                            <div class="w-11 h-11 rounded-full bg-white text-red-600 flex items-center justify-center font-black text-lg shadow">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>

                        </button>

                        <div id="profileDropdown"
                             class="hidden absolute right-0 mt-3 w-60 bg-white rounded-2xl shadow-2xl p-4 z-50">

                            <p class="font-black text-slate-900 px-2">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="text-xs text-gray-500 px-2 mb-3">
                                {{ auth()->user()->email }}
                            </p>

                            <hr class="mb-2">

                            @if(\Illuminate\Support\Facades\Route::has('inbox.index'))
                                <a href="{{ route('inbox.index') }}"
                                   class="block px-2 py-2 font-bold text-gray-700 hover:bg-red-100 rounded-xl">
                                    Inbox

                                    @if(isset($unreadInbox) && $unreadInbox > 0)
                                        <span class="bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full ml-1">
                                            {{ $unreadInbox }}
                                        </span>
                                    @endif
                                </a>
                            @endif

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button type="submit"
                                        class="w-full text-left px-2 py-2 font-bold text-red-600 hover:bg-red-100 rounded-xl">
                                    Logout
                                </button>
                            </form>

                        </div>

                    </div>
                @endauth

                <!-- Hamburger -->
                <button onclick="toggleMenu()"
                        class="lg:hidden text-white text-3xl font-bold">
                    ☰
                </button>

            </div>

        </div>

        <!-- Mobile Dropdown -->
        <div id="menuDropdown"
             class="hidden lg:hidden bg-white border-t border-red-100 shadow-xl">

            <div class="max-w-7xl mx-auto px-6 py-4 space-y-2">

                <a href="{{ route('welcome') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Home
                </a>

                <a href="{{ route('loker.index') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Jobs
                </a>

                <a href="{{ route('perusahaan.index') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Company
                </a>

                <a href="{{ route('event.index') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Event
                </a>

                <a href="{{ route('groups.index') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Group
                </a>

                <a href="{{ route('service.index') }}"
                   class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                    Service
                </a>

                <a href="{{ route('course.index') }}"
                   class="block px-4 py-3 font-bold text-red-600 bg-red-100 rounded-xl">
                    Course
                </a>

                @auth
                    @if(\Illuminate\Support\Facades\Route::has('inbox.index'))
                        <a href="{{ route('inbox.index') }}"
                           class="block px-4 py-3 font-bold text-gray-800 hover:bg-red-100 rounded-xl">
                            Inbox

                            @if(isset($unreadInbox) && $unreadInbox > 0)
                                <span class="bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full ml-1">
                                    {{ $unreadInbox }}
                                </span>
                            @endif
                        </a>
                    @endif

                    <div class="px-4 py-3 bg-gray-100 rounded-xl">
                        <p class="font-black text-gray-800">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" class="pt-3">
                        @csrf

                        <button type="submit"
                                class="w-full text-left bg-red-600 text-white px-4 py-3 rounded-xl font-black">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <div class="grid grid-cols-2 gap-3 pt-3">

                        <a href="{{ route('login') }}"
                           class="text-center bg-red-600 text-white px-4 py-3 rounded-xl font-black">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="text-center bg-yellow-400 text-black px-4 py-3 rounded-xl font-black">
                            Register
                        </a>

                    </div>
                @endguest

            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="p-4 md:p-10">

        <div class="max-w-7xl mx-auto">

            <!-- Hero / Title -->
            <div class="bg-white border-4 border-c rounded-[32px] course-shadow p-6 md:p-8 mb-10">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                    <div>
                        <div class="inline-flex items-center gap-2 bg-red-50 border-2 border-c text-c px-4 py-2 rounded-full font-bold uppercase text-sm mb-4">
                            🎓 Course Center
                        </div>

                        <h1 class="text-c font-bold text-5xl md:text-6xl uppercase tracking-widest leading-none">
                            Course
                        </h1>

                        <p class="text-c mt-4 text-lg max-w-2xl leading-relaxed">
                            Daftar course terlebih dahulu. Link course hanya bisa diakses setelah pendaftaran kamu disetujui oleh mentor.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">

                        <a href="{{ route('welcome') }}"
                           class="btn-course bg-white text-c border-4 border-c px-6 py-3 rounded-2xl font-bold uppercase text-center course-shadow-sm">
                            ← Home
                        </a>

                        @auth
                            <div class="bg-c text-white px-6 py-3 rounded-2xl font-bold uppercase text-center border-4 border-c">
                                Hi, {{ auth()->user()->name }}
                            </div>
                        @endauth

                    </div>

                </div>

            </div>

            <!-- Alert -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 border-4 border-green-500 px-5 py-4 rounded-2xl mb-6 font-bold course-shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-700 border-4 border-red-500 px-5 py-4 rounded-2xl mb-6 font-bold course-shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Course Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">

                @forelse($courses as $course)

                    @php
                        $registration = $registrations[$course->id] ?? null;
                    @endphp

                    <div class="course-card bg-white rounded-[30px] border-4 border-c p-6 flex flex-col justify-between course-shadow min-h-[420px]">

                        <div>

                            <!-- Top -->
                            <div class="flex items-start gap-4 mb-5">

                                <div class="w-12 h-12 rounded-2xl bg-c flex items-center justify-center shrink-0 border-4 border-c">
                                    <div class="w-4 h-4 rounded-full bg-white"></div>
                                </div>

                                <div class="flex-1">
                                    <h2 class="text-c font-bold text-2xl uppercase leading-tight">
                                        {{ $course->title }}
                                    </h2>

                                    <div class="mt-3">
                                        @if($registration)
                                            @if($registration->status === 'pending')
                                                <span class="inline-flex items-center gap-2 bg-yellow-100 border-2 border-yellow-400 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                                    ⏳ Permintaan Diproses 
                                                </span>
                                            @elseif($registration->status === 'approved')
                                                <span class="inline-flex items-center gap-2 bg-green-100 border-2 border-green-400 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                                    ✅ Disetujui 
                                                </span>
                                            @elseif($registration->status === 'rejected')
                                                <span class="inline-flex items-center gap-2 bg-red-100 border-2 border-red-400 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                                    ❌ Ditolak 
                                                </span>
                                            @endif
                                        @else
                                            <span class="inline-flex items-center gap-2 bg-gray-100 border-2 border-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm font-bold">
                                                Belum Daftar
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <!-- Description -->
                            <div class="bg-red-50 border-2 border-red-100 rounded-2xl p-4 mb-4">
                                <p class="text-c text-sm leading-relaxed">
                                    {{ $course->description }}
                                </p>
                            </div>

                            @if($course->benefit)
                                <div class="bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-4">
                                    <p class="text-c text-sm font-bold uppercase mb-1">
                                        Benefit
                                    </p>

                                    <p class="text-c text-sm leading-relaxed">
                                        {{ $course->benefit }}
                                    </p>
                                </div>
                            @endif

                        </div>

                        <!-- Action -->
                        <div class="mt-6 pt-5 border-t-4 border-red-100">

                            @guest
                                <a href="{{ route('login') }}"
                                   class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                    Login untuk Daftar
                                </a>
                            @endguest

                            @auth
                                @if(!$registration)
                                    <a href="{{ route('course.register.form', $course->id) }}"
                                       class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                        Daftar Course
                                    </a>

                                @elseif($registration->status === 'pending')
                                    <button disabled
                                            class="w-full bg-gray-300 text-gray-600 px-6 py-4 rounded-2xl font-bold uppercase cursor-not-allowed">
                                        Menunggu 
                                    </button>

                                @elseif($registration->status === 'approved')
                                    <a href="{{ route('course.access', $course->id) }}"
                                       class="btn-course inline-block w-full text-center bg-green-600 text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                        Akses Course
                                    </a>

                                @elseif($registration->status === 'rejected')
                                    <a href="{{ route('course.register.form', $course->id) }}"
                                       class="btn-course inline-block w-full text-center bg-c text-white px-6 py-4 rounded-2xl font-bold uppercase">
                                        Daftar Ulang
                                    </a>

                                    @if($registration->catatan_admin)
                                        <div class="bg-red-50 border-2 border-red-200 rounded-2xl p-4 mt-4">
                                            <p class="text-red-600 text-sm font-bold">
                                                Catatan Mentor:
                                            </p>

                                            <p class="text-red-600 text-sm mt-1">
                                                {{ $registration->catatan_admin }}
                                            </p>
                                        </div>
                                    @endif
                                @endif
                            @endauth

                        </div>

                    </div>

                @empty

                    <div class="col-span-full bg-white rounded-3xl border-4 border-c p-10 text-center course-shadow">

                        <div class="w-20 h-20 rounded-3xl bg-c text-white flex items-center justify-center text-4xl mx-auto mb-5">
                            🎓
                        </div>

                        <h2 class="text-c text-3xl font-bold uppercase">
                            Belum ada course tersedia.
                        </h2>

                        <p class="text-c mt-3">
                            Silakan cek kembali nanti.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menuDropdown');

            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        function toggleProfile() {
            const profile = document.getElementById('profileDropdown');

            if (profile) {
                profile.classList.toggle('hidden');
            }
        }
    </script>

</body>
</html>