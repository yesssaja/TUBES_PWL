@extends('users.service.layouts.app')
@section('style')
<style>
    .hero-glow-title {
        background: linear-gradient(
            90deg,
            #1B2540 0%,
            #E71F25 35%,
            #ffffff 50%,
            #E71F25 65%,
            #1B2540 100%
        );
        background-size: 220% auto;
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: titleShine 10s linear infinite, heroFadeUp .9s ease forwards;
        text-shadow: 0 0 24px rgba(231, 31, 37, 0.22);
    }

    .hero-subtitle-animate {
        opacity: 0;
        transform: translateY(18px);
        animation: heroFadeUp .9s ease forwards;
        animation-delay: .35s;
    }

    .hero-button-animate {
        opacity: 0;
        transform: translateY(18px);
        animation: heroFadeUp .9s ease forwards;
        animation-delay: .65s;
    }

    .hero-floating-light {
        animation: floatingLight 5s ease-in-out infinite;
    }

    .hero-marquee-wrapper {
        overflow: hidden;
        white-space: nowrap;
        max-width: 520px;
        opacity: 0;
        animation: heroFadeUp .9s ease forwards;
        animation-delay: .5s;
    }

    .hero-marquee-text {
        display: inline-block;
        padding-left: 100%;
        animation: marqueeText 16s linear infinite;
    }

    @keyframes titleShine {
        0% {
            background-position: 220% center;
        }
        100% {
            background-position: -220% center;
        }
    }

    @keyframes heroFadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes floatingLight {
        0%, 100% {
            transform: translateY(0) scale(1);
            opacity: .22;
        }
        50% {
            transform: translateY(-18px) scale(1.08);
            opacity: .38;
        }
    }

    @keyframes marqueeText {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-100%);
        }
    }

        /* ANIMASI MASUK SECTION */
    .reveal-up {
        opacity: 0;
        transform: translateY(26px);
        animation: revealUp .9s ease forwards;
    }

    .reveal-delay-1 {
        animation-delay: .15s;
    }

    .reveal-delay-2 {
        animation-delay: .3s;
    }

    .reveal-delay-3 {
        animation-delay: .45s;
    }

    .reveal-delay-4 {
        animation-delay: .6s;
    }

    /* CARD ANIMASI */
    .fancy-card {
        position: relative;
        overflow: hidden;
        transition: all .35s ease;
    }

    .fancy-card::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(
            120deg,
            transparent 0%,
            rgba(255,255,255,.55) 45%,
            transparent 70%
        );
        transform: translateX(-120%);
        transition: .7s ease;
    }

    .fancy-card:hover::before {
        transform: translateX(120%);
    }

    .fancy-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(231, 31, 37, .14);
    }

    /* ICON NAIK TURUN HALUS */
    .float-icon {
        animation: floatIcon 4s ease-in-out infinite;
    }

    /* TITLE SECTION ADA GARIS CAHAYA */
    .section-title-glow {
        position: relative;
        display: inline-block;
    }

    .section-title-glow::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 70px;
        height: 4px;
        border-radius: 999px;
        background: linear-gradient(90deg, #E71F25, #ffb3b6, #E71F25);
        background-size: 200% auto;
        animation: lineGlow 3s linear infinite;
    }

    /* TOMBOL HIDUP */
    .pulse-button {
        animation: pulseButton 2.8s ease-in-out infinite;
    }

    @keyframes revealUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes floatIcon {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-7px);
        }
    }

    @keyframes lineGlow {
        0% {
            background-position: 0 center;
        }
        100% {
            background-position: 200% center;
        }
    }

    @keyframes pulseButton {
        0%, 100% {
            box-shadow: 0 10px 28px rgba(231,31,37,.22);
        }
        50% {
            box-shadow: 0 16px 38px rgba(231,31,37,.38);
        }
    }
</style>
@endsection

@section('content')
    <!-- CONTAINER -->
    <div class="max-w-7xl mx-auto px-4 lg:px-6 py-8">
        <!-- HEADER -->
        <section class="relative overflow-hidden rounded-[34px] p-8 lg:p-12 mb-10 shadow-soft bg-cover bg-center min-h-[420px] flex items-center"
                 style="background-image: url('{{ asset('images/banner-service.png') }}');">

            <!-- DECOR -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-700 opacity-20 rounded-full blur-3xl"></div>

            <div class="grid lg:grid-cols-2 gap-10 items-center relative z-10">

                <!-- LEFT -->
                <div class="relative">

                    <!-- LIGHT EFFECT -->
                    <div class="hero-floating-light absolute -top-16 -left-10 w-52 h-52 bg-red-300/40 rounded-full blur-3xl"></div>
                    <div class="hero-floating-light absolute top-20 left-40 w-40 h-40 bg-white/30 rounded-full blur-3xl"></div>

                    <p class="hero-subtitle-animate text-primary font-bold text-sm uppercase tracking-[0.35em] mb-4">
                        Looker Seeker Service
                    </p>

                    <h1 class="hero-glow-title text-4xl lg:text-6xl font-extrabold leading-tight mb-5 max-w-2xl relative z-10">
                        Temukan jasa terbaik
                        <br>
                        untuk kebutuhanmu
                    </h1>

                    <div class="hero-marquee-wrapper mb-8 relative z-10">
                        <p class="hero-marquee-text text-slate-600 text-base leading-relaxed">
                            Cari freelancer profesional untuk berbagai kebutuhan acara • proyek • bisnis • dokumentasi • desain • editing • event •
                        </p>
                    </div>

                    <a href="{{ url('/') }}"
                        class="hero-button-animate inline-flex items-center justify-center gap-2 bg-primary text-white px-6 py-4 rounded-2xl shadow-md hover:bg-red-700 hover:-translate-y-1 transition duration-300 text-sm font-bold relative z-10">

                        ← Kembali ke Dashboard

                    </a>

                </div>

            </div>

        </section>

        <!-- KATEGORI -->
        <section class="mb-12">

            <div class="flex justify-between items-center mb-6">

            <h2 class="section-title-glow reveal-up text-2xl font-extrabold">
                Kategori Populer
            </h2>


            </div>

            <!-- GRID -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">

                <!-- CARD -->
                <div class="fancy-card reveal-up reveal-delay-1 bg-white rounded-2xl p-5 shadow-soft border border-slate-100 transition">

                    <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-green-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 7h4l2-2h6l2 2h4v12H3V7z" />

                            <circle cx="12"
                                cy="13"
                                r="3" />

                        </svg>

                    </div>

                    <h3 class="font-bold text-sm mb-1">
                        Fotografi
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Fotografi'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="fancy-card reveal-up reveal-delay-2 bg-white rounded-2xl p-5 shadow-soft border border-slate-100 transition">

                    <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center mb-4">
                      
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-purple-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 4l8 4-8 4-8-4 8-4zm0 8l8 4-8 4-8-4 8-4z" />

                        </svg>

                    </div>

                    <h3 class="font-bold text-sm mb-1">
                        Desain Grafis
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Desain Grafis'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="fancy-card reveal-up reveal-delay-3 bg-white rounded-2xl p-5 shadow-soft border border-slate-100 transition">

                    <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-red-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />

                        </svg>

                    </div>

                    <h3 class="font-bold text-sm mb-1">
                        Video Editing
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Video Editing'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="fancy-card reveal-up reveal-delay-4 bg-white rounded-2xl p-5 shadow-soft border border-slate-100 transition">

                    <div class="w-12 h-12 rounded-2xl bg-yellow-100 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-yellow-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 18V5l12-2v13" />

                        </svg>

                    </div>

                    <h3 class="font-bold text-sm mb-1">
                        Musik & Audio
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Musik & Audio'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="fancy-card reveal-up reveal-delay-5 bg-white rounded-2xl p-5 shadow-soft border border-slate-100 transition">

                    <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center mb-4">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-pink-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v3a3 3 0 01-3 3z" />

                        </svg>

                    </div>

                    <h3 class="font-bold text-sm mb-1">
                        MC & Event
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['MC & Event'] ?? 0 }} Jasa
                    </p>

                </div>

                
                <button type="button"
                    id="openCategoryModal"
                    class="block text-left">

                    <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 flex flex-col justify-center hover:-translate-y-1 transition cursor-pointer">

                        <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center mb-4">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 text-blue-600"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2.2">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 5v14M5 12h14" />

                            </svg>

                        </div>

                        <h3 class="font-bold text-sm mb-1">
                            Lihat Semua
                        </h3>

                        <p class="text-xs text-slate-400">
                            Kategori
                        </p>

                    </div>

                </button>

            </div>

        </section>

        <!-- REKOMENDASI -->
        <section class="mb-14">

            <div class="flex justify-between items-center mb-6">

                <h2 class="section-title-glow reveal-up text-2xl font-extrabold">
                    Rekomendasi Untukmu
                </h2>
                    <a href="/service/all"
                        class="pulse-button inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-2xl shadow-md hover:bg-red-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-sm font-bold">

                        Lihat Semua

                        <span class="text-base">
                            →
                        </span>

                    </a>

            </div>

            <!-- GRID -->
            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

            @if($services->count() > 0)

                @foreach($services as $service)

                    <div class="fancy-card reveal-up reveal-delay-2 bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 transition h-full flex flex-col">

                        @php
                            $firstImage = $service->images->first();
                        @endphp

                        @if($firstImage)
                           <img src="{{ $firstImage->image_url }}"
                           alt="{{ $service->service_name }}"
                                class="h-52 w-full object-cover flex-shrink-0">
                        @else
                            <div class="h-52 w-full bg-red-100 flex items-center justify-center text-primary font-bold flex-shrink-0">
                                Tidak Ada Gambar
                            </div>
                        @endif

                        <div class="p-5 flex flex-col flex-1">

                            <h3 class="font-bold text-lg mb-1 leading-snug min-h-[28px] line-clamp-1">
                                {{ $service->freelancer_name }}
                            </h3>

                            <p class="text-sm text-slate-500 mb-3 leading-relaxed min-h-[44px] line-clamp-2">
                                {{ $service->service_name }}
                            </p>

                            <!-- KATEGORI -->
                            <div class="flex flex-wrap gap-2 mb-4 min-h-[28px]">
                                <span class="px-3 py-1 bg-red-100 text-primary text-xs font-semibold rounded-full">
                                    {{ $service->category }}
                                </span>
                            </div>

                            <div class="flex items-center gap-2 text-sm text-slate-500 mb-4 min-h-[24px]">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-primary flex-shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>

                                <span class="line-clamp-1">
                                    {{ $service->location }}
                                </span>

                            </div>

                            <div class="mt-auto pt-2">

                                <p class="text-xs text-slate-400">
                                    Mulai dari
                                </p>

                                <h4 class="text-2xl font-extrabold mb-5">
                                    Rp{{ number_format($service->price, 0, ',', '.') }}
                                </h4>

                                <a href="{{ route('service.show', $service->id) }}"
                                    class="block w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition text-center">

                                    Lihat Detail

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            @else

                <div class="md:col-span-2 xl:col-span-3 bg-white rounded-[28px] p-8 shadow-soft border border-slate-100 text-center">
                    <h3 class="text-xl font-extrabold mb-2">
                        Belum Ada Jasa
                    </h3>

                    <p class="text-sm text-slate-500">
                        Jadilah yang pertama menawarkan jasa profesionalmu di Looker Seeker.
                    </p>
                </div>

            @endif

                <!-- CTA -->
                <div class="rounded-[32px] bg-gradient-to-br from-[#FFF1F2] to-[#FFE4E6] p-7 shadow-card border border-red-100 flex flex-col justify-between relative overflow-hidden h-full min-h-[500px]">

                    <!-- DECOR -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-red-200 opacity-20 rounded-full"></div>

                    <div class="relative z-10">

                    <div class="w-16 h-16 rounded-2xl bg-primary text-white flex items-center justify-center mb-6 shadow-lg">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-9 h-9"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round">

                            <!-- SPARK -->
                            <path d="M12 3L13.8 8.2L19 10L13.8 11.8L12 17L10.2 11.8L5 10L10.2 8.2L12 3Z"/>

                            <!-- MINI SPARK -->
                            <path d="M19 3L19.7 5.3L22 6L19.7 6.7L19 9L18.3 6.7L16 6L18.3 5.3L19 3Z"/>

                            <!-- MINI SPARK -->
                            <path d="M5 15L5.7 17.3L8 18L5.7 18.7L5 21L4.3 18.7L2 18L4.3 17.3L5 15Z"/>

                        </svg>

                    </div>

                        <h3 class="text-2xl font-extrabold leading-snug mb-4">

                            Punya skill
                            untuk ditawarkan?

                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-8">

                            Tawarkan jasamu sekarang dan temukan klien
                            yang membutuhkan kemampuanmu.

                        </p>

                    </div>

                    <a href="/service/form"
                             class="relative z-10 mt-auto bg-primary hover:bg-red-700 transition text-white text-center py-4 rounded-full font-bold text-sm shadow-lg">
                        Tawarkan Jasa

                    </a>

                </div>

            </div>

        </section>

        <!-- TRUST BAR -->
        <section class="mb-16">

            <div class="grid md:grid-cols-3 gap-6">

                <!-- CARD 1 -->
                <div class="bg-white rounded-[32px] p-7 border border-red-100 shadow-soft hover:-translate-y-1 hover:shadow-xl transition-all duration-300 relative overflow-hidden">

                    <!-- DECOR -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-red-100 opacity-40 rounded-full"></div>

                    <!-- ICON -->
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-red-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 11c1.657 0 3-1.343 3-3V7a3 3 0 10-6 0v1c0 1.657 1.343 3 3 3z" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 11h14v8H5z" />

                        </svg>

                    </div>

                    <div class="relative z-10">

                        <h3 class="font-bold text-xl mb-3 text-slate-800">

                            Aman & Terpercaya

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Profil jasa ditampilkan secara jelas agar pengguna lebih nyaman memilih layanan yang sesuai kebutuhan.

                        </p>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="bg-white rounded-[32px] p-7 border border-purple-100 shadow-soft hover:-translate-y-1 hover:shadow-xl transition-all duration-300 relative overflow-hidden">

                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-100 opacity-40 rounded-full"></div>

                    <!-- ICON -->
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-purple-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 20h5V4H2v16h5" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M9 20h6" />

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 16v4" />

                        </svg>

                    </div>

                    <div class="relative z-10">

                        <h3 class="font-bold text-xl mb-3 text-slate-800">

                            Freelancer Profesional

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Semua freelancer telah diverifikasi untuk menjaga kualitas layanan dan profesionalitas kerja.

                        </p>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="bg-white rounded-[32px] p-7 border border-blue-100 shadow-soft hover:-translate-y-1 hover:shadow-xl transition-all duration-300 relative overflow-hidden">

                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-100 opacity-40 rounded-full"></div>

                    <!-- ICON -->
                    <div class="relative z-10 w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center mb-6">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-7 h-7 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13 3L4 14h7v7l9-11h-7V3z" />

                        </svg>

                    </div>

                    <div class="relative z-10">

                        <h3 class="font-bold text-xl mb-3 text-slate-800">

                            Cepat & Praktis

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Temukan jasa sesuai kebutuhanmu dengan proses yang cepat, mudah, dan efisien.

                        </p>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <!-- MODAL SEMUA KATEGORI -->
    <div id="categoryModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50 px-4">

        <div class="bg-soft w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-[32px] p-6 lg:p-8 shadow-card relative">

            <!-- CLOSE -->
            <button type="button"
                id="closeCategoryModal"
                class="absolute top-5 right-5 w-10 h-10 rounded-full bg-red-100 text-primary font-bold hover:bg-primary hover:text-white transition">
                ✕
            </button>

            <!-- HEADER -->
            <div class="mb-8 pr-12">

                <h2 class="text-3xl font-extrabold mb-3">
                    Semua <span class="text-primary">Kategori</span>
                </h2>

                <p class="text-sm text-slate-500 leading-relaxed">
                    Cari kategori jasa yang sesuai dengan kebutuhanmu.
                </p>

            </div>

            <!-- SEARCH -->
            <div class="mb-8">

                <div class="relative">

                    <input type="text"
                        id="categorySearch"
                        placeholder="Cari kategori, contoh: fotografi, desain, musik..."
                        class="w-full px-5 py-4 pl-12 rounded-2xl border border-red-100 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-red-200">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.1-5.4a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" />

                    </svg>

                </div>

            </div>

            <!-- LIST KATEGORI -->
            <div id="categoryList"
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="fotografi foto photographer kamera event wisuda">

                    <h3 class="font-bold text-sm mb-1">
                        Fotografi
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Fotografi'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="desain design logo branding grafis poster">

                    <h3 class="font-bold text-sm mb-1">
                        Desain
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Desain Grafis'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="video editing editor konten reels tiktok">

                    <h3 class="font-bold text-sm mb-1">
                        Video Editing
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Video Editing'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="musik audio sound recording mixing mastering">

                    <h3 class="font-bold text-sm mb-1">
                        Musik & Audio
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Musik & Audio'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="mc event host acara moderator">

                    <h3 class="font-bold text-sm mb-1">
                        MC & Event
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['MC & Event'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="penulis artikel copywriting content writer">

                    <h3 class="font-bold text-sm mb-1">
                        Penulisan
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Penulisan'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="programming website web developer coding laravel">

                    <h3 class="font-bold text-sm mb-1">
                        Website & Programming
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Website & Programming'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="translator translate penerjemah bahasa inggris">

                    <h3 class="font-bold text-sm mb-1">
                        Penerjemah
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Penerjemah'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="makeup mua rias wajah kecantikan">

                    <h3 class="font-bold text-sm mb-1">
                        Makeup Artist
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Makeup Artist'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="les privat tutor mengajar pendidikan belajar">

                    <h3 class="font-bold text-sm mb-1">
                        Les Privat
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Les Privat'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="admin data entry input data excel">

                    <h3 class="font-bold text-sm mb-1">
                        Admin & Data Entry
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Admin & Data Entry'] ?? 0 }} Jasa
                    </p>

                </div>

                <div class="category-item bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition"
                    data-category="social media instagram tiktok konten admin sosmed">

                    <h3 class="font-bold text-sm mb-1">
                        Social Media
                    </h3>

                    <p class="text-xs text-slate-400">
                        {{ $categoryCounts['Social Media'] ?? 0 }} Jasa
                    </p>

                </div>

            </div>

            <!-- EMPTY STATE -->
            <div id="emptyCategory"
                class="hidden text-center py-12">

                <div class="w-20 h-20 mx-auto mb-5 rounded-full bg-red-100 flex items-center justify-center text-primary text-3xl">
                    ?
                </div>

                <h3 class="text-xl font-extrabold mb-2">
                    Kategori tidak ditemukan
                </h3>

                <p class="text-sm text-slate-500">
                    Coba gunakan kata kunci lain.
                </p>

            </div>

        </div>

    </div> 

    @if(session('success'))
    <div id="successModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 p-5">

        <div class="bg-white rounded-[36px] p-8 max-w-md w-full text-center shadow-2xl">

            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-green-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 text-green-600"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h2 class="text-3xl font-extrabold mb-3 text-dark">
                Jasa Berhasil Dipublikasikan
            </h2>

            <p class="text-slate-500 text-sm leading-relaxed mb-8">
                Jasa yang Anda tawarkan berhasil disimpan dan sekarang dapat dilihat oleh pengguna lain.
            </p>

            <button type="button"
                onclick="document.getElementById('successModal').remove()"
                class="inline-flex items-center justify-center w-full bg-primary hover:bg-red-700 text-white py-4 rounded-full font-bold text-sm shadow-lg transition duration-300">

                Oke, Mengerti
            </button>

        </div>

    </div>
    @endif

@endsection

@section('script')
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        // MODAL KATEGORI
        const openCategoryModal = document.getElementById('openCategoryModal');
        const closeCategoryModal = document.getElementById('closeCategoryModal');
        const categoryModal = document.getElementById('categoryModal');
        const categorySearch = document.getElementById('categorySearch');
        const categoryItems = document.querySelectorAll('.category-item');
        const emptyCategory = document.getElementById('emptyCategory');

        // BUKA MODAL
        openCategoryModal.addEventListener('click', function () {
            categoryModal.classList.remove('hidden');
            categoryModal.classList.add('flex');
            categorySearch.value = '';
            filterCategory('');
            categorySearch.focus();
        });

        // TUTUP MODAL
        closeCategoryModal.addEventListener('click', function () {
            categoryModal.classList.add('hidden');
            categoryModal.classList.remove('flex');
        });

        // TUTUP MODAL SAAT KLIK AREA LUAR
        categoryModal.addEventListener('click', function (e) {
            if (e.target === categoryModal) {
                categoryModal.classList.add('hidden');
                categoryModal.classList.remove('flex');
            }
        });

        // SEARCH KATEGORI
        categorySearch.addEventListener('input', function () {
            filterCategory(this.value);
        });

        // FILTER KATEGORI
        function filterCategory(keyword) {
            const searchValue = keyword.toLowerCase().trim();
            let totalVisible = 0;

            categoryItems.forEach(function (item) {
                const categoryText = item.dataset.category.toLowerCase();
                const titleText = item.querySelector('h3').innerText.toLowerCase();

                if (categoryText.includes(searchValue) || titleText.includes(searchValue)) {
                    item.classList.remove('hidden');
                    totalVisible++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (totalVisible === 0) {
                emptyCategory.classList.remove('hidden');
            } else {
                emptyCategory.classList.add('hidden');
            }
        }

    });
    </script>
@endsection



