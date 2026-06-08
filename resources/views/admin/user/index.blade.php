@php($title = 'Data User')

@extends('admin.layouts.app')

@section('content')

    {{-- HEADER --}}
    <div class="relative overflow-hidden bg-gradient-to-r from-red-700 via-primary to-red-900 rounded-[30px] shadow-glow p-7 md:p-8 mb-7 text-white">

        <div class="absolute -right-20 -top-20 w-60 h-60 bg-white/10 rounded-full"></div>
        <div class="absolute right-36 -bottom-28 w-72 h-72 bg-white/10 rounded-full"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-white/15 border border-white/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8 text-white"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 20.25a7.5 7.5 0 0115 0" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-3xl md:text-4xl font-black tracking-wide">
                        Data User
                    </h1>

                    <p class="mt-2 text-white/90 font-medium">
                        Kelola data user yang terdaftar di LOKER SEEKER.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.dashboard') }}"
                class="inline-flex items-center justify-center gap-2 bg-white/15 hover:bg-white/25 text-white font-bold px-5 py-3 rounded-2xl border border-white/20 transition text-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                Dashboard
            </a>

        </div>

    </div>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- ERROR --}}
    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl mb-6 shadow-soft font-bold flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                </svg>
            </div>

            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-7">

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-red-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Total User
                    </h2>

                    <p class="text-4xl font-black text-red-600 mt-2">
                        {{ $users->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-yellow-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        Admin
                    </h2>

                    <p class="text-4xl font-black text-yellow-500 mt-2">
                        {{ $users->where('role', 'admin')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3l7 4v5c0 5-3.5 8.5-7 9-3.5-.5-7-4-7-9V7l7-4z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12l2 2 4-4" />
                    </svg>
                </div>

            </div>
        </div>

        <div class="bg-white rounded-[28px] shadow-soft p-6 border border-slate-100 relative overflow-hidden hover:-translate-y-1 hover:shadow-lg transition">
            <div class="absolute right-0 top-0 w-28 h-28 bg-orange-50 rounded-bl-[60px]"></div>

            <div class="relative z-10 flex items-center justify-between">

                <div>
                    <h2 class="text-slate-500 text-sm font-semibold">
                        User Biasa
                    </h2>

                    <p class="text-4xl font-black text-orange-500 mt-2">
                        {{ $users->where('role', 'user')->count() }}
                    </p>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-8 h-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 8a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 20a8 8 0 0116 0" />
                    </svg>
                </div>

            </div>
        </div>

    </div>

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-[30px] shadow-soft overflow-hidden border border-slate-100 max-w-full">

        <div class="px-7 py-6 border-b border-slate-100 bg-white flex flex-col md:flex-row md:items-center md:justify-between gap-3">

            <div>
                <h2 class="text-2xl font-black text-gray-800">
                    Daftar User
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Semua akun user yang tersimpan di database.
                </p>
            </div>

            <div class="inline-flex items-center gap-2 bg-red-50 text-red-600 px-4 py-2 rounded-2xl text-sm font-black">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-4 h-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0-4a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
                </svg>

                {{ $users->count() }} Data User
            </div>

        </div>

        <div class="w-full max-w-full overflow-x-auto overflow-y-hidden">

            <table class="w-full min-w-[900px]">

                <thead class="bg-red-50 text-red-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Nama</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Email</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Role</th>
                        <th class="px-6 py-4 text-left text-xs uppercase tracking-wide font-black">Tanggal Daftar</th>
                        <th class="px-6 py-4 text-center text-xs uppercase tracking-wide font-black">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($users as $user)

                        <tr class="hover:bg-red-50/40 transition align-middle">

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="w-11 h-11 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center font-black text-lg">
                                        {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                                    </div>

                                    <div>
                                        <div class="font-black text-gray-800">
                                            {{ $user->name }}
                                        </div>

                                        @if(auth()->id() === $user->id)
                                            <div class="text-xs text-gray-400 mt-1">
                                                Akun sedang digunakan
                                            </div>
                                        @endif
                                    </div>

                                </div>

                            </td>

                            <td class="px-6 py-5 text-gray-700 font-semibold">
                                {{ $user->email }}
                            </td>

                            <td class="px-6 py-5 text-center">
                                @if($user->role === 'admin')
                                    <span class="inline-flex items-center gap-2 bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 3l7 4v5c0 5-3.5 8.5-7 9-3.5-.5-7-4-7-9V7l7-4z" />
                                        </svg>

                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 8a3 3 0 11-6 0 3 3 0 016 0z" />

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4 20a8 8 0 0116 0" />
                                        </svg>

                                        User
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-5 text-gray-700">
                                {{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}
                            </td>

                            <td class="px-6 py-5 text-center">

                                @if(auth()->id() !== $user->id)

                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center gap-2 bg-red-100 hover:bg-red-200 text-red-600 px-4 py-2 rounded-xl text-sm font-black transition">

                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-8 0l1 13h8l1-13M10 11v6m4-6v6" />
                                            </svg>

                                            Hapus
                                        </button>

                                    </form>

                                @else

                                    <span class="inline-flex items-center gap-2 bg-gray-100 text-gray-500 px-4 py-2 rounded-full text-sm font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 13l4 4L19 7" />
                                        </svg>

                                        Akun aktif
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="max-w-md mx-auto">

                                    <div class="w-20 h-20 bg-red-100 text-red-600 rounded-3xl flex items-center justify-center mx-auto mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-10 h-10"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15.75 7.5a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M4.5 20.25a7.5 7.5 0 0115 0" />
                                        </svg>
                                    </div>

                                    <h3 class="text-2xl font-black text-gray-800">
                                        Belum ada data user
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Data user belum tersedia di database.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection