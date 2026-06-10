@extends('perusahaan.layouts.app')

@section('title', 'Detail Peserta Course')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    {{-- HEADER --}}
    <div class="mb-8 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

        <div class="bg-red-600 px-6 md:px-8 py-8 text-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                <div>
                    <p class="font-bold text-white/90 mb-2">
                        Dashboard Perusahaan
                    </p>

                    <h1 class="text-3xl md:text-4xl font-black">
                        Peserta Course
                    </h1>

                    <p class="text-white/90 mt-2 max-w-2xl">
                        Kelola verifikasi pembayaran peserta course perusahaan Anda.
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
                ← Kembali 
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

                    @if(!$registration->payment)
                        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-xs font-black">
                            Belum Bayar
                        </span>
                    @elseif($registration->payment->status === 'pending')
                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-xs font-black">
                            Menunggu Verifikasi
                        </span>
                    @elseif($registration->payment->status === 'verified')
                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-xs font-black">
                            Terverifikasi
                        </span>
                    @else
                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-xs font-black">
                            Ditolak
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

                        <p class="text-xs text-gray-400 font-black uppercase tracking-wide mb-3">
                            Pembayaran
                        </p>

                        @if($registration->payment)

                            @if($registration->payment->status === 'verified')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Terverifikasi
                                </span>
                            @elseif($registration->payment->status === 'rejected')
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Ditolak
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Menunggu Verifikasi
                                </span>
                            @endif

                            <div class="mt-4 space-y-2">

                                @if($registration->payment->proof_image)
                                    <a href="{{ asset('storage/'.$registration->payment->proof_image) }}"
                                       target="_blank"
                                       class="block text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-xl text-sm font-black transition">
                                        Lihat Bukti Pembayaran
                                    </a>
                                @endif

                                @if($registration->payment->status === 'pending')

                                    <form action="{{ route('perusahaan.course.payment.verify', $registration->payment->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-xl text-sm font-black transition">
                                            Terima Pembayaran
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.course.payment.reject', $registration->payment->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-xl text-sm font-black transition">
                                            Tolak Pembayaran
                                        </button>
                                    </form>

                                @else
                                    <div class="bg-white border border-gray-100 rounded-xl px-4 py-3 text-center">
                                        <span class="text-gray-400 text-sm font-semibold">
                                            Pembayaran sudah diproses
                                        </span>
                                    </div>
                                @endif

                            </div>

                        @else

                            <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-bold">
                                Belum Upload Bukti
                            </span>

                        @endif

                    </div>

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
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Status Bayar</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide">Bukti</th>
                        <th class="px-6 py-5 text-gray-600 text-sm font-black uppercase tracking-wide text-center">Verifikasi</th>
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
                            @if(!$registration->payment)
                                <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full text-sm font-bold">
                                    Belum Upload Bukti
                                </span>
                            @elseif($registration->payment->status === 'verified')
                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Terverifikasi
                                </span>
                            @elseif($registration->payment->status === 'rejected')
                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Ditolak
                                </span>
                            @else
                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-bold">
                                    Menunggu Verifikasi
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            @if($registration->payment && $registration->payment->proof_image)
                                <a href="{{ asset('storage/'.$registration->payment->proof_image) }}"
                                   target="_blank"
                                   class="inline-flex bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                    Lihat Bukti
                                </a>
                            @else
                                <span class="text-gray-400 text-sm font-semibold">
                                    Tidak ada bukti
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex flex-wrap justify-center gap-2">

                                @if($registration->payment && $registration->payment->status === 'pending')

                                    <form action="{{ route('perusahaan.course.payment.verify', $registration->payment->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Terima Bayar
                                        </button>
                                    </form>

                                    <form action="{{ route('perusahaan.course.payment.reject', $registration->payment->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl text-sm font-bold transition">
                                            Tolak Bayar
                                        </button>
                                    </form>

                                @elseif($registration->payment)
                                    <span class="bg-gray-100 text-gray-500 px-4 py-2 rounded-xl text-sm font-bold">
                                        Sudah Diproses
                                    </span>
                                @else
                                    <span class="bg-gray-100 text-gray-500 px-4 py-2 rounded-xl text-sm font-bold">
                                        Menunggu Bukti
                                    </span>
                                @endif

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="px-6 py-14 text-center">
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