@extends('perusahaan.layouts.app')

@section('title', 'Detail Peserta Course')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- HERO --}}
    <div class="relative overflow-hidden bg-gradient-to-br from-red-600 via-orange-500 to-yellow-400 rounded-[2.5rem] shadow-2xl p-8 md:p-10 mb-8 text-white max-w-xl">

        <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

        <div class="relative">
            <p class="text-white font-black text-lg mb-5">
                Dashboard Perusahaan
            </p>

            <h1 class="text-5xl md:text-6xl font-black leading-none">
                Peserta<br>
                Course
            </h1>

            <p class="text-white text-xl md:text-2xl mt-7 leading-relaxed">
                Kelola peserta yang mendaftar course perusahaan Anda.
            </p>

            <a href="{{ route('perusahaan.course.participant.index') }}"
               class="mt-8 inline-flex w-full items-center justify-center bg-white hover:bg-red-50 text-red-600 px-6 py-5 rounded-3xl font-black text-lg shadow-xl transition">
                ← Kembali ke Course
            </a>
        </div>

    </div>

    {{-- COURSE TITLE --}}
    <div class="mb-8 bg-white rounded-3xl shadow border border-gray-100 p-6">
        <p class="text-gray-400 font-black uppercase text-sm tracking-wide">
            Course
        </p>

        <h2 class="text-2xl md:text-3xl font-black text-gray-900 mt-2">
            {{ $course->title }}
        </h2>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl font-semibold">
            {{ session('success') }}
        </div>
    @endif

    {{-- MOBILE CARD VIEW --}}
    <div class="grid grid-cols-1 gap-5 lg:hidden">

        @forelse($registrations as $registration)

            <div class="bg-white rounded-3xl shadow border border-gray-100 p-5">

                <div class="flex items-start justify-between gap-4 mb-5">
                    <div>
                        <h2 class="text-xl font-black text-gray-900">
                            {{ $registration->nama }}
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            {{ $registration->email }}
                        </p>
                    </div>

                    @if($registration->status === 'pending')
                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-bold">
                            Pending
                        </span>
                    @elseif($registration->status === 'approved')
                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-bold">
                            Approved
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-bold">
                            Rejected
                        </span>
                    @endif
                </div>

                <div class="space-y-4">

                    <div class="bg-gray-50 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                            Kontak
                        </p>

                        <p class="text-gray-800 font-bold mt-1">
                            {{ $registration->no_hp }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                            Pembayaran
                        </p>

                        <div class="mt-2">
                            @if($registration->payment)
                                @if($registration->payment->status === 'verified')
                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Terverifikasi
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Menunggu Verifikasi
                                    </span>
                                @endif
                            @else
                                <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-bold">
                                    Tidak Ada
                                </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="mt-5 pt-5 border-t border-gray-100">

                    @if($registration->status === 'pending')

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            <form action="{{ route('perusahaan.course.participant.approve', $registration->id) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-2xl text-sm font-bold transition">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('perusahaan.course.participant.reject', $registration->id) }}"
                                  method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-2xl text-sm font-bold transition">
                                    Reject
                                </button>
                            </form>

                        </div>

                    @else

                        <div class="bg-gray-50 rounded-2xl p-4 text-center">
                            <span class="text-gray-400 text-sm font-semibold">
                                Tidak ada aksi
                            </span>
                        </div>

                    @endif

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow p-10 text-center">
                <div class="text-5xl mb-3">
                    👥
                </div>

                <p class="font-bold text-gray-700 text-xl">
                    Belum Ada Peserta
                </p>

                <p class="text-gray-500 mt-2">
                    Belum ada yang mendaftar course ini.
                </p>
            </div>

        @endforelse

    </div>

    {{-- DESKTOP TABLE VIEW --}}
    <div class="hidden lg:block bg-white rounded-3xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-red-50">
                    <tr>
                        <th class="p-5 text-gray-700">Peserta</th>
                        <th class="p-5 text-gray-700">Kontak</th>
                        <th class="p-5 text-gray-700">Status</th>
                        <th class="p-5 text-gray-700">Pembayaran</th>
                        <th class="p-5 text-gray-700 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($registrations as $registration)

                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="p-5">
                            <p class="font-bold text-gray-900">
                                {{ $registration->nama }}
                            </p>

                            <p class="text-gray-500 text-sm mt-1">
                                {{ $registration->email }}
                            </p>
                        </td>

                        <td class="p-5">
                            <p class="font-semibold text-gray-700">
                                {{ $registration->no_hp }}
                            </p>
                        </td>

                        <td class="p-5">
                            @if($registration->status === 'pending')
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Pending
                                </span>
                            @elseif($registration->status === 'approved')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Approved
                                </span>
                            @else
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Rejected
                                </span>
                            @endif
                        </td>

                        <td class="p-5">
                            @if($registration->payment)
                                @if($registration->payment->status === 'verified')
                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Terverifikasi
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                        Menunggu Verifikasi
                                    </span>
                                @endif
                            @else
                                <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-bold">
                                    Tidak Ada
                                </span>
                            @endif
                        </td>

                        <td class="p-5">
                            <div class="flex flex-wrap justify-center gap-2">

                                @if($registration->status === 'pending')

                                    <form action="{{ route('perusahaan.course.participant.approve', $registration->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.course.participant.reject', $registration->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Reject
                                        </button>
                                    </form>

                                @else

                                    <span class="text-gray-400 text-sm">
                                        Tidak ada aksi
                                    </span>

                                @endif

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="p-10 text-center">
                            <div class="text-5xl mb-3">
                                👥
                            </div>

                            <p class="font-bold text-gray-700 text-xl">
                                Belum Ada Peserta
                            </p>

                            <p class="text-gray-500 mt-2">
                                Belum ada yang mendaftar course ini.
                            </p>
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection