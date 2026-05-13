<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Service - Looker Seeker</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind Config -->
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

<body class="bg-[#F7F1C8] text-slate-800 font-poppins">

    <!-- SECTION DETAIL -->
    <section class="max-w-7xl mx-auto px-6 py-10">

        <!-- TOP -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- LEFT CONTENT -->
            <div class="lg:col-span-2">

            <!-- GALLERY -->
            <div class="bg-white rounded-[36px] p-5 shadow-soft border border-slate-100 mb-8">

                <!-- MAIN IMAGE -->
                <div class="relative overflow-hidden rounded-[28px] mb-5">

                    <img
                        id="mainImage"
                        src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop"
                        class="w-full h-[430px] object-cover transition-all duration-300">

                    <!-- OVERLAY -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-black/5 to-transparent"></div>

                </div>

                <!-- THUMBNAILS -->
                <div class="grid grid-cols-5 gap-4">

                    <!-- ITEM -->
                    <button onclick="changeImage(this)"
                        data-image="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop"
                        class="thumbnail border-2 border-primary rounded-2xl overflow-hidden h-24">

                        <img
                            src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover">

                    </button>

                    <!-- ITEM -->
                    <button onclick="changeImage(this)"
                        data-image="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop"
                        class="thumbnail border-2 border-transparent rounded-2xl overflow-hidden h-24">

                        <img
                            src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover">

                    </button>

                    <!-- ITEM -->
                    <button onclick="changeImage(this)"
                        data-image="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?q=80&w=1200&auto=format&fit=crop"
                        class="thumbnail border-2 border-transparent rounded-2xl overflow-hidden h-24">

                        <img
                            src="https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover">

                    </button>

                    <!-- ITEM -->
                    <button onclick="changeImage(this)"
                        data-image="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1200&auto=format&fit=crop"
                        class="thumbnail border-2 border-transparent rounded-2xl overflow-hidden h-24">

                        <img
                            src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover">

                    </button>

                    <!-- ITEM -->
                    <button onclick="changeImage(this)"
                        data-image="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop"
                        class="thumbnail border-2 border-transparent rounded-2xl overflow-hidden h-24">

                        <img
                            src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1200&auto=format&fit=crop"
                            class="w-full h-full object-cover">

                    </button>

                </div>

            </div>

                <!-- PROFILE -->
                <div class="bg-white rounded-[32px] p-8 shadow-soft border border-slate-100 mb-8">

                    <div class="flex items-start justify-between flex-wrap gap-5">

                        <div>

                            <h1 class="text-4xl font-extrabold text-slate-800 mb-3">

                                Billie Eilish

                            </h1>

                            <p class="text-lg text-slate-500 mb-4">

                                Fotografer Event & Wisuda

                            </p>

                            <div class="flex items-center gap-2 text-sm text-slate-500">

                                <!-- ICON LOCATION -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 text-primary"
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

                                Bandung

                            </div>

                        </div>

                        <!-- PRICE -->
                        <div class="bg-[#FFF5F5] border border-red-100 rounded-3xl px-7 py-5 min-w-[220px]">

                            <p class="text-sm text-slate-400 mb-2">

                                Mulai dari

                            </p>

                            <h2 class="text-4xl font-extrabold text-primary">

                                Rp350K

                            </h2>

                        </div>

                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div class="bg-white rounded-[32px] p-8 shadow-soft border border-slate-100 mb-8">

                    <h2 class="text-2xl font-bold mb-5 text-slate-800">

                        Deskripsi Jasa

                    </h2>

                    <p class="text-slate-500 leading-relaxed text-[15px]">

                        Lagi cari fotografer buat momen wisuda atau event seru kamu? 
                        Tenang, kami siap bantu! 
                        Mulai dari pose formal bareng keluarga di hari kelulusan 
                        sampai momen candid seru bareng teman-teman di acara pilihanmu, 
                        semua bakal terekam sempurna.

                        <br><br>

                        <span class="font-semibold text-slate-700">
                            Kenapa pilih kami?
                        </span>

                        <br><br>

                        ✅ Hasil foto jernih & berkualitas tinggi.
                        <br>

                        ✅ Fotografer ramah & jago kasih arahan gaya 
                        (nggak perlu bingung mati gaya!).
                        <br>

                        ✅ Proses editing cepat & estetik.
                        <br>

                        ✅ Harga paket bersahabat untuk mahasiswa.

                    </p>

                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div>

                <div class="bg-white rounded-[32px] p-7 shadow-soft border border-slate-100 sticky top-8">

                    <!-- PROFILE MINI -->
                    <div class="flex items-center gap-4 mb-6">

                       

                        <div>

                            <h3 class="font-bold text-lg">

                                Billie Eilish

                            </h3>

                            <p class="text-sm text-slate-500">

                                Freelancer Aktif

                            </p>

                        </div>

                    </div>

                    <!-- STATS -->
                    <div class="space-y-4 mb-8">

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Pengalaman
                            </span>

                            <span class="font-semibold text-slate-700">
                                4 tahun
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Bahasa yang Dikuasai
                            </span>

                            <span class="font-semibold text-slate-700">
                                Indonesia, Inggris
                            </span>

                        </div>

                        <div class="flex justify-between text-sm">

                            <span class="text-slate-400">
                                Skill Utama
                            </span>

                            <span class="font-semibold text-slate-700">
                                Fotografi, Editing
                            </span>

                        </div>

                    </div>

                    <!-- BUTTON -->
                    <button
                        class="w-full bg-primary hover:bg-red-700 transition-all duration-300 text-white py-4 rounded-2xl font-bold text-sm shadow-lg flex items-center justify-center gap-3 hover:-translate-y-1">

                        <!-- ICON PHONE -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.129a11.042 11.042 0 005.516 5.516l1.129-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />

                        </svg>

                        Hubungi Freelancer

                    </button>

                </div>

            </div>

        </div>

    </section>


<script>

    function changeImage(element) {

        const mainImage = document.getElementById('mainImage');

        mainImage.src = element.dataset.image;

        document.querySelectorAll('.thumbnail').forEach(item => {

            item.classList.remove('border-primary');

            item.classList.add('border-transparent');

        });

        element.classList.remove('border-transparent');

        element.classList.add('border-primary');

    }

</script>
</body>

</html>