<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - Loker Seeker
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">
</head>

<body class="bg-orange-50 min-h-screen">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-72 bg-white shadow-xl flex flex-col justify-between">

        {{-- TOP SIDEBAR --}}
        <div class="p-6">

            {{-- LOGO --}}
            <div class="mb-10">
                <h1 class="text-3xl font-black text-red-600 tracking-wide">
                    LOKER SEEKER
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Cari Kerja, Raih Kesempatan
                </p>
            </div>

            {{-- PROFILE --}}
            <div class="bg-red-50 rounded-3xl p-5 mb-10">
                <div class="flex items-center gap-4">

                    {{-- AVATAR --}}
                    <div class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-white shadow">
                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fee2e2&color=dc2626&bold=true"
                            class="w-full h-full object-cover">
                    </div>

                    {{-- INFO --}}
                    <div>
                        <h2 class="font-bold text-lg text-gray-800">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="text-sm text-red-500">
                            Perusahaan Terverifikasi
                        </p>
                    </div>

                </div>
            </div>

            {{-- MENU --}}
            <nav class="space-y-3">

                <a href="{{ route('perusahaan.inbox.index') }}"
                   class="flex items-center justify-between px-4 py-3 rounded-xl hover:bg-red-100 font-medium transition">

                    <div class="flex items-center gap-3">

                        {{-- ICON --}}
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-6 h-6 text-red-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 8h10M7 12h6m-9 8h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                        <span>Inbox</span>

                    </div>

                    {{-- BADGE --}}
                    @php
                        $unreadInbox = \App\Models\Inbox::where('is_read', false)->count();
                    @endphp

                    @if($unreadInbox > 0)
                        <span class="bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
                            {{ $unreadInbox }}
                        </span>
                    @endif

                </a>

                <a href="{{ route('perusahaan.dashboard') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Dashboard
                </a>

                <a href="{{ route('perusahaan.lowongan.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Lowongan Saya
                </a>

                <a href="{{ route('perusahaan.lamaran.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Lamaran Masuk
                </a>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Event Perusahaan
                </a>

                <a href="{{ route('perusahaan.rsvp.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    RSVP Event
                </a>

                <a href="{{ route('perusahaan.manajemen.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Manajemen Perusahaan
                </a>

                <a href="{{ route('perusahaan.profil.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Profil Perusahaan
                </a>

                <a href="{{ route('perusahaan.pengaturan.index') }}"
                   class="flex items-center gap-3 px-5 py-4 rounded-2xl hover:bg-red-100 hover:text-red-600 font-semibold transition">
                    Pengaturan Akun
                </a>

            </nav>

        </div>

        {{-- FOOTER SIDEBAR --}}
        <div class="p-6 space-y-5">

            {{-- BANTUAN --}}
            <div class="bg-orange-50 border border-orange-100 rounded-3xl p-5">
                <div class="flex items-start gap-4">

                    {{-- ICON --}}
                    <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-7 h-7 text-red-600"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-4 4v-4z" />
                        </svg>
                    </div>

                    {{-- TEXT --}}
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg">
                            Butuh Bantuan?
                        </h3>

                        <p class="text-sm text-gray-500 mt-1 leading-relaxed">
                            Hubungi admin jika mengalami kendala pada akun atau event perusahaan.
                        </p>
                    </div>

                </div>

                {{-- BUTTON --}}
                <a href="https://wa.me/628123456789"
                   target="_blank"
                   class="mt-5 inline-flex w-full items-center justify-center bg-red-600 hover:bg-red-700 text-white py-3 rounded-2xl font-bold transition">
                    Hubungi Admin
                </a>
            </div>

            {{-- LOGOUT --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full bg-gray-800 hover:bg-black text-white py-4 rounded-2xl font-bold transition">
                    Logout
                </button>
            </form>

        </div>

    </aside>

    {{-- MAIN --}}
    <main class="flex-1">

        {{-- HEADER --}}
        <header class="bg-white shadow-sm px-8 py-5 flex items-center justify-between">

            {{-- TITLE --}}
            <div>
                <h1 class="text-2xl font-black text-gray-800">
                    @yield('title')
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Dashboard Perusahaan Loker Seeker
                </p>
            </div>

            {{-- USER --}}
            <div class="flex items-center gap-4">

                {{-- AVATAR --}}
                <div class="w-14 h-14 rounded-2xl overflow-hidden border shadow-sm">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fee2e2&color=dc2626&bold=true"
                        class="w-full h-full object-cover">
                </div>

                {{-- INFO --}}
                <div class="text-right">
                    <p class="font-bold text-gray-800 text-lg">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Perusahaan
                    </p>
                </div>

            </div>

        </header>

        {{-- CONTENT --}}
        <section class="p-8">
            @yield('content')
        </section>

    </main>

</div>

</body>
</html>