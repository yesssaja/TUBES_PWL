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
    
    html { scroll-behavior: smooth; }
    
    body { 
        font-family: 'Poppins', sans-serif; 
        /* Mengikuti gaya gradasi temanmu tapi pakai warna tema kita */
        background: linear-gradient(to bottom, #F4D03F, #ffffff, #fef2f2); 
    }

    /* Efek Glow seperti punya temanmu */
    .glow-red {
        box-shadow: 0 0 30px rgba(231, 76, 60, 0.3);
    }

    .bg-red-brand { background-color: #E74C3C; }
    .text-red-brand { color: #E74C3C; }
    
    /* Hero Section yang lebih luas */
    .hero-gradient-bg {
        background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.9), rgba(255, 255, 255, 1)), url('{{ asset("perusahaan_1.jpg") }}');
        background-size: cover;
        background-position: center;
        min-height: 400px; /* Lebih tinggi agar tidak sesak */
    }
</style>
</head>
<body>

    <header class="fixed top-0 left-0 w-full bg-red-brand text-white shadow-xl z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">
        <h1 class="text-3xl font-black tracking-tighter">
            LOKER SEEKER🔥
        </h1>
        <nav class="hidden md:flex gap-10 font-bold uppercase text-sm tracking-widest">
            <a href="#about" class="hover:text-yellow-300 transition">About</a>
            <a href="#events" class="hover:text-yellow-300 transition">Events</a>
            <a href="#course" class="hover:text-yellow-300 transition">Course</a>
            <a href="#jobs" class="hover:text-yellow-300 transition">Jobs</a>
        </nav>
    </div>
</header>

 <section class="hero-gradient-bg pt-32 pb-20 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center gap-12">
        <!-- Logo Perusahaan dengan efek Glow -->
        <div class="w-44 h-44 bg-white rounded-3xl shadow-2xl flex items-center justify-center overflow-hidden border-8 border-white glow-red transform hover:rotate-3 transition">
            <img src="{{ asset('foto_perusahaan/images.png') }}" alt="Logo" class="object-contain w-full p-4">
        </div>
        
        <div class="text-center md:text-left">
            <p class="text-red-600 font-black uppercase tracking-widest mb-2">Verified Company</p>
            <h2 class="text-5xl md:text-7xl font-black text-gray-900 leading-tight">
                SHOPEE <i class="fas fa-check-circle text-blue-500 text-3xl"></i>
            </h2>
            <p class="text-xl font-medium text-gray-700 mt-2 opacity-90 italic">Agribusiness, Food & Beverage Manufacturing</p>
            
            <div class="flex gap-4 mt-8 justify-center md:justify-start">
                <button class="bg-red-brand hover:bg-red-700 text-white px-10 py-4 rounded-full font-black shadow-2xl transform hover:scale-105 transition">
                    REVIEW
                </button>
                <button class="bg-white text-gray-800 px-10 py-4 rounded-full font-black shadow-xl hover:bg-gray-100 transition border-2 border-gray-100">
                    WEBSITE <i class="fas fa-external-link-alt ml-2"></i>
                </button>
            </div>
        </div>
    </div>
</section>

    <main class="max-w-7xl mx-auto px-6 py-20 space-y-24">

       <section id="about" class="bg-white p-12 rounded-[40px] shadow-2xl border border-orange-50 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-yellow-300 rounded-bl-full opacity-20"></div>
            <h3 class="text-4xl font-black text-red-600 mb-8 uppercase tracking-tighter">Tentang Perusahaan</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            <div class="text-lg text-gray-700 leading-loose">
                <p class="mb-6">Di Sinar Mas Agribusiness and Food, kami bertumbuh dengan tujuan. Minyak kelapa sawit menjadi awal dari perjalanan kami.</p>
                <p>Kami mengelola seluruh rantai pasokan dari hulu ke hilir dengan standar kualitas dunia.</p>
            </div>
            <div class="bg-red-50 p-8 rounded-3xl border border-red-100 shadow-inner">
                <table class="w-full text-md">
                    <tr class="border-b border-red-200"><td class="py-4 font-black text-red-600 uppercase text-xs">Website</td><td class="font-bold">www.shopee.com</td></tr>
                    <tr class="border-b border-red-200"><td class="py-4 font-black text-red-600 uppercase text-xs">Headquarters</td><td class="font-bold">Jakarta, Indonesia</td></tr>
                    <tr><td class="py-4 font-black text-red-600 uppercase text-xs">Industry</td><td class="font-bold">E-Commerce & Tech</td></tr>
                </table>
            </div>
        </div>
    </section>

        <section id="events">
        <h3 class="text-4xl font-black text-red-600 mb-12 text-center uppercase">Upcoming Events</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        
        <!-- Kartu 1: Seminar Karir -->
        <div class="group bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250" class="h-60 w-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-yellow-400 text-red-700 font-black px-4 py-1 rounded-full text-xs uppercase">
                        Workshop
                    </div>
                </div>
                <div class="p-8">
                <h4 class="font-black text-xl mb-3 group-hover:text-red-600 transition">Seminar Karir USU 2026</h4>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Tips dan trik sukses masuk ke dunia kerja agribisnis global.</p>
                <!-- Menggunakan pink estetik untuk tombol -->
              <a href="/event" class="inline-block bg-red-600 text-white font-black px-6 py-3 rounded-2xl text-sm shadow-lg hover:bg-red-700 transition">See More →</a>
            </div>
        </div>

        <!-- Kartu 2: JOB FAIR -->
        <div class="group bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="https://via.placeholder.com/400x250" class="h-60 w-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-yellow-400 text-red-700 font-black px-4 py-1 rounded-full text-xs uppercase">
                        Workshop
                    </div>
                </div>
                <div class="p-8">
                <h4 class="font-black text-xl mb-3 group-hover:text-red-600 transition">JOB FAIR</h4>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">Temukan peluang</p>
              <a href="/event" class="inline-block bg-red-600 text-white font-black px-6 py-3 rounded-2xl text-sm shadow-lg hover:bg-red-700 transition">See More →</a>
            </div>
        </div>

       
    </div>
</section>

        <section id="course" class="p-6">
            <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-400 inline-block">Professional Course</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-yellow-100 hover:scale-105 transition-transform flex p-4 gap-4 items-center">
                    <div class="w-20 h-20 bg-yellow-brand rounded-lg flex-shrink-0 flex items-center justify-center text-3xl">🎓</div>
                    <div>
                        <h4 class="font-bold text-md leading-tight">Mechanical Fundamentals</h4>
                        <p class="text-xs text-gray-500 mt-1">3 Minggu Pelatihan</p>
                        <button class="text-red-brand font-bold text-xs mt-2 hover:underline">Enroll Now</button>
                    </div>
                </div>
            </div>
        </section>
<section class="hero-gradient-bg pt-32 pb-20 px-6">
        <section id="jobs" class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-400 inline-block">Open Positions</h3>
                <span class="text-sm text-gray-500">12 Lowongan Aktif</span>
            </div>

          
            <div class="space-y-4">
                
                <!-- Job Item 1 -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                    <div>
                        <h4 class="font-bold text-lg">Maintenance Manager</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                    </div>
                   
                    <a href="{{ route('detail.loker') }}" class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</a>
                </div>

                <!-- Job Item 2 -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                    <div>
                        <h4 class="font-bold text-lg">Backend Developer (Laravel)</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Remote</p>
                    </div>
                <a href="{{ route('detail.loker') }}" class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</a>
                </div>

                <!-- Job Item 3 -->
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-500 transition">
                    <div>
                        <h4 class="font-bold text-lg">UI/UX Designer</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                    </div>
                    <a href="{{ route('detail.loker') }}" class="bg-gray-100 hover:bg-yellow-300 hover:text-white px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</a>
                </div>

            </div>
        </section>
</section>
    </main>


</body>
</html>