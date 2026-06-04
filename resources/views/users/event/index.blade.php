@extends('users.event.layouts.app')

@section('title', 'Loker Seeker Event')

@section('content')

<section id="home" class="min-h-screen flex items-center justify-center px-6 pt-24">
    <div class="max-w-7xl grid md:grid-cols-2 gap-12 items-center">

        <div>
            <p class="text-red-600 font-bold uppercase tracking-widest mb-3">
                Event Terbesar Tahun Ini
            </p>

            <h2 class="text-5xl md:text-7xl font-black leading-tight mb-6">
                Seminar <span class="text-red-600">Karir</span> & Job Fair
            </h2>

            <p class="text-lg text-gray-700 leading-relaxed mb-8">
                Dapatkan pengalaman event penuh pengalaman, tantangan,
                tips & trick, dan hal menarik untuk pengembangan karirmu.
            </p>

            <a href="#schedule"
               class="bg-red-600 hover:bg-red-700 transition text-white px-8 py-4 rounded-full font-bold shadow-xl">
                See the Event
            </a>
        </div>

        <div class="relative">
            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=1200&auto=format&fit=crop"
                 class="rounded-3xl shadow-2xl glow"
                 alt="Event">

            <div class="absolute -bottom-6 -left-6 bg-yellow-300 px-6 py-4 rounded-2xl shadow-xl">
                <h3 class="font-black text-2xl">
                    {{ isset($events) ? $events->count() : 0 }}+
                </h3>

                <p class="font-semibold">
                    Event Tersedia
                </p>
            </div>
        </div>

    </div>
</section>

<section id="about" class="py-24 px-6">
    <div class="max-w-6xl mx-auto text-center">

        <h2 class="text-5xl font-black text-red-600 mb-6">
            Tentang Event
        </h2>

        <p class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
            Event ini menghadirkan berbagai aktivitas menarik mulai dari
            stan perusahaan, konsultasi, workshop & seminar karir,
            hingga area wawancara on-the-spot.
        </p>

        <div class="grid md:grid-cols-3 gap-8 mt-16">

            <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
                <div class="text-5xl mb-4">🏢</div>

                <h3 class="text-2xl font-bold mb-3">
                    Stan Perusahaan
                </h3>

                <p class="text-gray-600">
                    Perusahaan membuka stan untuk mengumpulkan CV dan memberikan informasi lowongan.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
                <div class="text-5xl mb-4">📜</div>

                <h3 class="text-2xl font-bold mb-3">
                    Seminar
                </h3>

                <p class="text-gray-600">
                    Banyak workshop dan seminar untuk meningkatkan soft skill peserta.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl hover:-translate-y-2 transition">
                <div class="text-5xl mb-4">🤝</div>

                <h3 class="text-2xl font-bold mb-3">
                    Wawancara
                </h3>

                <p class="text-gray-600">
                    Perusahaan dapat melakukan wawancara singkat secara langsung.
                </p>
            </div>

        </div>
    </div>
</section>

<section id="schedule" class="py-24 px-6 bg-red-600 text-white">
    <div class="max-w-5xl mx-auto">

        <h2 class="text-5xl font-black text-center mb-16">
            Jadwal Event
        </h2>

        <div class="space-y-6">

            @forelse($events as $event)

                @php
                    $judulEvent = $event->nama_event
                        ?? $event->judul
                        ?? 'Event';

                    $deskripsiEvent = $event->deskripsi
                        ?? 'Tidak ada deskripsi event.';

                    $lokasiEvent = $event->lokasi
                        ?? '-';

                    $tanggalEvent = $event->tanggal_event
                        ?? $event->tanggal
                        ?? '-';

                    $waktuMulai = $event->waktu_mulai
                        ?? $event->waktu
                        ?? $event->jam
                        ?? null;

                    $waktuSelesai = $event->waktu_selesai
                        ?? null;

                    $kuotaEvent = $event->kuota
                        ?? '-';

                    $namaPerusahaan = $event->perusahaan->nama_perusahaan
                        ?? 'Perusahaan';

                    $statusEvent = $event->status
                        ?? 'aktif';
                @endphp

                <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl shadow-xl hover:scale-[1.02] transition duration-300">

                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">

                        <div class="flex-1">

                            <div class="flex flex-wrap gap-3 mb-4">

                                <span class="bg-yellow-400 text-red-700 font-black px-4 py-2 rounded-full text-sm">
                                    {{ strtoupper($statusEvent) }}
                                </span>

                                <span class="bg-white/10 text-yellow-100 font-bold px-4 py-2 rounded-full text-sm">
                                    {{ $kuotaEvent }} Peserta
                                </span>

                            </div>

                            <h3 class="text-2xl md:text-3xl font-black">
                                {{ $judulEvent }}
                            </h3>

                            <p class="text-yellow-100 mt-3 leading-relaxed">
                                {{ $deskripsiEvent }}
                            </p>

                            <div class="grid sm:grid-cols-2 gap-3 mt-5 text-yellow-100">

                                <p>
                                    🏢 {{ $namaPerusahaan }}
                                </p>

                                <p>
                                    📍 {{ $lokasiEvent }}
                                </p>

                                <p>
                                    📅 {{ $tanggalEvent }}
                                </p>

                                <p>
                                    🕒
                                    @if($waktuMulai && $waktuSelesai)
                                        {{ substr($waktuMulai, 0, 5) }} - {{ substr($waktuSelesai, 0, 5) }} WIB
                                    @elseif($waktuMulai)
                                        {{ substr($waktuMulai, 0, 5) }} WIB
                                    @else
                                        -
                                    @endif
                                </p>

                            </div>

                        </div>

                        <div class="flex flex-col gap-3 md:w-40">

                            <a href="{{ route('rsvp.create', $event->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-300 text-red-700 font-black px-6 py-3 rounded-full text-center transition duration-300 hover:scale-105 shadow-lg">
                                RSVP
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl text-center">
                    <h3 class="text-2xl font-bold">
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

<footer class="bg-gray-900 text-white py-10 text-center">
    <h2 class="text-3xl font-black mb-3">
        LOKER SEEKER🔥
    </h2>

    <p class="text-gray-400">
        © 2026 Event Festival. All Rights Reserved.
    </p>
</footer>

@endsection