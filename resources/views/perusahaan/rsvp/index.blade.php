@extends('perusahaan.layouts.app')

@section('title', 'Peserta RSVP')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Peserta RSVP
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola peserta yang mendaftar event perusahaan Anda.
            </p>
        </div>

        <a href="{{ route('perusahaan.event.index') }}"
           class="inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-2xl font-semibold transition">
            ← Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="hidden lg:block bg-white rounded-3xl shadow overflow-hidden">

        <table class="w-full text-left">

            <thead class="bg-red-50">
                <tr>
                    <th class="p-5">Peserta</th>
                    <th>Event</th>
                    <th>HP</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($rsvps as $rsvp)

                    @php
                        $nama = $rsvp->name ?? $rsvp->nama ?? $rsvp->user->name ?? 'Peserta';
                        $email = $rsvp->email ?? $rsvp->user->email ?? '-';
                        $hp = $rsvp->hp ?? $rsvp->no_hp ?? '-';
                        $event = $rsvp->event->nama_event ?? '-';
                        $tanggal = $rsvp->event->tanggal_event ?? '-';
                        $status = $rsvp->status_kehadiran ?? $rsvp->status ?? 'pending';
                    @endphp

                    <tr class="border-b hover:bg-gray-50 transition">

                        <td class="p-5">
                            <div class="flex items-center gap-4">
                                <img
                                    src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=fee2e2&color=dc2626&bold=true"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>
                                    <h3 class="font-bold text-lg">
                                        {{ $nama }}
                                    </h3>

                                    <p class="text-gray-500 text-sm">
                                        {{ $email }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td>
                            <h3 class="font-semibold">
                                {{ $event }}
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $tanggal }}
                            </p>
                        </td>

                        <td>
                            {{ $hp }}
                        </td>

                        <td>
                            @if($status == 'diterima' || $status == 'hadir')
                                <span class="bg-green-100 text-green-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Diterima
                                </span>
                            @elseif($status == 'ditolak' || $status == 'tidak hadir')
                                <span class="bg-red-100 text-red-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Ditolak
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full text-sm font-semibold">
                                    Pending
                                </span>
                            @endif
                        </td>

                        <td>
                            <div class="flex justify-center gap-3">

                                <a href="{{ route('perusahaan.rsvp.show', $rsvp->id) }}"
                                   class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold hover:bg-blue-200 transition">
                                    Detail
                                </a>

                                <form action="{{ route('perusahaan.rsvp.approve', $rsvp->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button class="bg-green-100 text-green-600 px-4 py-2 rounded-xl font-semibold hover:bg-green-200 transition">
                                        Terima
                                    </button>
                                </form>

                                <form action="{{ route('perusahaan.rsvp.reject', $rsvp->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')

                                    <button class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold hover:bg-red-200 transition">
                                        Tolak
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="p-10 text-center text-gray-500">
                            Belum ada peserta RSVP.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

    <div class="grid grid-cols-1 gap-6 lg:hidden">

        @forelse($rsvps as $rsvp)

            @php
                $nama = $rsvp->name ?? $rsvp->nama ?? $rsvp->user->name ?? 'Peserta';
                $email = $rsvp->email ?? $rsvp->user->email ?? '-';
                $hp = $rsvp->hp ?? $rsvp->no_hp ?? '-';
                $event = $rsvp->event->nama_event ?? '-';
                $status = $rsvp->status_kehadiran ?? $rsvp->status ?? 'pending';
            @endphp

            <div class="bg-white rounded-3xl shadow p-6">

                <div class="flex items-center gap-4 mb-5">
                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode($nama) }}&background=fee2e2&color=dc2626&bold=true"
                        class="w-16 h-16 rounded-full object-cover">

                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ $nama }}
                        </h2>

                        <p class="text-gray-500">
                            {{ $event }}
                        </p>
                    </div>
                </div>

                <div class="space-y-2 mb-5">
                    <p><span class="font-semibold">Email:</span> {{ $email }}</p>
                    <p><span class="font-semibold">HP:</span> {{ $hp }}</p>
                    <p><span class="font-semibold">Status:</span> {{ ucfirst($status) }}</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('perusahaan.rsvp.show', $rsvp->id) }}"
                       class="bg-blue-100 text-blue-600 px-4 py-2 rounded-xl font-semibold">
                        Detail
                    </a>

                    <form action="{{ route('perusahaan.rsvp.approve', $rsvp->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button class="bg-green-100 text-green-600 px-4 py-2 rounded-xl font-semibold">
                            Terima
                        </button>
                    </form>

                    <form action="{{ route('perusahaan.rsvp.reject', $rsvp->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button class="bg-red-100 text-red-600 px-4 py-2 rounded-xl font-semibold">
                            Tolak
                        </button>
                    </form>
                </div>

            </div>

        @empty
            <div class="bg-white rounded-3xl shadow p-8 text-center text-gray-500">
                Belum ada peserta RSVP.
            </div>
        @endforelse

    </div>

</div>

@endsection