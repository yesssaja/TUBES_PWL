<header class="bg-red-600 shadow-lg relative z-50">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">

        <a href="{{ route('index') }}" class="text-white text-3xl font-black no-underline">
            LOKER SEEKER
        </a>

        @auth
            @php
                $unreadInbox = class_exists(\App\Models\Inbox::class)
                    ? \App\Models\Inbox::where('pelamar_id', auth()->id())
                        ->where('is_read', false)
                        ->count()
                    : 0;

                $latestInboxes = class_exists(\App\Models\Inbox::class)
                    ? \App\Models\Inbox::where('pelamar_id', auth()->id())
                        ->latest()
                        ->take(5)
                        ->get()
                    : collect();
            @endphp
        @endauth

        <div class="flex items-center gap-4">

            {{-- SEARCH --}}
           <form action="{{ route('search.global') }}"
                  method="GET"
                  class="hidden md:flex items-center gap-2">

                <input type="text"
                       name="q"
                       value="{{ request('q') }}"
                       placeholder="Cari loker, perusahaan, event..."
                       class="w-80 p-3 rounded-xl border-none outline-none">

                <button type="submit"
                        class="bg-white px-4 py-2 rounded-xl font-bold">
                    Cari
                </button>

                
            </form>
            
            {{-- NOTIF --}}
            @auth
            @if(Route::has('inbox.index'))
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
                                       class="block px-5 py-4 border-b hover:bg-red-50 transition no-underline {{ !$notif->is_read ? 'bg-yellow-50' : 'bg-white' }}">

                                        <div class="flex items-start gap-3">
                                            
                                            <div class="w-10 h-10 rounded-xl flex items-center justify-center shrink-0
                                                {{ !$notif->is_read ? 'bg-red-100 text-red-600' : 'bg-gray-100 text-gray-500' }}">

                                                @if(str_contains($notif->type ?? '', 'course'))
                                                    🎓
                                                @elseif(str_contains($notif->type ?? '', 'lamaran'))
                                                    📩
                                                @elseif(str_contains($notif->type ?? '', 'rsvp'))
                                                    📝
                                                @elseif(str_contains($notif->type ?? '', 'review'))
                                                    ⭐
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
                                        <p class="font-bold">Belum ada notifikasi</p>
                                    </div>
                                    @endforelse
                                </div>

                            <div class="p-4 bg-gray-50">
                                <a href="{{ route('inbox.index') }}"
                                   class="block text-center bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl font-black transition no-underline">
                                    Lihat Semua Inbox
                                </a>
                            </div>

                        </div>
                    </div>
                @endif
            @endauth

            {{-- MENU --}}
            <div class="relative">
                
                <button onclick="toggleMenu()"
                        class="text-white text-3xl font-bold">
                        ☰
                </button>

               <div id="menuDropdown"
                     class="hidden absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl p-4 z-50">

                    @auth
                        @if(Route::has('inbox.index'))
                        <a href="{{ route('inbox.index') }}"
                        class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">

                                <span class="inline-flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5 text-white"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">
                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 11-6 0" />
                                        </svg>
                                    </span>

                                    <span>Notifikasi / Inbox</span>
                                    
                                    @if(isset($unreadInbox) && $unreadInbox > 0)
                                        <span class="bg-yellow-400 text-red-700 text-xs font-black px-2 py-0.5 rounded-full ml-1">
                                            {{ $unreadInbox }}
                                        </span>
                                    @endif
                                </span>
                                
                            </a>
                        @endif
                    @endauth
                    
                    <a href="{{ route('index') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-red-500 to-rose-700 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M3 11l9-8 9 8" />
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 10v10h5v-6h4v6h5V10" />
                                </svg>
                            </span>

                            <span>Home</span>
                        </span>
                    </a>
                    
                    <a href="{{ Route::has('loker.index') ? route('loker.index') : url('/loker') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-700 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-white"
                                fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M10 6h4a2 2 0 012 2v2h3a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2h3V8a2 2 0 012-2z" />
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M8 10h8" />
                                </svg>
                            </span>

                            <span>Jobs / Lowongan Kerja</span>
                        </span>
                    </a>

                    <a href="{{ Route::has('perusahaan.index') ? route('perusahaan.index') : url('/perusahaan') }}"
                    class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-slate-600 to-slate-900 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                     <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M4 21V5a2 2 0 012-2h8a2 2 0 012 2v16" />
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M9 7h2M9 11h2M9 15h2M16 9h3a1 1 0 011 1v11" />
                                </svg>
                            </span>

                            <span>Company / Perusahaan</span>
                        </span>
                    </a>

                    <a href="{{ Route::has('event.index') ? route('event.index') : url('/event') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-purple-500 to-fuchsia-700 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                     <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M8 7V3m8 4V3M4 11h16" />
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                </svg>
                            </span>
                            
                            <span>Event</span>
                        </span>
                    </a>

                    <a href="{{ Route::has('groups.index') ? route('groups.index') : url('/group') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-700 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                          d="M16 11a4 4 0 10-8 0 4 4 0 008 0z" />
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 21a8 8 0 0116 0" />
                                    <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 8a3 3 0 012 5M5 8a3 3 0 00-2 5" />
                                </svg>
                            </span>

                            <span>Group</span>
                        </span>
                    </a>
                    
                    <a href="{{ Route::has('service.index') ? route('service.index') : url('/service') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                       <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-red-500 to-orange-600 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                     <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M14.7 6.3a4 4 0 01-5.4 5.4L4 17l3 3 5.3-5.3a4 4 0 015.4-5.4l-3 3-2-2 3-3z" />
                                </svg>
                            </span>
                            
                            <span>Service</span>
                        </span>
                    </a>

                    <a href="{{ Route::has('course.index') ? route('course.index') : url('/course') }}"
                       class="block px-4 py-3 font-bold text-black hover:bg-red-100 rounded-xl">
                        <span class="inline-flex items-center gap-3">
                            <span class="w-9 h-9 rounded-xl bg-gradient-to-br from-cyan-500 to-blue-700 flex items-center justify-center shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-white"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="2">
                                     <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 4L3 9l9 5 9-5-9-5z" />
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 11v5c2 3 12 3 14 0v-5" />
                                        </svg>
                                    </span>

                                    <span>Course</span>
                                </span>
                    </a>

                </div>
            </div>

            {{-- GUEST --}}
            @guest
                <a href="{{ route('login') }}"
                   class="text-white font-bold uppercase hover:underline">
                    Login
                </a>
                
                <a href="{{ route('register') }}"
                class="text-white font-bold uppercase hover:underline">
                    Register
                </a>
            @endguest

            {{-- PROFILE --}}
            @auth
            <div class="relative">
                
                <button onclick="toggleProfile()"
                            class="flex items-center gap-2 text-white font-bold">

                        <div class="w-10 h-10 rounded-full bg-white text-red-600 flex items-center justify-center font-black text-lg shadow">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        
                    </button>

                    <div id="profileDropdown"
                         class="hidden absolute right-0 mt-4 w-80 bg-white rounded-3xl shadow-2xl overflow-hidden z-50">

                         {{-- PROFILE HEADER --}}
                        <div class="p-6">
                            <div class="flex items-center gap-4">

                                <div class="w-16 h-16 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-3xl font-black">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0">
                                    <h3 class="font-black text-2xl text-gray-900 truncate">
                                        {{ Auth::user()->name }}
                                    </h3>

                                    <p class="text-gray-500 text-sm truncate">
                                        {{ Auth::user()->email }}
                                    </p>
                                    
                                    <div class="mt-2 inline-flex items-center bg-yellow-400 text-gray-900 text-xs font-black px-3 py-1 rounded-full">
                                        👤 Pelamar
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="border-t"></div>
                        
                        {{-- PROFILE / DATA DIRI --}}
                        <a href="{{ route('profile.pelamar.index') }}"
   class="flex items-center justify-between px-6 py-5 hover:bg-red-50 transition no-underline">

    <div class="flex items-center gap-4">

        <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-2xl">
            👤
        </div>
        
        <div>
            <h4 class="font-black text-xl text-gray-900">
                Profile
            </h4>
            
            <p class="text-gray-500 text-sm">
                Cek data diri pelamar
            </p>
        </div>
        
    </div>
    <span class="text-3xl text-gray-400">›</span>
</a>

<div class="border-t"></div>

{{-- LOGOUT --}}
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit"
                            class="w-full flex items-center justify-between px-6 py-5 hover:bg-red-50 transition">
                            
                            <div class="flex items-center gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-2xl">
                                        ↪
                                    </div>

                                    <div class="text-left">
                                        <h4 class="font-black text-xl text-red-600">
                                            Logout
                                        </h4>

                                        <p class="text-gray-500 text-sm">
                                            Keluar dari akun
                                        </p>
                                    </div>
                                    
                                </div>

                                <span class="text-3xl text-gray-400">›</span>
                            </button>
                        </form>

                    </div>

                </div>
                @endauth
                
        </div>
    </div>
</header>

@if(session('error'))
    <div class="w-full bg-gradient-to-r from-red-400 to-red-400 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-center gap-3 font-bold">
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif

<script>
    function toggleMenu() {
        const menu = document.getElementById('menuDropdown');
        const notif = document.getElementById('notifDropdown');
        const profile = document.getElementById('profileDropdown');

        if (menu) menu.classList.toggle('hidden');
        if (notif && !notif.classList.contains('hidden')) notif.classList.add('hidden');
        if (profile && !profile.classList.contains('hidden')) profile.classList.add('hidden');
    }

    function toggleProfile() {
        const profile = document.getElementById('profileDropdown');
        const menu = document.getElementById('menuDropdown');
        const notif = document.getElementById('notifDropdown');

        if (profile) profile.classList.toggle('hidden');
        if (menu && !menu.classList.contains('hidden')) menu.classList.add('hidden');
        if (notif && !notif.classList.contains('hidden')) notif.classList.add('hidden');
    }

    function toggleNotif() {
        const notif = document.getElementById('notifDropdown');
        const menu = document.getElementById('menuDropdown');
        const profile = document.getElementById('profileDropdown');

        if (notif) notif.classList.toggle('hidden');
        if (menu && !menu.classList.contains('hidden')) menu.classList.add('hidden');
        if (profile && !profile.classList.contains('hidden')) profile.classList.add('hidden');
    }
</script>