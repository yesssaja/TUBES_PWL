<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Loker Seeker</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/x-icon" href="{{ asset('image/favicon.ico') }}">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.35);
            border-radius: 999px;
        }

        .sidebar-link {
            transition: all .3s ease;
        }

        .sidebar-link:hover {
            background: white;
            color: #dc2626;
            transform: translateX(4px);
        }

        .sidebar-link.active {
            background: white;
            color: #dc2626;
            box-shadow: 0 12px 30px rgba(0,0,0,.14);
        }

        .sidebar-link svg {
            flex-shrink: 0;
        }

        .sidebar-collapsed {
            width: 80px !important;
        }

        .sidebar-collapsed .menu-text,
        .sidebar-collapsed .brand-text,
        .sidebar-collapsed .admin-text,
        .sidebar-collapsed .logout-text {
            display: none;
        }

        .sidebar-collapsed .logo-wrapper {
            justify-content: center;
            padding: 20px 0;
        }

        .sidebar-collapsed .sidebar-link {
            width: 52px;
            height: 52px;
            padding: 0;
            margin: 0 auto;
            justify-content: center;
            border-radius: 18px;
        }

        .sidebar-collapsed .logout-btn {
            width: 52px;
            height: 52px;
            padding: 0;
            margin: 0 auto;
            justify-content: center;
            border-radius: 18px;
        }

        .sidebar-collapsed nav {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar-collapsed .sidebar-link svg,
        .sidebar-collapsed .logout-btn svg {
            width: 22px;
            height: 22px;
        }

        .sidebar-collapsed #toggleSidebar {
            position: static;
            width: 36px;
            height: 36px;
        }

        @media (max-width: 768px) {
            #sidebar {
                transform: translateX(-100%);
                width: 255px !important;
            }

            #sidebar.mobile-open {
                transform: translateX(0);
            }

            #mainContent {
                margin-left: 0 !important;
                width: 100%;
            }

            .mobile-overlay {
                display: none;
            }

            .mobile-overlay.show {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-[#FFF7E8] min-h-screen overflow-hidden">

<div id="mobileOverlay"
     class="mobile-overlay fixed inset-0 bg-black/40 z-40 md:hidden"></div>

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside id="sidebar"
           class="w-[255px] bg-gradient-to-b from-[#B83235] via-[#E31B23] to-[#B91C1C]
                  text-white fixed left-0 top-0 bottom-0 z-50 shadow-2xl overflow-hidden
                  transition-all duration-300">

        <div class="absolute -top-16 -right-20 w-56 h-56 bg-white/10 rounded-full blur-sm"></div>
        <div class="absolute -bottom-24 -left-20 w-72 h-72 bg-white/10 rounded-full blur-sm"></div>

        <div class="relative z-10 h-full flex flex-col">

            {{-- LOGO --}}
            <div class="px-5 pt-6 pb-5 flex items-center justify-between logo-wrapper">

                <div class="flex items-center gap-3">

                    <div class="brand-text">
                        <h1 class="text-xl font-black leading-none">
                            Loker Seeker
                        </h1>
                    </div>

                </div>

                <button id="toggleSidebar"
                        type="button"
                        class="hidden md:flex w-9 h-9 rounded-xl bg-white/15 hover:bg-white/25 items-center justify-center transition">
                    <span id="toggleIcon">‹</span>
                </button>

            </div>

            {{-- MENU --}}
            <nav class="sidebar-scroll flex-1 overflow-y-auto px-4 py-3 space-y-2">
                
                @php
                    $profile = \App\Models\ProfilePerusahaan::where('user_id', Auth::id())->first();
                            
                    $unreadInbox = \App\Models\Inbox::where('is_read', false)
                        ->where(function ($query) use ($profile) {
                            $query->where('pelamar_id', Auth::id());
                        
                            if ($profile) {
                                $query->orWhere('perusahaan_id', $profile->id);
                            }
                        })
                        ->count();
                @endphp
                            
                <a href="{{ route('perusahaan.inbox.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.inbox.*') ? 'active' : '' }} flex items-center justify-between px-4 py-3 rounded-2xl font-black text-sm no-underline">
                            
                    <div class="flex items-center gap-3">
                    
                        <svg class="w-5 h-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 8h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                        </svg>
                    
                        <span class="menu-text">
                            Inbox
                        </span>
                    
                    </div>
                
                    @if($unreadInbox > 0)
                
                        <span class="bg-white text-red-600 text-xs font-black px-2 py-1 rounded-full min-w-[24px] text-center">
                            {{ $unreadInbox }}
                        </span>
                    
                    @endif
                    
                </a>

                <a href="{{ route('perusahaan.dashboard') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.dashboard') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l9-9 9 9M5 10v10h14V10"/>
                    </svg>
                    <span class="menu-text">Dashboard</span>
                </a>

                <a href="{{ route('perusahaan.event.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.event.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3M5 11h14M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                    </svg>
                    <span class="menu-text">Event</span>
                </a>

                <a href="{{ route('perusahaan.rsvp.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.rsvp.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12l2 2 4-4M7 4h10a2 2 0 012 2v14l-3-2-3 2-3-2-3 2V6a2 2 0 012-2z"/>
                    </svg>
                    <span class="menu-text">RSVP</span>
                </a>

                <a href="{{ route('perusahaan.lowongan.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.lowongan.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 6h4m-7 4h10M5 8h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2zm5 0V6a2 2 0 012-2h0a2 2 0 012 2v2"/>
                    </svg>
                    <span class="menu-text">Loker</span>
                </a>

                <a href="{{ route('perusahaan.lamaran.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.lamaran.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6M7 3h7l5 5v13a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                    </svg>
                    <span class="menu-text">Lamaran</span>
                </a>

                <a href="{{ route('perusahaan.review.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.review.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.956a1 1 0 00.95.69h4.16c.969 0 1.371 1.24.588 1.81l-3.366 2.445a1 1 0 00-.364 1.118l1.286 3.956c.3.921-.755 1.688-1.538 1.118l-3.366-2.445a1 1 0 00-1.176 0L8.045 18.02c-.783.57-1.838-.197-1.538-1.118l1.286-3.956a1 1 0 00-.364-1.118L4.063 9.383c-.783-.57-.38-1.81.588-1.81h4.16a1 1 0 00.95-.69l1.286-3.956z"/>
                    </svg>
                
                    <span class="menu-text">Review</span>
                </a>

                <a href="{{ route('perusahaan.manajemen.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.manajemen.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 10h.01M15 10h.01"/>
                    </svg>
                    <span class="menu-text">Manajemen Perusahaan</span>
                </a>

                <a href="{{ route('perusahaan.course.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.course.index') || request()->routeIs('perusahaan.course.create') || request()->routeIs('perusahaan.course.edit') || request()->routeIs('perusahaan.course.show') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 6.5A7.5 7.5 0 004.5 4H4v14h.5A7.5 7.5 0 0112 20.5M12 6.5A7.5 7.5 0 0119.5 4H20v14h-.5A7.5 7.5 0 0012 20.5M12 6.5v14"/>
                    </svg>
                    <span class="menu-text">Course</span>
                </a>

                <a href="{{ route('perusahaan.course.participant.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.course.participant.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 7h6M9 11h6M9 15h3M5 4h14a2 2 0 012 2v14l-4-2-4 2-4-2-4 2V6a2 2 0 012-2z"/>
                    </svg>
                    <span class="menu-text">Participant</span>
                </a>

                <a href="{{ route('perusahaan.profil.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.profil.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6M9 10h.01M15 10h.01"/>
                    </svg>
                    <span class="menu-text">Perusahaan</span>
                </a>

                <a href="{{ route('perusahaan.pengaturan.index') }}"
                   class="sidebar-link {{ request()->routeIs('perusahaan.pengaturan.*') ? 'active' : '' }} flex items-center gap-3 px-4 py-3 rounded-2xl font-black text-sm no-underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10.5 6h3M6 12h12M10.5 18h3M5 6h.01M19 6h.01M5 18h.01M19 18h.01"/>
                    </svg>
                    <span class="menu-text">Pengaturan</span>
                </a>

            </nav>

            {{-- BOTTOM --}}
            <div class="p-4 space-y-3">

                <a href="https://wa.me/628123456789?text=Halo%20Admin%20Loker%20Seeker,%20saya%20ingin%20bertanya%20terkait%20akun%20perusahaan."
                   target="_blank"
                   class="sidebar-link flex items-center gap-3 bg-white/15 hover:bg-white hover:text-red-600 text-white px-4 py-3 rounded-2xl font-black no-underline">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-4 4v-4z"/>
                    </svg>

                    <span class="menu-text admin-text">
                        Hubungi Admin
                    </span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="logout-btn w-full bg-white/15 hover:bg-white hover:text-red-600 text-white py-3 rounded-2xl font-black transition-all duration-300 flex items-center justify-center gap-3">

                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H9m4 8H6a2 2 0 01-2-2V6a2 2 0 012-2h7"/>
                        </svg>

                        <span class="logout-text">
                            Logout
                        </span>
                    </button>
                </form>

            </div>

        </div>
    </aside>

    {{-- MAIN --}}
    <main id="mainContent"
          class="ml-[255px] flex-1 h-screen overflow-y-auto bg-[#FFF7E8] transition-all duration-300">

        {{-- HEADER --}}
        <div class="px-4 sm:px-6 lg:px-8 pt-5">
            <div class="bg-white/90 backdrop-blur-md rounded-[24px] border border-red-100 shadow-sm px-5 sm:px-7 py-4 sm:py-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="flex items-center gap-3">

                    <button id="openMobileSidebar"
                            type="button"
                            class="md:hidden w-11 h-11 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center">
                        ☰
                    </button>

                    <div>
                        <h1 class="text-xl sm:text-2xl font-black text-[#2A050A] leading-tight">
                            @yield('title')
                        </h1>

                        <p class="text-xs sm:text-sm text-gray-500 mt-1">
                            Dashboard Perusahaan Loker Seeker
                        </p>
                    </div>

                </div>

                <div class="flex items-center justify-between sm:justify-end gap-3 w-full sm:w-auto">

                    <div class="min-w-0 text-left sm:text-right">
                        <p class="font-black text-[#2A050A] text-sm truncate max-w-[180px] sm:max-w-[260px]">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-red-500 font-semibold">
                            Perusahaan
                        </p>
                    </div>

                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fee2e2&color=dc2626&bold=true"
                         class="w-11 h-11 rounded-xl border border-red-100 shadow-sm shrink-0">

                </div>

            </div>
        </div>

        {{-- CONTENT --}}
        <section class="p-4 sm:p-6 lg:p-8">
            @yield('content')
        </section>

    </main>

</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const toggleIcon = document.getElementById('toggleIcon');

    const openMobileSidebar = document.getElementById('openMobileSidebar');
    const closeMobileSidebar = document.getElementById('closeMobileSidebar');
    const mobileOverlay = document.getElementById('mobileOverlay');

    if (toggleSidebar) {
        toggleSidebar.addEventListener('click', function () {
            sidebar.classList.toggle('sidebar-collapsed');

            if (sidebar.classList.contains('sidebar-collapsed')) {
                sidebar.classList.remove('w-[255px]');
                sidebar.classList.add('w-[80px]');

                mainContent.classList.remove('ml-[255px]');
                mainContent.classList.add('ml-[80px]');

                toggleIcon.innerHTML = '›';
            } else {
                sidebar.classList.remove('w-[80px]');
                sidebar.classList.add('w-[255px]');

                mainContent.classList.remove('ml-[80px]');
                mainContent.classList.add('ml-[255px]');

                toggleIcon.innerHTML = '‹';
            }
        });
    }

    if (openMobileSidebar) {
        openMobileSidebar.addEventListener('click', function () {
            sidebar.classList.add('mobile-open');
            mobileOverlay.classList.add('show');
        });
    }

    if (closeMobileSidebar) {
        closeMobileSidebar.addEventListener('click', function () {
            sidebar.classList.remove('mobile-open');
            mobileOverlay.classList.remove('show');
        });
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', function () {
            sidebar.classList.remove('mobile-open');
            mobileOverlay.classList.remove('show');
        });
    }
</script>

</body>
</html>