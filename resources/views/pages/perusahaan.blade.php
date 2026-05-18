<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile | LOKER SEEKER</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap');

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2);
        }

        .glow-red {
            box-shadow: 0 0 30px rgba(231, 76, 60, 0.3);
        }

        .bg-red-brand {
            background-color: #E74C3C;
        }

        .text-red-brand {
            color: #E74C3C;
        }

        .hero-gradient-bg {
            background-image:
                linear-gradient(to bottom, rgba(244, 208, 63, 0.92), rgba(255, 255, 255, 1)),
                url('{{ asset("perusahaan_1.jpg") }}');
            background-size: cover;
            background-position: center;
            min-height: 420px;
        }
    </style>
</head>

@php
    $namaPerusahaan = $perusahaan->nama_perusahaan
        ?? $perusahaan->nama
        ?? $perusahaan->name
        ?? 'Nama Perusahaan';

    $industri = $perusahaan->industri
        ?? $perusahaan->industry
        ?? $perusahaan->bidang
        ?? 'Industri belum diisi';

    $deskripsi = $perusahaan->deskripsi
        ?? $perusahaan->description
        ?? 'Deskripsi perusahaan belum tersedia.';

    $alamat = $perusahaan->alamat
        ?? $perusahaan->lokasi
        ?? $perusahaan->headquarters
        ?? '-';

    $website = $perusahaan->website
        ?? $perusahaan->situs
        ?? null;

    $email = $perusahaan->email ?? '-';

    $logo = $perusahaan->logo
        ?? $perusahaan->foto
        ?? $perusahaan->foto_perusahaan
        ?? null;

    if ($logo) {
        if (str_starts_with($logo, 'http://') || str_starts_with($logo, 'https://')) {
            $logoUrl = $logo;
        } elseif (str_contains($logo, '/')) {
            $logoUrl = asset($logo);
        } else {
            $logoUrl = asset('foto_perusahaan/' . $logo);
        }
    } else {
        $logoUrl = asset('foto_perusahaan/images.png');
    }
@endphp

<body>

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 w-full bg-red-brand text-white shadow-xl z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

            <h1 class="text-3xl font-black tracking-tighter">
                LOKER SEEKER🔥
            </h1>

            <nav class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
                <a href="#about" class="hover:text-yellow-300 transition">About</a>
                <a href="#events" class="hover:text-yellow-300 transition">Events</a>
                <a href="#review" class="hover:text-yellow-300 transition">Review</a>
                <a href="#jobs" class="hover:text-yellow-300 transition">Jobs</a>
            </nav>

        </div>
    </header>

    <!-- HERO -->
    <section class="hero-gradient-bg pt-32 pb-20 px-6">

        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12">

            <div class="w-44 h-44 bg-white rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden border-8 border-white glow-red transform hover:rotate-3 transition">
                <img src="{{ $logoUrl }}"
                     alt="Logo Perusahaan"
                     class="object-contain w-full p-4">
            </div>

            <div class="text-center md:text-left">

                <p class="text-red-600 font-black uppercase tracking-widest mb-2">
                    Verified Company
                </p>

                <h2 class="text-5xl md:text-7xl font-black text-gray-900 leading-tight">
                    {{ $namaPerusahaan }}
                    <i class="fas fa-check-circle text-blue-500 text-3xl"></i>
                </h2>

                <p class="text-xl font-medium text-gray-700 mt-3 opacity-90 italic">
                    {{ $industri }}
                </p>

                <div class="flex flex-wrap gap-4 mt-8 justify-center md:justify-start">

                    <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
   class="bg-red-brand hover:bg-red-700 text-white px-10 py-4 rounded-full font-black shadow-2xl transform hover:scale-105 transition">
    Lihat Review
</a>

<a href="{{ route('tulis.review', $perusahaan->id) }}"
   class="bg-white text-red-600 px-10 py-4 rounded-full font-black shadow-xl hover:bg-gray-100 transition border-2 border-red-100">
    Tulis Review
</a>

                    @if($website)
                        <a href="{{ str_starts_with($website, 'http') ? $website : 'https://' . $website }}"
                           target="_blank"
                           class="bg-white text-gray-800 px-10 py-4 rounded-full font-black shadow-xl hover:bg-gray-100 transition border-2 border-gray-100">
                            Website <i class="fas fa-external-link-alt ml-2"></i>
                        </a>
                    @endif

                </div>

            </div>

        </div>

    </section>

    <main class="max-w-7xl mx-auto px-6 py-20 space-y-24">

        <!-- ABOUT -->
        <section id="about" class="bg-white p-12 rounded-[40px] shadow-2xl border border-orange-50 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-300 rounded-bl-full opacity-20"></div>

            <h3 class="text-4xl font-black text-red-600 mb-8 uppercase tracking-tighter">
                Tentang Perusahaan
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">

                <div class="text-lg text-gray-700 leading-loose">
                    <p>
                        {{ $deskripsi }}
                    </p>
                </div>

                <div class="bg-red-50 p-8 rounded-3xl border border-red-100 shadow-inner">
                    <table class="w-full text-md">

                        <tr class="border-b border-red-200">
                            <td class="py-4 font-black text-red-600 uppercase text-xs">
                                Website
                            </td>
                            <td class="font-bold">
                                {{ $website ?? '-' }}
                            </td>
                        </tr>

                        <tr class="border-b border-red-200">
                            <td class="py-4 font-black text-red-600 uppercase text-xs">
                                Email
                            </td>
                            <td class="font-bold">
                                {{ $email }}
                            </td>
                        </tr>

                        <tr class="border-b border-red-200">
                            <td class="py-4 font-black text-red-600 uppercase text-xs">
                                Alamat
                            </td>
                            <td class="font-bold">
                                {{ $alamat }}
                            </td>
                        </tr>

                        <tr>
                            <td class="py-4 font-black text-red-600 uppercase text-xs">
                                Industry
                            </td>
                            <td class="font-bold">
                                {{ $industri }}
                            </td>
                        </tr>

                    </table>
                </div>

            </div>

        </section>

        <!-- STATISTIK -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div class="bg-white p-8 rounded-3xl shadow-xl border-l-8 border-red-500">
                <h4 class="text-gray-500 font-bold uppercase text-sm">
                    Total Lowongan
                </h4>
                <p class="text-4xl font-black text-red-600 mt-3">
                    {{ $lokers->count() }}
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl border-l-8 border-yellow-400">
                <h4 class="text-gray-500 font-bold uppercase text-sm">
                    Total Event
                </h4>
                <p class="text-4xl font-black text-yellow-500 mt-3">
                    {{ $events->count() }}
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl border-l-8 border-orange-500">
                <h4 class="text-gray-500 font-bold uppercase text-sm">
                    Status
                </h4>
                <p class="text-3xl font-black text-orange-500 mt-3">
                    Verified
                </p>
            </div>

        </section>

        <!-- EVENTS -->
        <section id="events">

            <h3 class="text-4xl font-black text-red-600 mb-12 text-center uppercase">
                Upcoming Events
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                @forelse($events as $event)

                    <div class="group bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">

                        <div class="relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=800&auto=format&fit=crop"
                                 class="h-60 w-full object-cover group-hover:scale-110 transition duration-500">

                            <div class="absolute top-4 left-4 bg-yellow-400 text-red-700 font-black px-4 py-1 rounded-full text-xs uppercase">
                                Event
                            </div>
                        </div>

                        <div class="p-8">

                            <h4 class="font-black text-xl mb-3 group-hover:text-red-600 transition">
                                {{ $event->nama_event }}
                            </h4>

                            <p class="text-gray-500 text-sm leading-relaxed mb-3">
                                {{ $event->lokasi }}
                            </p>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                {{ $event->tanggal_event ?? '-' }}
                                @if(!empty($event->jam))
                                    • {{ substr($event->jam, 0, 5) }}
                                @endif
                            </p>

                            <a href="{{ route('event.index') }}"
                               class="inline-block bg-red-600 text-white font-black px-6 py-3 rounded-2xl text-sm shadow-lg hover:bg-red-700 transition">
                                See More →
                            </a>

                        </div>

                    </div>

                @empty

                    <div class="md:col-span-3 bg-white rounded-3xl p-10 text-center shadow-xl">
                        <h4 class="text-2xl font-black text-gray-800">
                            Belum ada event dari perusahaan ini.
                        </h4>
                    </div>

                @endforelse

            </div>

        </section>

        <!-- REVIEW CTA -->
        <section id="review" class="bg-gradient-to-r from-red-600 to-yellow-400 rounded-[40px] p-12 shadow-2xl text-white">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <div>
                    <h3 class="text-4xl font-black mb-4">
                        Review Perusahaan
                    </h3>

                    <p class="text-white/90 leading-relaxed">
                        Lihat pengalaman pengguna lain tentang perusahaan ini, atau tuliskan review kamu agar membantu pencari kerja lainnya.
                    </p>
                </div>

                <div class="flex flex-wrap gap-4 justify-start md:justify-end">

                    <a href="{{ route('perusahaan.review', $perusahaan->id) }}"
   class="bg-red-brand hover:bg-red-700 text-white px-10 py-4 rounded-full font-black shadow-2xl transform hover:scale-105 transition">
    Lihat Review
</a>

<a href="{{ route('tulis.review', $perusahaan->id) }}"
   class="bg-white text-red-600 px-10 py-4 rounded-full font-black shadow-xl hover:bg-gray-100 transition border-2 border-red-100">
    Tulis Review
</a>

                </div>

            </div>

        </section>

        <!-- JOBS -->
        <section id="jobs" class="p-6">

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-400 inline-block">
                    Open Positions
                </h3>

                <span class="text-sm text-gray-500">
                    {{ $lokers->count() }} Lowongan Aktif
                </span>
            </div>

            <div class="space-y-4">

                @forelse($lokers as $loker)

                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">

                        <div>
                            <h4 class="font-bold text-lg">
                                {{ $loker->judul_loker ?? $loker->judul ?? $loker->posisi ?? 'Judul Loker' }}
                            </h4>

                            <p class="text-sm text-gray-500">
                                {{ $loker->lokasi ?? '-' }}
                                •
                                {{ $loker->tipe_pekerjaan ?? $loker->tipe_kerja ?? 'Full-time' }}
                            </p>
                        </div>

                        <a href="{{ route('detail.loker', $loker->id) }}"
                           class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">
                            Detail
                        </a>

                    </div>

                @empty

                    <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                        <h4 class="font-bold text-lg text-gray-800">
                            Belum ada lowongan dari perusahaan ini.
                        </h4>
                    </div>

                @endforelse

            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white py-10 text-center">
        <h2 class="text-3xl font-black mb-3">
            LOKER SEEKER🔥
        </h2>

        <p class="text-gray-400">
            © 2026 Loker Seeker. All Rights Reserved.
        </p>
    </footer>

</body>
</html>