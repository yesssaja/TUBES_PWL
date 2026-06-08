@extends('perusahaan.layouts.app')

@section('title', 'Peserta RSVP')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- HERO --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2rem] shadow-2xl p-8 mb-8 text-white">
        <div class="absolute -top-16 -right-16 w-52 h-52 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-16 -left-16 w-52 h-52 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
            <div>
                <p class="font-bold text-white/90 mb-2">
                    Dashboard Perusahaan
                </p>

                <h1 class="text-4xl sm:text-5xl font-black leading-tight">
                    Peserta RSVP
                </h1>

                <p class="text-white/90 mt-4 text-lg max-w-2xl">
                    Kelola peserta yang mendaftar event perusahaan Anda.
                </p>
            </div>

            <a href="{{ route('perusahaan.event.index') }}"
               class="inline-flex items-center justify-center bg-white text-red-600 hover:bg-red-50 px-6 py-4 rounded-2xl font-black shadow-lg transition">
                ← Kembali ke Event
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-bold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- DESKTOP TABLE --}}
    <div class="hidden lg:block bg-white rounded-[2rem] shadow-xl border border-gray-100 overflow-hidden">

        <div class="p-6 border-b border-gray-100">
            <h2 class="text-2xl font-black text-gray-800">
                Daftar Peserta
            </h2>

            <p class="text-gray-500 mt-1">
                Total {{ $rsvps->count() }} peserta RSVP.
            </p>
        </div>

        <table class="w-full text-left">
            <thead class="bg-red-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Peserta</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Event</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">HP</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-5 text-xs font-black text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($rsvps as $rsvp)

                    @php
                        $nama = $rsvp->name ?? $rsvp->nama ?? $rsvp->user->name ?? 'Peserta';
                        $email = $rsvp->email ?? $rsvp->user->email ?? '-';
                        $hp = $rsvp->hp ?? $rsvp->no_hp ?? '-';
                        $event = $rsvp->event->nama_event ?? '-';
                        $tanggal = $rsvp->event->tanggal_event ?? '-';
                        $status = $rsvp->status_kehadiran ?? $rsvp->status ?? 'pending';
                    @endphp

                    <tr class="hover:bg-orange-50/40 transition">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=fee2e2&color=dc2626&bold=true"
                                    class="w-14 h-14 rounded-2xl object-cover shadow-sm">

                                <div>
                                    <h3 class="font-black text-gray-800 text-lg">
                                        {{ $nama }}
                                    </h3>

                                    <p class="text-gray-500 text-sm">
                                        {{ $email }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            <h3 class="font-black text-gray-800">
                                {{ $event }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $tanggal }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <span class="font-semibold text-gray-700">
                                {{ $hp }}
                            </span>
                        </td>

                        <td class="px-6 py-5">
                            @if($status == 'hadir' || $status == 'diterima')
                                <span class="inline-flex bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-black">
                                    Diterima
                                </span>
                            @elseif($status == 'ditolak' || $status == 'tidak_hadir')
                                <span class="inline-flex bg-red-50 text-red-700 border border-red-200 px-4 py-2 rounded-full text-sm font-black">
                                    Ditolak
                                </span>
                            @else
                                <span class="inline-flex bg-yellow-50 text-yellow-700 border border-yellow-200 px-4 py-2 rounded-full text-sm font-black">
                                    Pending
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex justify-center gap-3 flex-wrap">

                                <a href="{{ route('perusahaan.rsvp.show', $rsvp->id) }}"
                                   class="bg-blue-50 text-blue-600 px-4 py-2.5 rounded-xl font-black hover:bg-blue-100 transition">
                                    Detail
                                </a>

                                @if($status == 'pending')
                                    <form action="{{ route('perusahaan.rsvp.approve', $rsvp->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button class="bg-green-50 text-green-700 px-4 py-2.5 rounded-xl font-black hover:bg-green-100 transition">
                                            Terima
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.rsvp.reject', $rsvp->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button class="bg-red-50 text-red-600 px-4 py-2.5 rounded-xl font-black hover:bg-red-100 transition">
                                            Tolak
                                        </button>
                                    </form>
                                @elseif($status == 'hadir' || $status == 'diterima')
                                    <span class="bg-green-50 text-green-700 px-4 py-2.5 rounded-xl font-black">
                                        ✓ Sudah Diterima
                                    </span>
                                @elseif($status == 'ditolak' || $status == 'tidak_hadir')
                                    <span class="bg-red-50 text-red-600 px-4 py-2.5 rounded-xl font-black">
                                        ✕ Sudah Ditolak
                                    </span>
                                @endif

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="p-14 text-center">
                            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-4 text-3xl">
                                📋
                            </div>

                            <h3 class="text-xl font-black text-gray-700">
                                Belum ada peserta RSVP
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Peserta yang mendaftar event akan tampil di halaman ini.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    {{-- MOBILE CARD --}}
    <div class="grid grid-cols-1 gap-6 lg:hidden">

        @forelse($rsvps as $rsvp)

            @php
                $nama = $rsvp->name ?? $rsvp->nama ?? $rsvp->user->name ?? 'Peserta';
                $email = $rsvp->email ?? $rsvp->user->email ?? '-';
                $hp = $rsvp->hp ?? $rsvp->no_hp ?? '-';
                $event = $rsvp->event->nama_event ?? '-';
                $status = $rsvp->status_kehadiran ?? $rsvp->status ?? 'pending';
            @endphp

            <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-6">

                <div class="flex items-center gap-4 mb-5">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=fee2e2&color=dc2626&bold=true"
                        class="w-16 h-16 rounded-2xl object-cover shadow-sm">

                    <div class="min-w-0">
                        <h2 class="text-2xl font-black text-gray-800 truncate">
                            {{ $nama }}
                        </h2>

                        <p class="text-gray-500 truncate">
                            {{ $event }}
                        </p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-3xl p-4 space-y-4 mb-5">
                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Email</p>
                        <p class="text-gray-800 font-bold break-all mt-1">{{ $email }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">HP</p>
                        <p class="text-gray-800 font-bold mt-1">{{ $hp }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">Status</p>

                        @if($status == 'hadir' || $status == 'diterima')
                            <p class="text-green-600 font-black mt-1">Diterima</p>
                        @elseif($status == 'ditolak' || $status == 'tidak_hadir')
                            <p class="text-red-600 font-black mt-1">Ditolak</p>
                        @else
                            <p class="text-yellow-600 font-black mt-1">Pending</p>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">

                    <a href="{{ route('perusahaan.rsvp.show', $rsvp->id) }}"
                       class="text-center bg-blue-50 text-blue-600 px-4 py-3 rounded-xl font-black hover:bg-blue-100 transition">
                        Detail
                    </a>

                    @if($status == 'pending')
                        <form action="{{ route('perusahaan.rsvp.approve', $rsvp->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button class="w-full bg-green-50 text-green-700 px-4 py-3 rounded-xl font-black hover:bg-green-100 transition">
                                Terima
                            </button>
                        </form>

                        <form action="{{ route('perusahaan.rsvp.reject', $rsvp->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <button class="w-full bg-red-50 text-red-600 px-4 py-3 rounded-xl font-black hover:bg-red-100 transition">
                                Tolak
                            </button>
                        </form>
                    @elseif($status == 'hadir' || $status == 'diterima')
                        <span class="sm:col-span-2 text-center bg-green-50 text-green-700 px-4 py-3 rounded-xl font-black">
                            ✓ Sudah Diterima
                        </span>
                    @elseif($status == 'ditolak' || $status == 'tidak_hadir')
                        <span class="sm:col-span-2 text-center bg-red-50 text-red-600 px-4 py-3 rounded-xl font-black">
                            ✕ Sudah Ditolak
                        </span>
                    @endif

                </div>

            </div>

        @empty
            <div class="bg-white rounded-[2rem] shadow-xl border border-gray-100 p-10 text-center">
                <div class="w-20 h-20 bg-red-50 text-red-500 rounded-3xl flex items-center justify-center mx-auto mb-4 text-3xl">
                    📋
                </div>

                <h3 class="text-xl font-black text-gray-700">
                    Belum ada peserta RSVP
                </h3>

                <p class="text-gray-500 mt-2">
                    Peserta yang mendaftar event akan tampil di halaman ini.
                </p>
            </div>
        @endforelse

    </div>

</div>

@endsection