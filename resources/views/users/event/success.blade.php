@extends('users.layouts.app')

@section('title', 'Berhasil Daftar Event')

@section('content')

<div class="min-h-screen flex items-center justify-center px-6 py-16 bg-gradient-to-br from-red-50 via-orange-50 to-yellow-50">

    <div class="relative max-w-lg w-full">

        {{-- Dekorasi Blur --}}
        <div class="absolute -top-10 -left-10 w-32 h-32 bg-red-300 rounded-full blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-yellow-300 rounded-full blur-3xl opacity-40 animate-pulse"></div>

        {{-- Card --}}
        <div class="relative bg-white/90 backdrop-blur-xl rounded-[2rem] shadow-2xl border border-white p-8 md:p-10 text-center overflow-hidden animate-fadeInUp">

            {{-- Garis atas --}}
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-600 via-orange-400 to-yellow-400"></div>

            {{-- Icon --}}
            <div class="mx-auto mb-6 w-28 h-28 rounded-full bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center shadow-inner animate-bounceSlow">
                <span class="text-6xl">✅</span>
            </div>

            <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                RSVP Berhasil!
            </h1>

            <p class="text-gray-600 text-base md:text-lg mb-3 leading-relaxed">
                Terima kasih telah mendaftar event.
            </p>

            <div class="bg-orange-50 border border-orange-200 rounded-2xl px-5 py-4 mb-8">
                <p class="text-gray-600 leading-relaxed">
                    Status kehadiran Anda saat ini masih
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-100 text-orange-700 font-black text-sm mx-1">
                        Pending
                    </span>
                    dan menunggu persetujuan penyelenggara.
                </p>
            </div>

            <a href="{{ route('event.index') }}"
               class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-orange-500 hover:from-red-700 hover:to-orange-600 text-white font-black px-8 py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                ← Kembali ke Event
            </a>

        </div>

    </div>

</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(25px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounceSlow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.7s ease-out both;
    }

    .animate-bounceSlow {
        animation: bounceSlow 2.2s ease-in-out infinite;
    }
</style>

@endsection