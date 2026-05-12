<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Service - Looker Seeker</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script>

        tailwind.config = {

            theme: {

                extend: {

                    fontFamily: {

                        poppins: ['Poppins', 'sans-serif'],

                    },

                    colors: {

                        primary: '#E71F25',
                        dark: '#1B2540',
                        cream: '#F7F1C8',
                        soft: '#FFFDF3',

                    },

                    boxShadow: {

                        soft: '0 6px 18px rgba(0,0,0,0.08)',
                        card: '0 15px 40px rgba(0,0,0,0.08)',

                    }

                }

            }

        }

    </script>

</head>

<body class="bg-[#F7F1C8] font-poppins text-dark">

    <!-- CONTAINER -->
    <div class="max-w-7xl mx-auto px-4 lg:px-6 py-8">

        <!-- HEADER -->
        <section class="relative overflow-hidden rounded-[34px] p-8 lg:p-12 mb-10 shadow-soft bg-cover bg-center min-h-[420px] flex items-center"
                 style="background-image: url('{{ asset('images/banner-service.png') }}');">

            <!-- DECOR -->
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-700 opacity-20 rounded-full blur-3xl"></div>

            <div class="grid lg:grid-cols-2 gap-10 items-center relative z-10">

                <!-- LEFT -->
                <div>

                    <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-5 max-w-xl">

                        Temukan jasa terbaik
                        untuk kebutuhanmu

                    </h1>

                    <p class="text-slate-500 text-base leading-relaxed mb-8 max-w-lg">

                        Cari freelancer profesional untuk berbagai kebutuhan acara,
                        proyek, atau pekerjaan sekali pakai.

                    </p>

                </div>

            </div>

        </section>

        <!-- KATEGORI -->
        <section class="mb-12">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-extrabold">
                    Kategori Populer
                </h2>


            </div>

            <!-- GRID -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">

                <!-- CARD -->
                <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition">

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
                        124 Jasa
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition">

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
                        Desain
                    </h3>

                    <p class="text-xs text-slate-400">
                        210 Jasa
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition">

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
                        98 Jasa
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition">

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
                        67 Jasa
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 hover:-translate-y-1 transition">

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
                        55 Jasa
                    </p>

                </div>

                
                <a href="#"
                    class="block">           
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
                        

                </a>

            </div>

        </section>

        <!-- REKOMENDASI -->
        <section class="mb-14">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-extrabold">

                    Rekomendasi Untukmu

                </h2>
                <a href="#"
                class="inline-flex items-center gap-2 bg-primary text-white px-5 py-3 rounded-2xl shadow-md hover:bg-red-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 text-sm font-bold">

                    Lihat Semua

                    <span class="text-base">
                        →
                    </span>

                </a>

            </div>

            <!-- GRID -->
            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

                <!-- CARD 1 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 hover:-translate-y-1 transition">

                    <img
                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop"
                        class="h-52 w-full object-cover">

                    <div class="p-5">

                        <h3 class="font-bold text-lg mb-1">
                            Rizky Febrian
                        </h3>

                        <p class="text-sm text-slate-500 mb-2">
                            Fotografer Event & Wisuda
                        </p>

                        <p class="text-xs text-slate-400 mb-5">
                            📍 Bandung
                        </p>

                        <p class="text-xs text-slate-400">
                            Mulai dari
                        </p>

                        <h4 class="text-2xl font-extrabold mb-5">
                            Rp350.000
                        </h4>

                        <button
                            class="w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition">

                            Lihat Detail

                        </button>

                    </div>

                </div>

                <!-- CARD 2 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 hover:-translate-y-1 transition">

                    <img
                        src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=1200&auto=format&fit=crop"
                        class="h-52 w-full object-cover">

                    <div class="p-5">

                        <h3 class="font-bold text-lg mb-1">
                            Nadya Putri
                        </h3>

                        <p class="text-sm text-slate-500 mb-2">
                            Desain Logo & Branding
                        </p>

                        <p class="text-xs text-slate-400 mb-5">
                            📍 Yogyakarta
                        </p>

                        <p class="text-xs text-slate-400">
                            Mulai dari
                        </p>

                        <h4 class="text-2xl font-extrabold mb-5">
                            Rp200.000
                        </h4>

                        <button
                            class="w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition">

                            Lihat Detail

                        </button>

                    </div>

                </div>

                <!-- CARD 3 -->
                <div class="bg-white rounded-[28px] overflow-hidden shadow-soft border border-slate-100 hover:-translate-y-1 transition">

                    <img
                        src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?q=80&w=1200&auto=format&fit=crop"
                        class="h-52 w-full object-cover">

                    <div class="p-5">

                        <h3 class="font-bold text-lg mb-1">
                            Fajar Pratama
                        </h3>

                        <p class="text-sm text-slate-500 mb-2">
                            Video Editor Profesional
                        </p>

                        <p class="text-xs text-slate-400 mb-5">
                            📍 Surabaya
                        </p>

                        <p class="text-xs text-slate-400">
                            Mulai dari
                        </p>

                        <h4 class="text-2xl font-extrabold mb-5">
                            Rp250.000
                        </h4>

                        <button
                            class="w-full bg-primary text-white py-3 rounded-full text-sm font-bold hover:bg-red-700 transition">

                            Lihat Detail

                        </button>

                    </div>

                </div>

                <!-- CTA -->
                <div class="rounded-[32px] bg-gradient-to-br from-[#FFF1F2] to-[#FFE4E6] p-7 shadow-card border border-red-100 flex flex-col justify-between relative overflow-hidden">

                    <!-- DECOR -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-red-200 opacity-20 rounded-full"></div>

                    <div class="relative z-10">

                        <div class="w-16 h-16 rounded-2xl bg-primary text-white flex items-center justify-center text-3xl mb-6 shadow-lg">

                            🚀

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
                        class="relative z-10 bg-primary hover:bg-red-700 transition text-white text-center py-4 rounded-full font-bold text-sm shadow-lg">

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

</body>

</html>