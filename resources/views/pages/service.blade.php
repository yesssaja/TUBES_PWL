<!-- resources/views/pages/service.blade.php -->

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

        <!-- HERO -->
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

                        📸

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

                        🎨

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

                        🎬

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

                        🎵

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

                        🎤

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

                            ➕

                        </div>

                        <h3 class="font-bold text-sm mb-1">
                            Lihat Semua
                        </h3>

                        <p class="text-xs text-slate-400">
                            Kategori
                        </p>

                    </div>
                        

                </a>
Lihat
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

                <!-- CARD 4 -->                <!-- CTA -->
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
        <section class="bg-[#FFFDF3] rounded-[32px] p-8 shadow-soft border border-slate-100">

            <div class="grid md:grid-cols-3 gap-8">

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl shrink-0">

                        🔒

                    </div>

                    <div>

                        <h3 class="font-bold text-lg mb-2">

                            Aman & Terpercaya

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Pembayaran aman dengan sistem escrow
                            untuk melindungi transaksi pengguna.

                        </p>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl shrink-0">

                        👨‍💼

                    </div>

                    <div>

                        <h3 class="font-bold text-lg mb-2">

                            Freelancer Profesional

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Semua freelancer telah diverifikasi
                            agar kualitas jasa lebih terpercaya.

                        </p>

                    </div>

                </div>

                <!-- ITEM -->
                <div class="flex gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl shrink-0">

                        ⚡

                    </div>

                    <div>

                        <h3 class="font-bold text-lg mb-2">

                            Cepat & Praktis

                        </h3>

                        <p class="text-sm text-slate-500 leading-relaxed">

                            Temukan jasa sesuai kebutuhanmu
                            dengan cepat dan mudah.

                        </p>

                    </div>

                </div>

            </div>

        </section>

    </div>

</body>

</html>