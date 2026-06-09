@extends('perusahaan.layouts.app')

@section('title', 'Detail Peserta Course')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- HEADER --}}
    <div class="mb-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="bg-gradient-to-r from-red-600 via-orange-500 to-yellow-400 px-6 md:px-8 py-8 text-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                <div>
                    <p class="font-bold text-white/90 mb-2">
                        Dashboard Perusahaan
                    </p>

                    <h1 class="text-3xl md:text-4xl font-black">
                        Peserta Course
                    </h1>

                    <p class="text-white/90 mt-2 max-w-2xl">
                        Kelola peserta yang mendaftar course perusahaan Anda.
                    </p>
                </div>

            </div>
        </div>

        <div class="p-6 md:p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>
                <p class="text-gray-400 font-black uppercase text-sm tracking-wide">
                    Course
                </p>

                <h2 class="text-2xl md:text-3xl font-black text-gray-900 mt-1">
                    {{ $course->title }}
                </h2>
            </div>

            <a href="{{ route('perusahaan.course.participant.index') }}"
               class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-3 rounded-2xl font-bold transition">
                ← Kembali ke Course
            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- MOBILE CARD VIEW --}}
    <div class="grid grid-cols-1 gap-5 lg:hidden">

        @forelse($registrations as $registration)

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-5">

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
                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-black">
                            Pending
                        </span>
                    @elseif($registration->status === 'approved')
                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-black">
                            Approved
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-black">
                            Rejected
                        </span>
                    @endif

                </div>

                <div class="grid grid-cols-1 gap-4">

                    <div class="bg-gray-50 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide">
                            Kontak
                        </p>

                        <p class="text-gray-800 font-bold mt-1">
                            {{ $registration->no_hp }}
                        </p>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-2">
                            Pembayaran
                        </p>

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

                <div class="mt-5 pt-5 border-t border-gray-100">

                    @if($registration->status === 'pending')

                        <div class="grid grid-cols-2 gap-3">

                            <form action="{{ route('perusahaan.course.participant.approve', $registration->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-2xl text-sm font-black transition">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('perusahaan.course.participant.reject', $registration->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit"
                                        class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-2xl text-sm font-black transition">
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

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-10 text-center">

                <p class="font-black text-gray-800 text-2xl">
                    Belum Ada Peserta
                </p>

                <p class="text-gray-500 mt-2">
                    Belum ada yang mendaftar course ini.
                </p>
            </div>

        @endforelse

    </div>

    {{-- DESKTOP TABLE VIEW --}}
    <div class="hidden lg:block bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Peserta</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Kontak</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Status</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Pembayaran</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                @forelse($registrations as $registration)

                    <tr class="hover:bg-red-50/40 transition">

                        <td class="px-6 py-5">
                            <p class="font-black text-gray-900">
                                {{ $registration->nama }}
                            </p>

                            <p class="text-gray-500 text-sm mt-1">
                                {{ $registration->email }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
                            <p class="font-semibold text-gray-700">
                                {{ $registration->no_hp }}
                            </p>
                        </td>

                        <td class="px-6 py-5">
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

                        <td class="px-6 py-5">
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

                        <td class="px-6 py-5">
                            <div class="flex flex-wrap justify-center gap-2">

                                @if($registration->status === 'pending')

                                    <form action="{{ route('perusahaan.course.participant.approve', $registration->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Approve
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.course.participant.reject', $registration->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Reject
                                        </button>
                                    </form>

                                @else

                                    <span class="bg-gray-100 text-gray-400 px-4 py-2 rounded-xl text-sm font-semibold">
                                        Tidak ada aksi
                                    </span>

                                @endif

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="px-6 py-14 text-center">
                            <div class="text-6xl mb-4">👥</div>

                            <p class="font-black text-gray-800 text-2xl">
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