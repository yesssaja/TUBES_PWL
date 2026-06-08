@extends('users.layouts.app')

@section('title', 'Form RSVP Event')

@section('content')

<section class="min-h-screen bg-gradient-to-br from-[#FFF7E8] via-white to-red-50 px-4 sm:px-6 pt-28 pb-20">

    <div class="max-w-6xl mx-auto">

        <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.4fr] gap-8 items-start">

            {{-- EVENT INFO --}}
            <div class="bg-gradient-to-br from-red-600 via-red-700 to-[#4A0E17] text-white rounded-[32px] shadow-2xl p-6 md:p-8 lg:sticky lg:top-28 overflow-hidden relative">

                <div class="absolute -top-20 -right-20 w-64 h-64 bg-yellow-400/30 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

                <div class="relative">
                    <span class="inline-flex items-center gap-2 bg-white/15 border border-white/20 px-4 py-2 rounded-full text-xs font-black uppercase tracking-wider mb-5">
                        🎟 RSVP Event
                    </span>

                    <h1 class="text-3xl md:text-4xl font-black leading-tight mb-4">
                        {{ $event->nama_event }}
                    </h1>

                    <p class="text-red-50 leading-relaxed mb-8">
                        Silakan lengkapi data kehadiranmu untuk mengikuti event ini.
                    </p>

                    <div class="space-y-4">

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-4">
                            <p class="text-xs text-red-100 font-black uppercase tracking-wider">
                                Lokasi
                            </p>
                            <p class="text-lg font-black mt-1">
                                {{ $event->lokasi ?? 'Lokasi belum tersedia' }}
                            </p>
                        </div>

                        <div class="bg-white/10 border border-white/10 rounded-2xl p-4">
                            <p class="text-xs text-red-100 font-black uppercase tracking-wider">
                                Tanggal
                            </p>
                            <p class="text-lg font-black mt-1">
                                {{ $event->tanggal_event ?? $event->tanggal ?? '-' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 border border-white/10 rounded-2xl p-4">
                                <p class="text-xs text-red-100 font-black uppercase tracking-wider">
                                    Jam
                                </p>
                                <p class="text-lg font-black mt-1">
                                    {{ $event->jam ? substr($event->jam, 0, 5) : ($event->waktu_mulai ? substr($event->waktu_mulai, 0, 5) : '-') }}
                                </p>
                            </div>

                            <div class="bg-white/10 border border-white/10 rounded-2xl p-4">
                                <p class="text-xs text-red-100 font-black uppercase tracking-wider">
                                    Kuota
                                </p>
                                <p class="text-lg font-black mt-1">
                                    {{ $event->kuota ?? '-' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- FORM --}}
            <div class="bg-white rounded-[32px] shadow-2xl border border-red-100 p-6 sm:p-8 md:p-10">

                <div class="mb-8 text-center sm:text-left">
                    <p class="text-red-600 font-black uppercase tracking-[4px] text-xs mb-3">
                        Form Pendaftaran
                    </p>

                    <h2 class="text-3xl md:text-4xl font-black text-[#2A050A] leading-tight">
                        Konfirmasi Kehadiran
                    </h2>

                    <p class="text-gray-500 mt-3 leading-relaxed">
                        Isi data berikut dengan benar agar proses RSVP kamu dapat diproses.
                    </p>
                </div>

                @if(session('error'))
                    <div class="bg-red-50 text-red-700 border border-red-200 px-5 py-4 rounded-2xl mb-5 font-semibold">
                        ⚠️ {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-50 text-green-700 border border-green-200 px-5 py-4 rounded-2xl mb-5 font-semibold">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 text-red-700 border border-red-200 px-5 py-4 rounded-2xl mb-5">
                        <p class="font-black mb-2">
                            Mohon periksa kembali:
                        </p>

                        <ul class="list-disc list-inside space-y-1 text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('rsvp.store', $event->id) }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block mb-2 font-black text-gray-700">
                            Nama Lengkap
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', auth()->user()->name ?? '') }}"
                               placeholder="Masukkan nama lengkap"
                               class="w-full border border-gray-200 rounded-2xl px-4 py-4 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-500 transition text-gray-800"
                               required>
                    </div>

                    <div>
                        <label class="block mb-2 font-black text-gray-700">
                            Email Aktif
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ old('email', auth()->user()->email ?? '') }}"
                               placeholder="contoh@email.com"
                               class="w-full border border-gray-200 rounded-2xl px-4 py-4 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-500 transition text-gray-800"
                               required>
                    </div>

                    <div>
                        <label class="block mb-2 font-black text-gray-700">
                            No HP / WhatsApp
                        </label>

                        <input type="text"
                               name="hp"
                               value="{{ old('hp') }}"
                               placeholder="Contoh: 081234567890"
                               class="w-full border border-gray-200 rounded-2xl px-4 py-4 focus:outline-none focus:ring-4 focus:ring-red-100 focus:border-red-500 transition text-gray-800"
                               required>
                    </div>

                    <button type="submit"
                            class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 rounded-2xl transition shadow-xl hover:-translate-y-1">
                        Daftar RSVP
                    </button>

                </form>

                <div class="text-center mt-6">
                    <a href="{{ route('event.index') }}"
                       class="inline-flex items-center justify-center text-red-600 font-black hover:text-red-700 no-underline">
                        ← Kembali ke Event
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection