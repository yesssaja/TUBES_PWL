@php
    $activeClass = 'bg-white text-primary font-bold shadow-lg';
    $inactiveClass = 'text-white/90 font-semibold hover:bg-white/15 hover:translate-x-1 transition';
@endphp

<aside id="adminSidebar"
    class="fixed left-0 top-0 bottom-0 w-[280px] bg-gradient-to-b from-red-800 via-primary to-red-700 text-white px-5 py-6 overflow-y-auto overflow-x-hidden z-50 transition-all duration-300 scrollbar-thin">
    
    {{-- DECOR --}}
    <div class="absolute -bottom-24 -left-20 w-80 h-80 bg-white/10 rounded-full"></div>
    <div class="absolute -bottom-16 right-[-80px] w-64 h-64 bg-white/10 rounded-full"></div>

    {{-- BRAND + HIDE BUTTON --}}
    <div class="relative z-10 flex items-center justify-between mb-8">

        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-2xl bg-white/15 flex items-center justify-center border border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 100-15 7.5 7.5 0 000 15z" />
                </svg>
            </div>

            <h1 class="text-2xl font-black leading-tight tracking-wide">
                Looker<br>Seeker
            </h1>
        </div>

        <button type="button"
            onclick="toggleSidebar()"
            class="w-9 h-9 rounded-xl bg-white/15 hover:bg-white/25 border border-white/20 flex items-center justify-center transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19l-7-7 7-7" />
            </svg>
        </button>

    </div>

    {{-- MENU --}}
    <nav class="relative z-10 space-y-1.5">

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? $activeClass : $inactiveClass }}">       

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4 5a1 1 0 011-1h5v7H4V5zM14 4h5a1 1 0 011 1v5h-6V4zM4 15h6v5H5a1 1 0 01-1-1v-4zM14 14h6v5a1 1 0 01-1 1h-5v-6z" />
            </svg>

            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.event.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.event.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z" />
            </svg>

            <span>Event</span>
        </a>

        <a href="{{ route('admin.rsvp.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.rsvp.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>

            <span>RSVP</span>
        </a>

        <a href="{{ route('admin.loker.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.loker.*') ? $activeClass : $inactiveClass }}">
     
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M10 6V5a2 2 0 012-2h0a2 2 0 012 2v1m-8 0h12a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2z" />
            </svg>

            <span>Loker</span>
        </a>

        <a href="{{ route('admin.lamaran.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.lamaran.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 12h6m-6 4h6M7 3h7l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z" />
            </svg>

            <span>Lamaran</span>
        </a>

        <a href="{{ route('admin.groups.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.groups.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
            </svg>

            <span>Group</span>
        </a>

        <a href="{{ route('admin.course.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.course.*') ? $activeClass : $inactiveClass }}">
            
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 14l9-5-9-5-9 5 9 5z" />

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 14l6.16-3.42A12 12 0 0119 15c0 2-3.13 4-7 4s-7-2-7-4c0-1.5.46-2.95.84-4.42L12 14z" />
            </svg>

            <span>Course</span>
        </a>

        <a href="{{ route('admin.review.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.review.*') ? $activeClass : $inactiveClass }}">
            
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3l2.7 5.47 6.03.88-4.36 4.25 1.03 6-5.4-2.84-5.4 2.84 1.03-6-4.36-4.25 6.03-.88L12 3z" />
            </svg>

            <span>Review</span>
        </a>

        <a href="{{ route('admin.perusahaan.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.perusahaan.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4 21V5a1 1 0 011-1h6v17M13 21V9h6a1 1 0 011 1v11M8 8h1m-1 4h1m-1 4h1m7-4h1m-1 4h1" />
            </svg>

            <span>Perusahaan</span>
        </a>

        <a href="{{ route('admin.user.index') }}"
            class="flex items-center gap-4 px-4 py-3 rounded-2xl {{ request()->routeIs('admin.user.*') ? $activeClass : $inactiveClass }}">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 12a4 4 0 100-8 4 4 0 000 8zM4 21a8 8 0 0116 0" />
            </svg>

            <span>User</span>
        </a>

    </nav>

    {{-- PROFILE ADMIN + LOGOUT --}}
    @auth
        <div class="relative z-10 mt-5 bg-white/15 border border-white/20 rounded-2xl px-4 py-4 backdrop-blur">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center font-black shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="text-sm font-black leading-tight truncate">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-white/75">
                        Super Admin
                    </p>
                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf

                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-white text-primary hover:bg-red-50 px-4 py-2.5 rounded-xl text-sm font-black shadow transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-4 h-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H9" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M13 4H6a2 2 0 00-2 2v12a2 2 0 002 2h7" />
                    </svg>

                    Logout
                </button>
            </form>

        </div>
    @endauth

</aside>