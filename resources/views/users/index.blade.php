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
.smooth-card {
    transition:
        transform .55s cubic-bezier(0.22, 1, 0.36, 1),
        box-shadow .55s cubic-bezier(0.22, 1, 0.36, 1),
        border-color .45s ease,
        background .45s ease;
    will-change: transform;
}

.smooth-card:hover {
    transform: translateY(-10px);
}

.smooth-btn {
    transition:
        transform .35s cubic-bezier(0.22, 1, 0.36, 1),
        background-color .35s ease,
        color .35s ease,
        box-shadow .35s ease;
    will-change: transform;
}

.smooth-btn:hover {
    transform: translateY(-3px) scale(1.03);
}

.smooth-img {
    transition: transform .5s cubic-bezier(0.22, 1, 0.36, 1);
}

.group:hover .smooth-img {
    transform: scale(1.08);
}

.animate-fade-up {
    animation: fadeInUp .9s ease-out both;
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
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
       <section class="max-w-7xl mx-auto px-6 pt-24 pb-24 grid md:grid-cols-2 gap-16 items-start relative animate-fade-up">

    <div class="md:sticky md:top-28 self-start">

        <div class="bg-[#2A050A] rounded-[40px] p-4 shadow-2xl border border-red-900/40 overflow-hidden group animate-float-soft">
            <div class="relative bg-gradient-to-br from-red-600 via-red-700 to-[#4A0E17] text-white rounded-[32px] p-8 md:p-10 min-h-[360px] flex flex-col justify-between overflow-hidden transition-all duration-700 ease-out group-hover:scale-[1.02]">

                <div class="absolute -top-16 -right-16 w-44 h-44 bg-yellow-300/25 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-56 h-56 bg-red-950/40 rounded-full blur-3xl"></div>

                <div class="relative z-10">
                    <p class="text-xs uppercase tracking-[4px] mb-4 text-yellow-300 font-black">
                        Loker Terbaru
                    </p>

                    <h3 class="text-4xl md:text-5xl font-black mb-4 leading-tight">
                        {{ isset($lokers) && $lokers->count() > 0 ? $lokers->first()->judul_loker : 'Backend Developer' }}
                    </h3>

                    <p class="text-sm md:text-base text-red-50 font-semibold leading-relaxed">
                        @if(isset($lokers) && $lokers->count() > 0)
                            {{ $lokers->first()->perusahaan->nama_perusahaan ?? 'Perusahaan' }} •
                            {{ $lokers->first()->lokasi ?? '-' }} •
                            {{ $lokers->first()->tipe_pekerjaan ?? '-' }}
                        @else
                            PT Shopee Indonesia • Bandung • Full Time
                        @endif
                    </p>
                </div>

                <div class="relative z-10 mt-8">
                    @if(isset($lokers) && $lokers->count() > 0)
                        <a href="{{ route('detail.loker', $lokers->first()->id) }}"
                           class="smooth-btn inline-flex items-center justify-center bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-300 hover:text-[#2A050A] shadow-lg no-underline">
                            Lihat Detail
                        </a>
                    @else
                        <a href="{{ route('loker.index') }}"
                           class="smooth-btn inline-flex items-center justify-center bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-300 hover:text-[#2A050A] shadow-lg no-underline">
                            Lihat Detail
                        </a>
                    @endif
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
            <a href="{{ route('perusahaan.index') }}"
               class="smooth-btn bg-red-600 hover:bg-red-700 text-white px-6 py-4 rounded-2xl font-black shadow-xl animate-pulse-glow text-center no-underline">
                Lihat Semua Perusahaan
            </a>

            <a href="{{ route('groups.index') }}"
               class="smooth-btn bg-white text-[#2A050A] px-6 py-4 rounded-2xl font-black shadow-xl text-center border border-red-100 no-underline">
                Gabung Group
            </a>
        </div>
    </div>

    <div class="space-y-16">

        <div class="bg-white/70 backdrop-blur-sm border border-red-100 rounded-[32px] p-8 shadow-xl motion-safe:animate-[fadeInUp_1s_ease-out]">
            <p class="text-[#3B2528] text-xl md:text-2xl leading-relaxed font-semibold">
                Temukan lowongan kerja terbaik berdasarkan skill, lokasi, dan minatmu bersama
                <span class="text-red-600 font-black">Loker Seeker</span>. Kami bekerja sama dengan mitra terpercaya untuk membangun karir digital masa depanmu.
            </p>
        </div>

        <div class="border-t border-red-900/10 pt-10">
            <p class="text-xs uppercase tracking-[3px] text-red-600 font-black mb-8">
                Mitra Perusahaan Terpercaya
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <a href="{{ route('perusahaan.detail', 6) }}"
                   class="smooth-card bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline no-underline animate-fade-scale">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mb-5 shadow-lg p-3">
                        <img src="{{ asset('images/shopee.png') }}" alt="Shopee" class="smooth-img w-full h-full object-contain">
                    </div>
                    <span class="font-black text-xl tracking-wide">Shopee</span>
                </a>

                <a href="{{ route('perusahaan.detail', 3) }}"
                   class="smooth-card bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline no-underline animate-fade-scale">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mb-5 shadow-lg p-3">
                        <img src="{{ asset('images/tokopedia.png') }}" alt="Tokopedia" class="smooth-img w-full h-full object-contain">
                    </div>
                    <span class="font-black text-xl tracking-wide">Tokopedia</span>
                </a>

                <a href="{{ route('perusahaan.detail', 4) }}"
                   class="smooth-card bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline no-underline animate-fade-scale">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mb-5 shadow-lg p-3">
                        <img src="{{ asset('images/Lazada.png') }}" alt="Lazada" class="smooth-img w-full h-full object-contain">
                    </div>
                    <span class="font-black text-xl tracking-wide">Lazada</span>
                </a>

                <a href="{{ route('perusahaan.detail', 5) }}"
                   class="smooth-card bg-gradient-to-br from-[#3B0A12] to-[#2A050A] p-8 rounded-[32px] border border-red-900/40 shadow-xl hover:border-yellow-400 text-center flex flex-col items-center justify-center min-h-[200px] text-white hover:no-underline no-underline animate-fade-scale">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center mb-5 shadow-lg p-3">
                        <img src="{{ asset('images/blibli.png') }}" alt="Blibli" class="smooth-img w-full h-full object-contain">
                    </div>
                    <span class="font-black text-xl tracking-wide">Blibli</span>
                </a>

            </div>
        </div>

        <div class="bg-white rounded-[36px] p-8 md:p-10 shadow-2xl border border-red-100">
            <p class="text-xs uppercase tracking-[3px] text-red-600 font-black mb-8">
                Loker Seeker Dalam Angka
            </p>

            <div class="grid grid-cols-2 gap-5">
                <div class="smooth-card bg-[#FDF6D8] rounded-[28px] p-6">
                    <h3 class="text-5xl md:text-6xl font-black text-yellow-500 tracking-tight">120+</h3>
                    <p class="text-[#5F4B4E] font-black text-xs mt-3 uppercase tracking-wider">
                        Pelamar Mendaftar
                    </p>
                </div>

                <div class="smooth-card bg-[#FDF6D8] rounded-[28px] p-6">
                    <h3 class="text-5xl md:text-6xl font-black text-[#2A050A] tracking-tight">45</h3>
                    <p class="text-[#5F4B4E] font-black text-xs mt-3 uppercase tracking-wider">
                        Pelamar Diterima
                    </p>
                </div>

                <div class="smooth-card col-span-2 bg-[#2A050A] rounded-[28px] p-6">
                    <h3 class="text-5xl font-black text-red-500 tracking-tight">20</h3>
                    <p class="text-red-100 text-base mt-3 font-semibold">
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

                    <a href="{{ route('detail.loker', $loker->id) }}" class="relative bg-white rounded-[32px] border border-red-100 text-center shadow-lg transition-all duration-500 flex flex-col items-center justify-center min-h-[360px] p-8 group overflow-hidden hover:bg-[#2A050A] hover:border-red-500 hover:shadow-[0_20px_50px_rgba(220,38,38,0.25)] hover:-translate-y-2 no-underline">
                    <!-- Logo -->
                    <div class="w-28 h-28 bg-[#FFF4D6] rounded-3xl p-4 shadow-sm mb-6
                                flex items-center justify-center
                                transition-all duration-500
                                group-hover:scale-90">
                        <img src="{{ asset($gambarLoker) }}"
                             alt="{{ $loker->judul_loker }}"
                             class="max-h-full object-contain">
                    </div>
                    
                    <div class="transition-all duration-500 group-hover:-translate-y-4">
                        <h3 class="text-2xl font-black text-[#2A050A]
                                   group-hover:text-white transition-colors duration-500">
                            {{ $loker->judul_loker }}
                        </h3>
                    
                        <p class="mt-2 text-[#7A6265] font-medium
                                  group-hover:text-red-200 transition-colors duration-500">
                            {{ $loker->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                        </p>
                    </div>
            
                    <div class="mt-6 flex flex-col items-center gap-3  opacity-0 max-h-0 overflow-hidden  transition-all duration-500  group-hover:opacity-100  group-hover:max-h-40">
                        <p class="text-red-300 text-sm font-black uppercase tracking-wider">
                            📍 {{ $loker->lokasi ?? 'Bandung' }}
                        </p>
                        <p class="text-white font-bold text-lg">
                            💰 IDR {{ $loker->gaji ?? 'Estimasi Kompetitif' }}
                        </p>
                        <span class="bg-yellow-400 text-[#2A050A]
                                     px-4 py-2 rounded-full
                                     text-xs font-black uppercase tracking-wider">
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
    <section id="services" class="bg-[#2A050A] text-white py-24 relative z-20 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(220,38,38,0.25),transparent_35%)] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-14 gap-8">
            <div class="text-center md:text-left">
                <p class="text-xs uppercase tracking-[4px] text-red-400 font-black mb-3">
                    Jasa Profesional
                </p>

                <h2 class="text-4xl md:text-5xl font-black text-white tracking-tight leading-tight">
                    Layanan
                    <span class="text-yellow-400">terbaik</span>
                </h2>
            </div>

            <div class="flex justify-center md:justify-end">
                <a href="{{ route('service.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition-all duration-300 hover:scale-105 no-underline">
                    Lihat Semua Jasa
                </a>
            </div>
        </div>

        <div id="services-container"
             class="flex overflow-x-auto gap-7 pb-8 cursor-grab active:cursor-grabbing scroll-smooth"
             style="-ms-overflow-style: none; scrollbar-width: none;">

            @forelse($services as $service)
                <div class="flex-none w-[300px] md:w-[360px] bg-[#F6C453] text-[#2A050A]
                            p-7 rounded-[32px] border border-yellow-200/40
                            shadow-[0_18px_40px_rgba(0,0,0,0.25)]
                            transition-all duration-500
                            hover:-translate-y-2 hover:bg-[#F8D56A]
                            hover:shadow-[0_25px_60px_rgba(245,158,11,0.25)]
                            flex flex-col justify-between group">

                    <div>
                        <div class="w-20 h-20 bg-[#FFF7D6] rounded-3xl flex items-center justify-center mb-6 overflow-hidden
                                    text-[#2A050A] text-3xl font-black shadow-md transition-all duration-500 group-hover:scale-105">
                            @if($service->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $service->images->first()->image) }}"
                                     alt="{{ $service->service_name }}"
                                     class="w-full h-full object-cover"
                                     onerror="this.onerror=null; this.src='{{ asset($service->images->first()->image) }}';">
                            @else
                                <span>LS</span>
                            @endif
                        </div>

                        <h3 class="text-2xl font-black mb-2 leading-snug text-[#2A050A] line-clamp-2">
                            {{ $service->service_name }}
                        </h3>

                        <p class="text-xs font-black text-[#7A2E0E] mb-4 tracking-wide uppercase line-clamp-1">
                            {{ $service->freelancer_name }} • {{ $service->location }}
                        </p>

                        <p class="text-[#3B0A12]/90 leading-relaxed text-sm line-clamp-3 mb-6">
                            {!! strip_tags($service->description) !!}
                        </p>
                    </div>

                    <div class="pt-5 border-t border-[#2A050A]/15 flex items-center justify-between gap-4 mt-auto">
                        <div>
                            <p class="text-xs text-[#7A2E0E] font-bold mb-1">
                                Mulai dari
                            </p>

                            <p class="text-xl font-black text-[#2A050A]">
                                Rp{{ number_format($service->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <a href="{{ route('service.show', $service->id) }}"
                           class="shrink-0 bg-[#2A050A] text-white px-5 py-3 rounded-2xl text-xs font-black tracking-wider
                                  hover:bg-red-700 transition-all duration-300 uppercase no-underline hover:no-underline">
                            Detail ➔
                        </a>
                    </div>
                </div>

            @empty
                <div class="w-full py-14 text-center bg-white/5 rounded-[32px] border border-white/10">
                    <p class="text-lg font-semibold text-red-100">
                        Belum ada jasa yang ditawarkan saat ini.
                    </p>
                </div>
            @endforelse

        </div>

    </div>
</section>

    {{-- COURSES --}}
   <section id="courses" class="bg-gradient-to-b from-[#2A050A] via-[#3B0A12] to-[#FDF6D8] text-white py-24 relative z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 gap-6 motion-safe:animate-[fadeInUp_1s_ease-out]">
            <div class="text-center md:text-left">
                <span class="text-xs font-black uppercase tracking-[4px] text-yellow-400">
                    Program Terpilih
                </span>

                <h2 class="text-4xl md:text-5xl font-black mt-2 tracking-tight leading-tight">
                    Kembangkan Skill
                    <span class="text-yellow-400">Karirmu</span>
                </h2>
            </div>

            <div class="hidden md:block">
                <a href="{{ route('course.index') }}"
                   class="inline-flex items-center justify-center bg-yellow-400 hover:bg-white text-[#2A050A] px-7 py-4 rounded-2xl font-black shadow-xl transition-all duration-300 hover:scale-105 no-underline">
                    Lihat Selengkapnya
                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>

        <div class="space-y-5">
            @forelse($courses as $course)
                <div class="reveal-item opacity-0 translate-y-10 relative overflow-hidden
                            bg-gradient-to-r from-[#4A0E17] via-[#3B0A12] to-[#2A050A]
                            border border-red-800/40
                            rounded-[28px]
                            p-7 md:p-8
                            flex flex-col lg:flex-row lg:items-center justify-between gap-6
                            shadow-[0_15px_40px_rgba(0,0,0,0.25)]
                            transition-all duration-500
                            hover:-translate-y-2
                            hover:border-yellow-400/70
                            hover:shadow-[0_20px_50px_rgba(250,204,21,0.15)]
                            group">

                    <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-400/10 rounded-full blur-3xl pointer-events-none"></div>

                    <div class="flex-1 min-w-0 relative z-10">
                        <div class="flex flex-wrap items-center gap-3 mb-4">
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-yellow-400 text-[#2A050A] shadow-md">
                                @if($course->price > 0)
                                    Premium
                                @else
                                    Free
                                @endif
                            </span>

                            <span class="text-xs font-bold text-red-100/70">
                                Course #{{ $course->id }}
                            </span>
                        </div>

                        <h3 class="text-2xl font-black text-white tracking-tight leading-tight group-hover:text-yellow-400 transition-colors duration-300">
                            {{ $course->title }}
                        </h3>

                        <p class="mt-3 text-sm text-red-100/80 line-clamp-2 max-w-3xl leading-relaxed">
                            {{ $course->description }}
                        </p>

                        <div class="mt-5 inline-flex items-center bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-xs text-red-100/80 max-w-full">
                            <span class="font-black text-yellow-400 mr-2 shrink-0">Benefit:</span>
                            <span class="truncate max-w-xs md:max-w-md">
                                {{ $course->benefit }}
                            </span>
                        </div>
                    </div>

                    <div class="relative z-10 flex flex-row lg:flex-col items-center lg:items-end justify-between lg:justify-center gap-4 pt-4 lg:pt-0 min-w-[190px]">
                        <div class="text-left lg:text-right">
                            <p class="text-xs text-red-100/70 uppercase tracking-wider font-bold">
                                Investasi
                            </p>

                            <p class="text-2xl font-black text-yellow-400 mt-1">
                                @if($course->price > 0)
                                    Rp {{ number_format($course->price, 0, ',', '.') }}
                                @else
                                    Gratis
                                @endif
                            </p>
                        </div>

                        <div class="w-full lg:w-auto">
                            <a href="{{ route('course.register.form', $course->id) }}"
                               class="inline-flex items-center justify-center
                                      px-6 py-3
                                      rounded-2xl
                                      bg-white
                                      hover:bg-yellow-400
                                      text-[#2A050A]
                                      font-black
                                      text-sm
                                      transition-all duration-300
                                      hover:scale-105
                                      shadow-lg
                                      w-full whitespace-nowrap
                                      no-underline">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>

                </div>

            @empty
                <div class="text-center py-14 border border-dashed border-red-900/50 rounded-[28px] bg-white/5">
                    <p class="text-red-100/80 text-sm font-semibold">
                        Belum ada kelas yang tersedia saat ini.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-10 text-center md:hidden">
            <a href="{{ route('course.index') }}"
               class="inline-flex items-center justify-center px-6 py-4 text-sm font-black text-[#2A050A] bg-yellow-400 hover:bg-white rounded-2xl transition-all duration-300 w-full no-underline">
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