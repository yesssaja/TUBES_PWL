@extends('users.layouts.app')

@section('title', 'Loker Seeker Event')

@section('content')

<style>
    .hero-glitter {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
        z-index: 1;
    }

    .hero-glitter::before,
    .hero-glitter::after {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background-image:
            radial-gradient(circle, rgba(255, 215, 0, .65) 1px, transparent 1px),
            radial-gradient(circle, rgba(255, 255, 255, .75) 1px, transparent 1px),
            radial-gradient(circle, rgba(255, 230, 120, .45) 2px, transparent 2px);
        background-size: 120px 120px, 180px 180px, 260px 260px;
        animation: glitterMove 24s linear infinite;
        opacity: .35;
    }

    .hero-glitter::after {
        animation-duration: 35s;
        opacity: .2;
    }

    @keyframes glitterMove {
        from {
            transform: translate(0, 0);
        }

        to {
            transform: translate(-150px, -150px);
        }
    }

    .glow-yellow {
        position: absolute;
        width: 520px;
        height: 520px;
        border-radius: 999px;
        background: rgba(255, 217, 0, .18);
        filter: blur(120px);
        animation: floatGlow 10s ease-in-out infinite;
    }

    .glow-red {
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 999px;
        background: rgba(255, 0, 0, .10);
        filter: blur(120px);
        animation: floatGlow2 12s ease-in-out infinite;
    }

    @keyframes floatGlow {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-28px);
        }
    }

    @keyframes floatGlow2 {
        0%, 100% {
            transform: translateX(0);
        }

        50% {
            transform: translateX(38px);
        }
    }

    .sparkle {
        position: absolute;
        width: 5px;
        height: 5px;
        border-radius: 999px;
        background: #FFD700;
        box-shadow:
            0 0 10px #FFD700,
            0 0 20px #FFD700,
            0 0 35px #FFD700;
        animation: twinkle 3s ease-in-out infinite;
        z-index: 2;
        pointer-events: none;
    }

    @keyframes twinkle {
        0%, 100% {
            opacity: .2;
            transform: scale(.7);
        }

        50% {
            opacity: 1;
            transform: scale(2);
        }
    }

    .hero-image {
        animation: floatImage 6s ease-in-out infinite;
    }

    @keyframes floatImage {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    .hero-btn {
        transition: all .35s ease;
    }

    .hero-btn:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px rgba(220, 38, 38, .25);
    }
</style>

<section id="home" class="relative overflow-hidden bg-gradient-to-br from-[#FFF7E8] via-white to-red-50 px-6 pt-28 pb-20">

    <div class="glow-yellow top-0 right-0"></div>
    <div class="glow-red bottom-0 left-0"></div>

    <div class="hero-glitter"></div>

    <span class="sparkle top-24 left-[15%]"></span>
    <span class="sparkle top-40 left-[30%]" style="animation-delay:1s"></span>
    <span class="sparkle top-20 right-[20%]" style="animation-delay:2s"></span>
    <span class="sparkle top-60 right-[35%]" style="animation-delay:1.5s"></span>
    <span class="sparkle top-96 left-[55%]" style="animation-delay:.5s"></span>
    <span class="sparkle top-80 right-[10%]" style="animation-delay:2.5s"></span>

    <div class="relative z-10 max-w-7xl mx-auto grid lg:grid-cols-2 gap-14 items-center">

        <div>
            <p class="inline-flex items-center gap-2 bg-red-100 text-red-600 px-5 py-2 rounded-full font-black uppercase tracking-widest mb-5 text-xs shadow-sm">
                🎪 Event Terbesar Tahun Ini
            </p>

            <h2 class="text-5xl md:text-7xl font-black leading-tight mb-6 text-[#1E1114]">
                Seminar
                <span class="text-red-600">Karir</span>
                & Job Fair
            </h2>

            <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-9 max-w-xl font-medium">
                Dapatkan pengalaman event penuh peluang, insight karir, workshop, networking, dan kesempatan bertemu langsung dengan perusahaan impianmu.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#schedule"
                   class="hero-btn inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-xl no-underline">
                    See the Event
                </a>

                <a href="#about"
                   class="hero-btn inline-flex items-center justify-center bg-white hover:bg-red-50 text-red-600 px-8 py-4 rounded-2xl font-black shadow-lg border border-red-100 no-underline">
                    Tentang Event
                </a>
            </div>
        </div>

        <div class="relative hero-image">

            <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-300 rounded-full blur-2xl opacity-60"></div>

            <div class="relative bg-white p-4 rounded-[36px] shadow-2xl">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop"
                     class="rounded-[28px] w-full h-[360px] md:h-[460px] object-cover"
                     alt="Event">

                <div class="absolute -bottom-7 left-8 bg-yellow-400 px-7 py-5 rounded-3xl shadow-xl border-4 border-white">
                    <h3 class="font-black text-3xl text-[#2A050A]">100Rb</h3>
                    <p class="font-black text-sm text-[#2A050A]/70 uppercase tracking-wide">
                        Pengunjung
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<section id="about" class="py-24 px-6 bg-white">
    <div class="max-w-6xl mx-auto text-center">

        <p class="text-red-600 font-black uppercase tracking-[4px] mb-3 text-xs">
            Tentang Event
        </p>

        <h2 class="text-4xl md:text-5xl font-black text-[#1E1114] mb-6">
            Pengalaman Karir yang Lebih Seru
        </h2>

        <p class="max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed">
            Event ini menghadirkan berbagai aktivitas menarik mulai dari stan perusahaan, konsultasi karir, workshop, seminar, hingga area wawancara on-the-spot.
        </p>

        <div class="grid md:grid-cols-3 gap-8 mt-16">

            <div class="bg-[#FFF7E8] p-8 rounded-[32px] shadow-lg border border-red-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-white rounded-3xl flex items-center justify-center text-5xl mb-6 shadow">
                    🏢
                </div>

                <h3 class="text-2xl font-black mb-3 text-[#1E1114]">
                    Stan Perusahaan
                </h3>

                <p class="text-gray-600 leading-relaxed">
                    Perusahaan membuka stan untuk mengumpulkan CV dan memberikan informasi lowongan secara langsung.
                </p>
            </div>

            <div class="bg-[#FFF7E8] p-8 rounded-[32px] shadow-lg border border-yellow-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-white rounded-3xl flex items-center justify-center text-5xl mb-6 shadow">
                    📜
                </div>

                <h3 class="text-2xl font-black mb-3 text-[#1E1114]">
                    Seminar
                </h3>

                <p class="text-gray-600 leading-relaxed">
                    Banyak workshop dan seminar untuk meningkatkan soft skill, CV, dan persiapan interview peserta.
                </p>
            </div>

            <div class="bg-[#FFF7E8] p-8 rounded-[32px] shadow-lg border border-orange-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">
                <div class="w-20 h-20 mx-auto bg-white rounded-3xl flex items-center justify-center text-5xl mb-6 shadow">
                    🤝
                </div>

                <h3 class="text-2xl font-black mb-3 text-[#1E1114]">
                    Wawancara
                </h3>

                <p class="text-gray-600 leading-relaxed">
                    Perusahaan dapat melakukan wawancara singkat secara langsung untuk kandidat yang sesuai.
                </p>
            </div>

        </div>
    </div>
</section>

<section id="schedule" class="relative overflow-hidden py-24 px-6 bg-gradient-to-br from-red-600 via-red-700 to-[#2A050A] text-white">

    <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-400/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto">

        <div class="text-center mb-14">
            <p class="text-yellow-300 font-black uppercase tracking-[4px] mb-3 text-xs">
                Event Schedule
            </p>

            <h2 class="text-4xl md:text-5xl font-black">
                Jadwal Event
            </h2>
        </div>

        <div class="space-y-6">

            @forelse($events as $event)

                <div class="bg-white/10 backdrop-blur-md border border-white/15 p-6 md:p-7 rounded-[32px] shadow-xl hover:bg-white/15 hover:-translate-y-1 transition-all duration-300">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        <div class="min-w-0">

                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span class="bg-yellow-400 text-[#2A050A] px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wide">
                                    Event
                                </span>

                                <span class="text-red-100 text-sm font-semibold">
                                    {{ $event->tanggal_event ?? $event->tanggal ?? '-' }}
                                </span>
                            </div>

                            <h3 class="text-2xl md:text-3xl font-black leading-tight break-words">
                                {{ $event->nama_event ?? 'Event Tanpa Nama' }}
                            </h3>

                            <p class="text-yellow-200 mt-3 font-semibold">
                                📍 {{ $event->lokasi ?? 'Lokasi belum tersedia' }}
                            </p>

                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center gap-3 shrink-0">

                            <span class="inline-flex items-center justify-center font-black text-lg bg-white/10 border border-white/10 px-5 py-3 rounded-2xl">
                                🕘 {{ $event->jam ? substr($event->jam, 0, 5) : ($event->waktu_mulai ? substr($event->waktu_mulai, 0, 5) : '-') }}
                            </span>

                            <a href="{{ route('event.show', $event->id) }}"
                               class="inline-flex items-center justify-center bg-white hover:bg-yellow-300 text-red-700 font-black px-6 py-3 rounded-2xl transition-all duration-300 hover:scale-105 shadow-lg no-underline">
                                Detail
                            </a>

                            <a href="{{ route('rsvp.create', $event->id) }}"
                               class="inline-flex items-center justify-center bg-yellow-400 hover:bg-yellow-300 text-red-700 font-black px-6 py-3 rounded-2xl transition-all duration-300 hover:scale-105 shadow-lg no-underline">
                                RSVP
                            </a>

                        </div>

                    </div>
                </div>

            @empty

                <div class="bg-white/10 backdrop-blur-md border border-white/15 p-10 rounded-[32px] text-center">
                    <div class="text-5xl mb-4">📅</div>

                    <h3 class="text-2xl font-black">
                        Belum ada event
                    </h3>

                    <p class="text-yellow-100 mt-2">
                        Data event belum tersedia.
                    </p>
                </div>

            @endforelse

        </div>
    </div>
</section>

@endsection