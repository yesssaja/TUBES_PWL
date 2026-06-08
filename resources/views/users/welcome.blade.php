@extends('users.layouts.app')

@section('title', 'Home - Loker Seeker')

@section('content')

<style>
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes textReveal {
    0% { opacity: 0; transform: translateY(110%); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes floatSoft {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

@keyframes pulseGlow {
    0%, 100% { box-shadow: 0 16px 35px rgba(220, 38, 38, .18); }
    50% { box-shadow: 0 22px 55px rgba(220, 38, 38, .35); }
}

@keyframes fadeScale {
    from { opacity: 0; transform: scale(.94); }
    to { opacity: 1; transform: scale(1); }
}

.delay-\[200ms\] {
    animation-delay: 200ms;
}

.delay-\[400ms\] {
    animation-delay: 400ms;
}

.animate-float-soft {
    animation: floatSoft 4s ease-in-out infinite;
}

.animate-pulse-glow {
    animation: pulseGlow 3s ease-in-out infinite;
}

.animate-fade-scale {
    animation: fadeScale .9s ease-out both;
}
</style>

<div class="bg-[#FDF6D8] text-[#3B0A12] min-h-screen font-sans">

    {{-- HERO --}}
    <header class="sticky top-0 h-screen flex items-center overflow-hidden w-full z-10"
        style="background-image: url('{{ asset('images/bg_dash.jpg') }}'); background-size: cover; background-position: center;">

        <div class="absolute inset-0 bg-gradient-to-br from-[#FDF6D8]/80 via-[#FDF6D8]/55 to-red-900/20"></div>

        <div class="relative z-20 max-w-7xl mx-auto px-6 md:px-16 w-full text-center md:text-left animate-fade-scale">
            <p class="text-red-600 font-black tracking-[6px] uppercase mb-5 text-sm md:text-base">
                Platform Lowongan Kerja
            </p>

            <h2 class="text-5xl md:text-7xl font-black text-[#1E1114] leading-tight">
                Cari <span class="text-red-600">Pekerjaan</span><br>
                Impianmu
            </h2>

            <p class="mt-6 text-lg md:text-xl text-[#4A2A2F] max-w-xl leading-relaxed mx-auto md:mx-0 font-semibold">
                Temukan peluang karier, event, course, dan komunitas yang sesuai dengan minatmu.
            </p>
        </div>
    </header>

    <div class="relative z-20 bg-[#FDF6D8] shadow-[0_-20px_50px_rgba(0,0,0,0.15)] rounded-t-[40px]">

        {{-- INTRO --}}
        <section class="max-w-7xl mx-auto px-6 pt-24 pb-24 grid md:grid-cols-2 gap-14 items-start relative">

            <div class="md:sticky md:top-28 self-start">

                <div class="bg-[#2A050A] rounded-[36px] p-4 shadow-2xl border border-red-900/40 overflow-hidden group animate-float-soft">
                    <div class="bg-gradient-to-br from-red-600 via-red-700 to-[#4A0E17] text-white rounded-[28px] p-8 aspect-[16/10] flex flex-col justify-between transition-all duration-500 group-hover:scale-[1.02]">

                        <div>
                            <p class="text-xs uppercase tracking-[4px] mb-3 text-yellow-300 font-black">
                                Loker Terbaru
                            </p>

                            <h3 class="text-4xl font-black mb-3 leading-tight">
                                {{ isset($lokers) && $lokers->count() > 0 ? $lokers->first()->judul_loker : 'Backend Developer' }}
                            </h3>

                            <p class="text-base text-red-50 font-medium">
                                @if(isset($lokers) && $lokers->count() > 0)
                                    {{ $lokers->first()->perusahaan->nama_perusahaan ?? 'Perusahaan' }} •
                                    {{ $lokers->first()->lokasi ?? '-' }} •
                                    {{ $lokers->first()->tipe_pekerjaan ?? '-' }}
                                @else
                                    PT Shopee Indonesia • Bandung • Full Time
                                @endif
                            </p>
                        </div>

                        <div class="mt-6">
                            @if(isset($lokers) && $lokers->count() > 0)
                                <a href="{{ route('detail.loker', $lokers->first()->id) }}"
                                   class="inline-block bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-300 hover:text-[#2A050A] transition shadow-lg">
                                    Lihat Detail
                                </a>
                            @else
                                <a href="{{ route('loker.index') }}"
                                   class="inline-block bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-300 hover:text-[#2A050A] transition shadow-lg">
                                    Lihat Detail
                                </a>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                    <a href="{{ route('perusahaan.index') }}"
                       class="bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-xl transition animate-pulse-glow text-center">
                        Lihat Semua Perusahaan
                    </a>

                    <a href="{{ route('groups.index') }}"
                       class="bg-white text-[#2A050A] px-6 py-4 rounded-2xl font-black shadow-xl hover:scale-105 transition text-center border border-red-100">
                        Gabung Group
                    </a>
                </div>
            </div>

            <div class="space-y-20">

                <div class="motion-safe:animate-[fadeInUp_1s_ease-out]">
                    <p class="text-[#3B2528] text-xl md:text-2xl leading-relaxed max-w-xl font-medium">
                        Temukan lowongan kerja terbaik berdasarkan skill, lokasi, dan minatmu bersama
                        <span class="text-red-600 font-black">Loker Seeker</span>. Kami bekerja sama dengan mitra terpercaya untuk membangun karir digital masa depanmu.
                    </p>
                </div>

                <div class="border-t border-red-900/20 pt-10">
                    <p class="text-xs uppercase tracking-[3px] text-red-600 font-black mb-8">
                        Mitra Perusahaan Terpercaya
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        <a href="{{ route('perusahaan.detail', 6) }}"
                           class="bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline block animate-fade-scale hover:-translate-y-2">
                            <img src="{{ asset('images/shopee.png') }}" alt="Shopee" class="w-16 h-16 object-contain mb-4">
                            <span class="font-black text-xl tracking-wide">Shopee</span>
                        </a>

                        <a href="{{ route('perusahaan.detail', 3) }}"
                           class="bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline block animate-fade-scale hover:-translate-y-2">
                            <img src="{{ asset('images/tokopedia.png') }}" alt="Tokopedia" class="w-16 h-16 object-contain mb-4">
                            <span class="font-black text-xl tracking-wide">Tokopedia</span>
                        </a>

                        <a href="{{ route('perusahaan.detail', 4) }}"
                           class="bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline block animate-fade-scale hover:-translate-y-2">
                            <img src="{{ asset('images/lazada.png') }}" alt="Lazada" class="w-16 h-16 object-contain mb-4">
                            <span class="font-black text-xl tracking-wide">Lazada</span>
                        </a>

                        <a href="{{ route('perusahaan.detail', 5) }}"
                           class="bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline block animate-fade-scale hover:-translate-y-2">
                            <img src="{{ asset('images/blibli.png') }}" alt="Blibli" class="w-16 h-16 object-contain mb-4">
                            <span class="font-black text-xl tracking-wide">Blibli</span>
                        </a>

                    </div>
                </div>

                <div class="border-t border-red-900/20 pt-10">
                    <p class="text-xs uppercase tracking-[3px] text-red-600 font-black mb-8">
                        Loker Seeker Dalam Angka
                    </p>

                    <div class="grid grid-cols-2 gap-8 text-left">
                        <div class="hover:-translate-y-2 transition duration-300">
                            <h3 class="text-6xl font-black text-yellow-500 tracking-tight">120+</h3>
                            <p class="text-[#5F4B4E] font-bold text-sm mt-2 uppercase tracking-wider">Pelamar Mendaftar</p>
                        </div>

                        <div class="hover:-translate-y-2 transition duration-300">
                            <h3 class="text-6xl font-black text-[#2A050A] tracking-tight">45</h3>
                            <p class="text-[#5F4B4E] font-bold text-sm mt-2 uppercase tracking-wider">Pelamar Diterima</p>
                        </div>

                        <div class="col-span-2 pt-6 border-t border-red-900/20 mt-4 hover:-translate-y-2 transition duration-300">
                            <h3 class="text-5xl font-black text-red-600 tracking-tight">20</h3>
                            <p class="text-[#5F4B4E] text-base mt-2 font-medium">
                                Pelamar ditolak, tetap semangat mencari peluang baru!
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    {{-- LOKER --}}
    <section id="loker" class="bg-gradient-to-b from-[#FDF6D8] via-white to-white text-[#2A050A] py-24 relative z-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center md:text-left mb-16 motion-safe:animate-[fadeInUp_1s_ease-out]">
                <p class="text-xs uppercase tracking-[4px] text-red-600 font-black mb-2">
                    Lowongan Pilihan
                </p>

                <h2 class="text-5xl font-black text-[#2A050A] tracking-tight overflow-hidden flex flex-wrap justify-center md:justify-start gap-x-3">
                    <span>Temukan</span>
                    <span class="text-red-600 inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[200ms]">pekerjaan</span>
                    <span class="text-red-600 inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[400ms]">terbaik</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($lokers as $loker)
                    @php
                        $gambarLoker = match($loop->iteration) {
                            1 => 'images/backend.png',
                            2 => 'images/uiux.png',
                            3 => 'images/marketing.png',
                            default => 'images/backend.png',
                        };
                    @endphp

                    <a href="{{ route('detail.loker', $loker->id) }}"
                       class="relative bg-white p-8 rounded-[32px] border border-red-100 text-center shadow-md transition-all duration-500 flex flex-col items-center justify-center min-h-[350px] group overflow-hidden hover:bg-[#2A050A] hover:border-red-500 hover:shadow-2xl no-underline hover:-translate-y-2">

                        <div class="transition-all duration-500 transform group-hover:-translate-y-12">
                            <div class="w-28 h-28 bg-[#FFF4D6] rounded-2xl p-4 shadow-sm mb-6 flex items-center justify-center mx-auto transition-transform duration-500 group-hover:scale-95">
                                <img src="{{ asset($gambarLoker) }}" alt="{{ $loker->judul_loker }}" class="max-h-full object-contain">
                            </div>

                            <h3 class="text-2xl font-black text-[#2A050A] leading-snug group-hover:text-white transition-colors duration-500">
                                {{ $loker->judul_loker }}
                            </h3>

                            <p class="text-[#7A6265] font-medium mt-2 group-hover:text-red-200 transition-colors duration-500">
                                {{ $loker->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                            </p>
                        </div>

                        <div class="absolute bottom-8 left-6 right-6 opacity-0 translate-y-8 transition-all duration-500 ease-out group-hover:opacity-100 group-hover:translate-y-0 flex flex-col items-center space-y-2 border-t border-red-900/40 pt-4">
                            <p class="text-red-300 font-black text-sm uppercase tracking-wider">
                                {{ $loker->lokasi ?? 'Bandung' }}
                            </p>

                            <p class="text-white font-bold text-base">
                                IDR {{ $loker->gaji ?? 'Estimasi Kompetitif' }}
                            </p>

                            <span class="inline-block bg-yellow-400 text-[#2A050A] px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider">
                                {{ $loker->tipe_pekerjaan ?? 'Full Time' }}
                            </span>
                        </div>
                    </a>

                @empty
                    <div class="md:col-span-3 bg-white p-12 rounded-[32px] text-center border border-dashed border-red-200">
                        <h3 class="text-2xl font-black text-[#2A050A]">Belum ada lowongan</h3>
                        <p class="text-[#7A6265] mt-2">Silakan jalankan seeder terlebih dahulu.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('loker.index') }}"
                   class="inline-block bg-red-600 text-white font-black px-16 md:px-24 py-5 rounded-2xl shadow-xl transition-all duration-300 transform hover:bg-yellow-400 hover:text-[#2A050A] hover:scale-105 uppercase tracking-wider text-sm animate-pulse-glow">
                    Lihat Semua Loker ➔
                </a>
            </div>

        </div>
    </section>

    {{-- EVENT --}}
    <section class="bg-gradient-to-b from-white via-[#3B0A12] to-[#2A050A] text-white py-24 relative overflow-hidden z-20">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

            <div class="space-y-6 motion-safe:animate-[fadeInUp_1s_ease-out]">
                <div>
                    <span class="bg-red-600 text-white px-4 py-1.5 rounded-full text-xs font-black tracking-widest uppercase">
                        Event Karier
                    </span>
                </div>

                <h2 class="text-5xl font-black leading-tight text-white">
                    Bangun kariermu lewat<br>
                    <span class="text-yellow-400">event yang tepat.</span>
                </h2>

                <p class="text-red-100/80 text-lg leading-relaxed">
                    Ikuti seminar karier, talkshow, dan event interaktif bersama perusahaan serta mentor pilihan.
                </p>

                <div class="pt-4">
                    <a href="{{ route('event.index') }}"
                       class="inline-flex items-center gap-3 bg-yellow-400 text-[#2A050A] px-8 py-4 rounded-2xl font-black hover:bg-white transition hover:no-underline hover:scale-105">
                        Lihat Event <span>➔</span>
                    </a>
                </div>
            </div>

            <div class="relative rounded-[36px] overflow-hidden bg-[#2A050A] aspect-[4/3] border border-red-900/50 flex items-center justify-center group shadow-2xl hover:-translate-y-2 transition duration-500">
                <video autoplay muted loop playsinline class="w-full h-full object-cover relative z-20 transition duration-700 group-hover:scale-105">
                    <source src="{{ asset('video/video_event.mp4') }}" type="video/mp4">
                    Browser kamu tidak mendukung pemutaran video langsung.
                </video>
                <div class="absolute inset-0 bg-gradient-to-tr from-black/50 via-transparent to-red-900/20 z-30 pointer-events-none"></div>
            </div>

        </div>
    </section>

    {{-- SERVICES --}}
    <section id="services" class="bg-[#2A050A] text-white py-24 relative z-20">
        <div class="max-w-7xl mx-auto px-6">

            <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 gap-6">
                <div class="text-center md:text-left motion-safe:animate-[fadeInUp_1s_ease-out]">
                    <p class="text-xs uppercase tracking-[4px] text-red-400 font-black mb-2">
                        Jasa Profesional
                    </p>

                    <h2 class="text-5xl font-black text-white tracking-tight overflow-hidden flex flex-wrap justify-center md:justify-start gap-x-3">
                        <span>Layanan</span>
                        <span class="text-yellow-400 inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[200ms]">terbaik</span>
                    </h2>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('service.index') }}"
                       class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition hover:scale-105">
                        Lihat Semua Jasa
                    </a>
                </div>
            </div>

            <div id="services-container" class="flex overflow-x-auto gap-8 pb-8 cursor-grab active:cursor-grabbing no-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;">
                @forelse($services as $service)
                    <div class="flex-none w-[320px] md:w-[380px] bg-[#E5A93B] text-[#2A050A] p-8 rounded-[32px] border border-yellow-700/40 group hover:border-yellow-200 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between pointer-events-none shadow-xl">

                        <div class="pointer-events-auto">
                            <div class="w-16 h-16 bg-[#FDF6D8] rounded-2xl flex items-center justify-center mb-6 overflow-hidden text-[#2A050A] text-3xl font-black">
                                @if($service->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $service->images->first()->image) }}"
                                         alt="{{ $service->service_name }}"
                                         class="w-full h-full object-cover"
                                         onerror="this.onerror=null; this.src='{{ asset($service->images->first()->image) }}';">
                                @endif
                            </div>

                            <h3 class="text-2xl font-black mb-1 group-hover:text-white transition-colors line-clamp-2">
                                {{ $service->service_name }}
                            </h3>

                            <p class="text-xs font-bold text-[#4A0E17] mb-3 tracking-wide uppercase">
                                {{ $service->freelancer_name }} • {{ $service->location }}
                            </p>

                            <div class="text-[#3B0A12] leading-relaxed text-sm line-clamp-3 mb-4">
                                {!! strip_tags($service->description) !!}
                            </div>
                        </div>

                        <div class="pt-4 border-t border-[#4A0E17]/20 flex items-center justify-between mt-auto relative z-10 pointer-events-auto">
                            <div>
                                <p class="text-xs text-[#4A0E17] font-medium">Mulai dari</p>
                                <p class="text-xl font-black text-[#2A050A]">Rp{{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>

                            <a href="{{ route('service.show', $service->id) }}"
                               class="bg-[#FDF6D8] text-[#2A050A] px-4 py-2 rounded-xl text-xs font-black tracking-wider hover:bg-white transition uppercase no-underline hover:no-underline relative z-10">
                                Detail ➔
                            </a>
                        </div>
                    </div>

                @empty
                    <div class="w-full py-12 text-center text-red-100">
                        <p class="text-lg font-medium">Belum ada jasa yang ditawarkan saat ini.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </section>

    {{-- COURSES --}}
    <section id="courses" class="bg-gradient-to-b from-[#2A050A] via-[#3B0A12] to-[#FDF6D8] text-white py-24 relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4 motion-safe:animate-[fadeInUp_1s_ease-out]">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-wider text-yellow-400">
                        Program Terpilih
                    </span>

                    <h2 class="text-3xl md:text-4xl font-bold mt-1 tracking-tight">
                        Kembangkan Skill Karirmu
                    </h2>
                </div>

                <div>
                    <a href="{{ route('course.index') }}"
                       class="inline-flex items-center text-sm font-medium text-yellow-400 hover:text-white transition-colors group">
                        Lihat Selengkapnya
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="space-y-4">
                @forelse($courses as $course)
                    <div class="reveal-item opacity-0 translate-y-10 relative overflow-hidden bg-gradient-to-r from-[#4A0E17] to-[#2A050A] border border-red-900/50 rounded-2xl p-6 md:p-8 flex flex-col lg:flex-row lg:items-center justify-between gap-6 hover:border-yellow-400/60 hover:-translate-y-2 transition-all duration-500 group shadow-lg">

                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-400 text-[#2A050A]">
                                    @if($course->price > 0)
                                        Premium
                                    @else
                                        Free
                                    @endif
                                </span>

                                <span class="text-xs text-red-100/70">
                                    ID: #{{ $course->id }}
                                </span>
                            </div>

                            <h3 class="text-xl md:text-2xl font-bold text-white tracking-tight group-hover:text-yellow-400 transition-colors">
                                {{ $course->title }}
                            </h3>

                            <p class="mt-2 text-sm text-red-100/80 line-clamp-2 max-w-3xl leading-relaxed">
                                {{ $course->description }}
                            </p>

                            <div class="mt-4 flex flex-wrap gap-x-6 gap-y-2 text-xs text-red-100/70">
                                <div class="flex items-center">
                                    <span class="font-medium text-white mr-1">Benefit:</span>
                                    <span class="truncate max-w-xs md:max-w-md">{{ $course->benefit }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row lg:flex-col items-center lg:items-end justify-between lg:justify-center gap-4 pt-4 lg:pt-0 min-w-[180px]">
                            <div class="text-left lg:text-right">
                                <p class="text-xs text-red-100/70 uppercase tracking-wider">Investasi</p>

                                <p class="text-xl font-extrabold text-yellow-400 mt-0.5">
                                    @if($course->price > 0)
                                        Rp {{ number_format($course->price, 0, ',', '.') }}
                                    @else
                                        Gratis
                                    @endif
                                </p>
                            </div>

                            <div class="w-full lg:w-auto">
                                <a href="{{ route('course.register.form', $course->id) }}"
                                   class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold rounded-xl bg-white hover:bg-yellow-400 text-[#2A050A] transition duration-200 w-full whitespace-nowrap hover:scale-105">
                                    Sign me up!
                                </a>
                            </div>
                        </div>

                    </div>

                @empty
                    <div class="text-center py-12 border border-dashed border-red-900/50 rounded-xl">
                        <p class="text-red-100/70 text-sm">Belum ada kelas yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-10 text-center md:hidden">
                <a href="{{ route('course.index') }}"
                   class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white border border-red-900 rounded-lg bg-red-950/20 hover:bg-red-950/50 transition-colors w-full">
                    Lihat Semua Kelas
                </a>
            </div>

        </div>
    </section>

</div>

@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    const slider = document.getElementById('services-container');

    if (slider) {
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });

        slider.addEventListener('mouseleave', () => {
            isDown = false;
        });

        slider.addEventListener('mouseup', () => {
            isDown = false;
        });

        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();

            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 1.5;

            slider.scrollLeft = scrollLeft - walk;
        });
    }

    const items = document.querySelectorAll('.reveal-item');

    if (items.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.15
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        items.forEach(item => {
            observer.observe(item);
        });
    }
});
</script>