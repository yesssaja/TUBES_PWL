@extends('users.layouts.app')

@section('title', 'Home - Loker Seeker')

@section('content')

<style>
/* Animasi Fade In Up bawaan sebelumnya */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Animasi Baru: Timbul naik satu-satu secara smooth */
@keyframes textReveal {
    0% {
        opacity: 0;
        transform: translateY(110%);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Utilitas tambahan untuk delay animasi di Tailwind */
.delay-\[200ms\] {
    animation-delay: 200ms;
}
.delay-\[400ms\] {
    animation-delay: 400ms;
}
</style>

<!-- BUNGKUSAN UTAMA WELCOME PAGE -->
<div class="bg-#FDF6D8 text-white min-h-screen font-sans">

    <!-- 1. HEADER UTAMA (FULL WIDTH - TIDAK BERGABUNG KE BAWAH) -->
    <header class="max-w-7xl mx-auto px-6 pt-20 pb-12 text-center md:text-left">
        <p class="text-red-500 font-black tracking-[6px] uppercase mb-4">
            Platform Lowongan Kerja
        </p>
        <h2 class="text-6xl md:text-7xl font-black text-white leading-tight">
            Cari <span class="text-red-500">Pekerjaan</span><br>
            Impianmu
        </h2>
    </header>

    <!-- 2. SPLIT STICKY SCROLL SECTION -->
    <section class="max-w-7xl mx-auto px-6 pb-24 grid md:grid-cols-2 gap-16 items-start relative">
        
        <!-- ================= SISI KIRI (STICKY / DIAM SAAT DI-SCROLL) ================= -->
        <div class="md:sticky md:top-28 self-start">
            <!-- Card Loker Terbaru (Sejajar dengan teks deskripsi di kanan) -->
            <div class="bg-black rounded-[36px] p-4 shadow-2xl border border-gray-800 overflow-hidden group">
                <div class="bg-red-600 text-white rounded-[28px] p-8 aspect-[16/10] flex flex-col justify-between transition-all duration-500 group-hover:scale-[1.02]">
                    <div>
                        <p class="text-xs uppercase tracking-[4px] mb-2 text-yellow-400 font-black">
                            Loker Terbaru 🔥
                        </p>
                        <h3 class="text-4xl font-black mb-3">
                            {{ isset($lokers) && $lokers->count() > 0 ? $lokers->first()->judul_loker : 'Backend Developer' }}
                        </h3>
                        <p class="text-base opacity-90 font-medium">
                            @if(isset($lokers) && $lokers->count() > 0)
                                {{ $lokers->first()->perusahaan->nama_perusahaan ?? 'Perusahaan' }} •
                                {{ $lokers->first()->lokasi ?? '-' }} •
                                {{ $lokers->first()->tipe_pekerjaan ?? '-' }}
                            @else
                                PT Shopee Indonesia • Bandung • Full Time
                            @endif
                        </p>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        @if(isset($lokers) && $lokers->count() > 0)
                            <a href="{{ route('detail.loker', $lokers->first()->id) }}"
                               class="inline-block bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-400 hover:text-slate-900 transition-colors shadow-lg">
                                Lihat Detail
                            </a>
                        @else
                            <a href="{{ route('loker.index') }}"
                               class="inline-block bg-white text-red-600 px-8 py-4 rounded-2xl font-black hover:bg-yellow-400 hover:text-slate-900 transition-colors shadow-lg">
                                Lihat Detail
                            </a>
                        @endif
                        <span class="text-xs tracking-widest text-white/50 uppercase font-black">Showreel 25/26 ▶</span>
                    </div>
                </div>
            </div>

            <!-- Tombol Navigasi Cepat di Bawah Card Sticky -->
            <div class="flex gap-4 mt-6">
                <a href="#loker" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-2xl font-black shadow-xl transition">
                    Cari Loker
                </a>
                <a href="{{ route('groups.index') }}" class="bg-white text-slate-900 px-8 py-4 rounded-2xl font-black shadow-xl hover:scale-105 transition">
                    Gabung Group
                </a>
            </div>
        </div>

        <!-- ================= SISI KANAN (KONTEN YANG BERGESER KEBATAH / SCROLL) ================= -->
        <div class="space-y-24">
            
            <!-- Teks Deskripsi (Sejajar dengan Card Kiri) -->
            <div class="pt-2">
                <p class="text-gray-300 text-xl md:text-2xl leading-relaxed max-w-xl font-medium">
                    Temukan lowongan kerja terbaik berdasarkan skill, lokasi, dan minatmu bersama <span class="text-red-500 font-black">Loker Seeker</span>. Kami bekerja sama dengan mitra terpercaya untuk membangun karir digital masa depanmu.
                </p>
            </div>

            <!-- CARD MITRA INTERACTIVE (DIUBAH JADI BESAR-BESAR) -->
            <div class="border-t border-gray-800 pt-10">
                <p class="text-xs uppercase tracking-[3px] text-yellow-400 font-black mb-8">
                    DESIGNING PRODUCTS BACKED BY TOP-TIER INVESTORS
                </p>
                
                <!-- Menggunakan grid 1 kolom di mobile dan 2 kolom besar di desktop -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Card Shopee Besar -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 shadow-xl hover:border-red-500 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px]">
                        <img src="{{ asset('images/shopee.png') }}" alt="Shopee" class="w-16 h-16 object-contain mb-4">
                        <span class="font-black text-xl tracking-wide">Shopee</span>
                    </div>

                    <!-- Card Tokopedia Besar -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 shadow-xl hover:border-red-500 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px]">
                        <img src="{{ asset('images/tokopedia.png') }}" alt="Tokopedia" class="w-16 h-16 object-contain mb-4">
                        <span class="font-black text-xl tracking-wide">Tokopedia</span>
                    </div>

                    <!-- Card Lazada Besar -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 shadow-xl hover:border-red-500 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px]">
                        <img src="{{ asset('images/lazada.png') }}" alt="Lazada" class="w-16 h-16 object-contain mb-4">
                        <span class="font-black text-xl tracking-wide">Lazada</span>
                    </div>

                    <!-- Card Blibli Besar -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 shadow-xl hover:border-red-500 transition duration-300 text-center flex flex-col items-center justify-center min-h-[200px]">
                        <img src="{{ asset('images/blibli.png') }}" alt="Blibli" class="w-16 h-16 object-contain mb-4">
                        <span class="font-black text-xl tracking-wide">Blibli</span>
                    </div>
                </div>
            </div>

            <!-- LOKER SEEKER IN NUMBERS -->
            <div class="border-t border-gray-800 pt-10">
                <p class="text-xs uppercase tracking-[3px] text-red-500 font-black mb-8">
                    LOKER SEEKER STUDIO IN NUMBERS
                </p>
                <div class="grid grid-cols-2 gap-8 text-left">
                    <div>
                        <h3 class="text-6xl font-black text-yellow-400 tracking-tight">120+</h3>
                        <p class="text-gray-400 font-bold text-sm mt-2 uppercase tracking-wider">Pelamar Mendaftar</p>
                    </div>
                    <div>
                        <h3 class="text-6xl font-black text-white tracking-tight">45</h3>
                        <p class="text-gray-400 font-bold text-sm mt-2 uppercase tracking-wider">Pelamar Diterima</p>
                    </div>
                    <div class="col-span-2 pt-6 border-t border-gray-800/50 mt-4">
                        <h3 class="text-5xl font-black text-red-500 tracking-tight">20</h3>
                        <p class="text-gray-400 text-base mt-2 font-medium">Pelamar Ditolak, tetap semangat mencari peluang baru!</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- (Sisa kodingan Kategori, Client Wins, dan Event ditaruh di bawah sini...) -->
</div>


<section id="loker" class="bg-gradient-to-b from-#FDF6D8 via-yellow-100 to-white text-slate-900 py-24 shadow-2xl relative z-20">
   <div class="text-center md:text-left mb-16 transform transition-all duration-1000 ease-out opacity-100 translate-y-0 motion-safe:animate-[fadeInUp_1s_ease-out]">
    <p class="text-xs uppercase tracking-[4px] text-red-600 font-black mb-2">
        PRODUCT DESIGN AND DEVELOPMENT ADVANTAGE
    </p>
    <h2 class="text-5xl font-black text-slate-900 tracking-tight overflow-hidden flex flex-wrap justify-center md:justify-start gap-x-3">
        <span>Our featured</span>
        <span class="text-red-600 inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[200ms]">client</span>
        <span class="text-red-600 inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[400ms]">wins</span>
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
                   class="relative bg-gray-50 p-8 rounded-[32px] border border-gray-100 text-center shadow-md transition-all duration-500 flex flex-col items-center justify-center min-h-[350px] group overflow-hidden hover:bg-slate-900 hover:border-red-500 hover:shadow-2xl">
                    
                    <div class="transition-all duration-500 transform group-hover:-translate-y-12">
                        <div class="w-28 h-28 bg-white rounded-2xl p-4 shadow-sm mb-6 flex items-center justify-center mx-auto transition-transform duration-500 group-hover:scale-95">
                            <img src="{{ asset($gambarLoker) }}" alt="{{ $loker->judul_loker }}" class="max-h-full object-contain">
                        </div>

                        <h3 class="text-2xl font-black text-slate-900 leading-snug group-hover:text-white transition-colors duration-500">
                            {{ $loker->judul_loker }}
                        </h3>
                        <p class="text-gray-500 font-medium mt-2 group-hover:text-yellow-400 transition-colors duration-500">
                            {{ $loker->perusahaan->nama_perusahaan ?? 'Perusahaan' }}
                        </p>
                    </div>

                    <div class="absolute bottom-8 left-6 right-6 opacity-0 translate-y-8 transition-all duration-500 ease-out group-hover:opacity-100 group-hover:translate-y-0 flex flex-col items-center space-y-2 border-t border-gray-800 pt-4">
                        <p class="text-red-500 font-black text-sm uppercase tracking-wider">
                            📍 {{ $loker->lokasi ?? 'Bandung' }}
                        </p>
                        <p class="text-white font-bold text-base">
                            💰 IDR {{ $loker->gaji ?? 'Estimasi Kompetitif' }}
                        </p>
                        <span class="inline-block bg-yellow-400 text-slate-900 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider">
                            ⚡ {{ $loker->tipe_pekerjaan ?? 'Full Time' }}
                        </span>
                    </div>

                </a>
            @empty
                <div class="md:col-span-3 bg-gray-50 p-12 rounded-[32px] text-center border border-dashed border-gray-300">
                    <h3 class="text-2xl font-black text-slate-900">Belum ada lowongan</h3>
                    <p class="text-gray-500 mt-2">Silakan jalankan seeder terlebih dahulu.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16 text-center">
            <a href="{{ route('loker.index') }}" 
               class="inline-block bg-red-600 text-white font-black px-24 py-5 rounded-2xl shadow-xl transition-all duration-300 transform hover:bg-yellow-400 hover:text-slate-900 hover:scale-105 hover:shadow-red-600/20 uppercase tracking-wider text-sm">
                Lihat Semua Loker ➔
            </a>
        </div>

    </div>
</section>
  </section>


 <!-- KATEGORI SECTION (PEMBATAS ELEGAN SEBELUM LIST UTAMA) -->
    <section class="max-w-7xl mx-auto px-6 py-16 border-t border-gray-800">
        <p class="text-xs uppercase tracking-[3px] text-center text-gray-500 font-black mb-8">
            Eksplorasi Berdasarkan Kategori
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#loker" class="bg-slate-800 hover:bg-red-600 text-white p-6 rounded-2xl text-center font-bold transition duration-300">💻 Programmer</a>
            <a href="#loker" class="bg-slate-800 hover:bg-red-600 text-white p-6 rounded-2xl text-center font-bold transition duration-300">🎨 UI/UX</a>
            <a href="#loker" class="bg-slate-800 hover:bg-red-600 text-white p-6 rounded-2xl text-center font-bold transition duration-300">📈 Marketing</a>
            <a href="#loker" class="bg-slate-800 hover:bg-red-600 text-white p-6 rounded-2xl text-center font-bold transition duration-300">🎥 Content Creator</a>
        </div>
    </section>

    <!-- SECTION 3: UPCOMING EVENTS (GAYA LAYOUT VIDEO ORANG DI PHENOMENON) -->
    <section class="bg-black text-white py-24 rounded-t-[50px] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-6">
                <span class="bg-red-600 text-white px-4 py-1.5 rounded-full text-xs font-black tracking-widest uppercase">
                    PRODUCE NEXT-GEN EVENTS
                </span>
                <h2 class="text-5xl font-black leading-tight">
                    Launching careers is hard.<br>
                    Finding the <span class="text-yellow-400">right events</span> shouldn't be.
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed">
                    Kami juga mempersiapkan ruang kelas virtual, seminar karir, dan talkshow interaktif bareng Tech-Lead top Indonesia khusus buat member Group Loker Seeker.
                </p>
                <div class="pt-4">
                    <a href="{{ route('groups.index') }}" class="inline-flex items-center gap-3 bg-yellow-400 text-slate-900 px-8 py-4 rounded-2xl font-black hover:bg-white transition-colors">
                        EXTEND MY KNOWLEDGE <span>➔</span>
                    </a>
                </div>
            </div>

            <!-- AREA VIDEO EVENT (Tempat naruh video orang/event nanti) -->
           <div class="relative rounded-[36px] overflow-hidden bg-slate-900 aspect-[4/3] border border-gray-800 flex items-center justify-center group shadow-2xl">
    
    <video autoplay muted loop playsinline class="w-full h-full object-cover relative z-20">
        <source src="{{ asset('video/video_event.mp4') }}" type="video/mp4">
        Browser kamu tidak mendukung pemutaran video langsung.
    </video>

    <div class="absolute inset-0 bg-gradient-to-tr from-black/40 via-transparent to-black/20 z-30 pointer-events-none"></div>
    
</div>

        </div>
    </section>
<!-- SECTION 3: SERVICES WITH HORIZONTAL SCROLL AND NAV BUTTONS -->
<section id="services" class="bg-slate-950 text-white py-24 relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- BAGIAN ATAS: JUDUL DAN TOMBOL NAVIGASI (PANAH) -->
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-12 gap-6">
            
            <!-- JUDUL SECTION -->
            <div class="text-center md:text-left transform transition-all duration-1000 ease-out opacity-100 translate-y-0 motion-safe:animate-[fadeInUp_1s_ease-out]">
                <p class="text-xs uppercase tracking-[4px] text-red-500 font-black mb-2">
                    WHAT WE DO BEST FOR YOU
                </p>
                <h2 class="text-5xl font-black text-white tracking-tight overflow-hidden flex flex-wrap justify-center md:justify-start gap-x-3">
                    <span>Our professional</span>
                    <span class="text-[#FDF6D8] inline-block animate-[textReveal_0.8s_cubic-bezier(0.77,0,0.175,1)_1_both] delay-[200ms]">services</span>
                </h2>
            </div>

            <!-- TOMBOL PANAH KIRI & KANAN -->
            <div class="flex justify-center gap-4">
                <!-- Panah Kiri -->
                <button onclick="document.getElementById('services-container').scrollBy({ left: -350, behavior: 'smooth' })" 
                        class="w-14 h-14 rounded-full border-2 border-gray-800 flex items-center justify-center font-black text-xl text-white transition-all duration-300 hover:bg-[#FDF6D8] hover:text-slate-900 hover:border-[#FDF6D8] active:scale-95 shadow-md">
                    ←
                </button>
                <!-- Panah Kanan -->
                <button onclick="document.getElementById('services-container').scrollBy({ left: 350, behavior: 'smooth' })" 
                        class="w-14 h-14 rounded-full bg-red-600 flex items-center justify-center font-black text-xl text-white transition-all duration-300 hover:bg-yellow-400 hover:text-slate-900 active:scale-95 shadow-lg shadow-red-600/10">
                    →
                </button>
            </div>

        </div>

        <!-- CONTAINER CARD - BISA DI-SCROLL KE SAMPING (Diberi id="services-container") -->
        <div id="services-container" class="flex overflow-x-auto gap-8 pb-8 snap-x snap-mandatory scroll-smooth no-scrollbar" style="-ms-overflow-style: none; scrollbar-width: none;">
            
            <!-- CARD 1: Career Consultation -->
            <div class="flex-none w-[320px] md:w-[380px] bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 snap-start group hover:border-red-500 transition-all duration-300">
                <div class="w-16 h-16 bg-[#FDF6D8] rounded-2xl flex items-center justify-center mb-6 text-slate-900 text-3xl font-black">
                    💼
                </div>
                <h3 class="text-2xl font-black mb-3 group-hover:text-[#FDF6D8] transition-colors">Konsultasi Karir</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Bimbingan 1-on-1 bersama pakar HRD untuk memetakan jalur karir digital yang paling tepat sesuai potensi dan minat bakatmu.
                </p>
            </div>

            <!-- CARD 2: Resume Review -->
            <div class="flex-none w-[320px] md:w-[380px] bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 snap-start group hover:border-red-500 transition-all duration-300">
                <div class="w-16 h-16 bg-[#FDF6D8] rounded-2xl flex items-center justify-center mb-6 text-slate-900 text-3xl font-black">
                    📄
                </div>
                <h3 class="text-2xl font-black mb-3 group-hover:text-[#FDF6D8] transition-colors">Review CV & Resume</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Bedah CV & Portofolio secara mendalam agar lolos sistem ATS (Applicant Tracking System) perusahaan top-tier internasional.
                </p>
            </div>

            <!-- CARD 3: Mock Interview -->
            <div class="flex-none w-[320px] md:w-[380px] bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 snap-start group hover:border-red-500 transition-all duration-300">
                <div class="w-16 h-16 bg-[#FDF6D8] rounded-2xl flex items-center justify-center mb-6 text-slate-900 text-3xl font-black">
                    🤝
                </div>
                <h3 class="text-2xl font-black mb-3 group-hover:text-[#FDF6D8] transition-colors">Simulasi Interview</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Latihan wawancara kerja menggunakan real-case scenario dalam bahasa Indonesia & Inggris lengkap dengan feedback instan.
                </p>
            </div>

            <!-- CARD 4: Digital Skills Bootcamp -->
            <div class="flex-none w-[320px] md:w-[380px] bg-gradient-to-br from-slate-900 to-slate-800 p-8 rounded-[32px] border border-gray-800 snap-start group hover:border-red-500 transition-all duration-300">
                <div class="w-16 h-16 bg-[#FDF6D8] rounded-2xl flex items-center justify-center mb-6 text-slate-900 text-3xl font-black">
                    🚀
                </div>
                <h3 class="text-2xl font-black mb-3 group-hover:text-[#FDF6D8] transition-colors">Bootcamp Skill Digital</h3>
                <p class="text-gray-400 leading-relaxed text-sm">
                    Pelatihan intensif bidang Frontend, Backend, dan UI/UX Designer yang dibimbing langsung oleh mentor berpengalaman dari industri.
                </p>
            </div>

        </div>

        <!-- TOMBOL LIHAT SEMUA SERVICES (Dibuat lebar proporsional ke samping) -->
        <div class="mt-12 text-center">
            <a href="#" 
               class="inline-block bg-red-600 text-white font-black px-24 py-5 rounded-2xl shadow-xl transition-all duration-300 transform hover:bg-[#FDF6D8] hover:text-slate-900 hover:scale-105 hover:shadow-red-600/20 uppercase tracking-wider text-sm">
                Lihat Semua Services ➔
            </a>
        </div>

    </div>
</section>
</div>



@endsection