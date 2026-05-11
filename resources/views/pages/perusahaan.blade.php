<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile | LOKER SEEKER</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        .bg-red-brand { background-color: #E74C3C; }
        .text-red-brand { color: #E74C3C; }
        
        /* Hero dengan Background Gambar Gradient */
        .hero-gradient-bg {
            /* Ganti 'perusahaan_1.jpg' dengan path gambar gedung shopee tadi kalau sudah ada di public */
            background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.85), rgba(244, 208, 63, 0.95)), url('{{ asset("perusahaan_1.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        /* Navigasi Tab Tengah & Renggang */
        .nav-tabs-container {
            display: flex;
            justify-content: center;
            gap: 3rem; 
        }

        .nav-tab {
            padding: 1rem 0;
            color: #6b7280;
            font-weight: 600;
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        /* Garis bawah indikator aktif */
        .nav-tab::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        .nav-tab.active { color: #E74C3C; }
        .nav-tab.active::after { background-color: #E74C3C; }

        /* Sembunyikan section secara default */
        .tab-content { display: none; }
        .tab-content.active { display: block; }
    </style>
</head>
<body>

    <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold italic tracking-wider">LOKER SEEKER</h1>
            <nav class="hidden md:flex space-x-6 font-medium">
                <a href="#" class="hover:text-yellow-300">Home</a>
                <a href="#" class="hover:text-yellow-300">About</a>
                <a href="#" class="hover:text-yellow-300">Schedule</a>
                <a href="#" class="hover:text-yellow-300">Gallery</a>
            </nav>
        </div>
    </header>

    <section class="hero-gradient-bg py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <div class="w-32 h-32 bg-white rounded-2xl shadow-xl flex items-center justify-center overflow-hidden border-4 border-white">
                <img src="{{ asset('foto_perusahaan/images.png') }}" alt="Logo" class="object-contain w-full p-2">
            </div>
            <div class="text-center md:text-left text-gray-900">
                <h2 class="text-4xl font-extrabold">SHOPEE <i class="fas fa-check-circle text-blue-500 text-2xl"></i></h2>
                <p class="text-xl font-medium opacity-80">Agribusiness, Food & Beverage Manufacturing</p>
                <div class="flex gap-3 mt-6 justify-center md:justify-start">
                    <button class="bg-red-brand text-white px-8 py-2 rounded-full font-bold shadow-lg hover:scale-105 transition">+ Follow</button>
                    <button class="bg-white px-8 py-2 rounded-full font-bold shadow-lg hover:bg-gray-100 transition border">Visit Website <i class="fas fa-external-link-alt ml-2 text-sm"></i></button>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-white shadow-md sticky top-[72px] z-40 border-b">
        <div class="container mx-auto px-4">
            <div class="nav-tabs-container">
                <div class="nav-tab active" onclick="openTab(event, 'about') text-lg">About</div>
                <div class="nav-tab" onclick="openTab(event, 'events') text-lg">Events</div>
                <div class="nav-tab" onclick="openTab(event, 'course') text-lg">Course</div>
                <div class="nav-tab" onclick="openTab(event, 'jobs') text-lg">Jobs</div>
            </div>
        </div>
    </div>

    <main class="container mx-auto px-4 py-12 max-w-5xl">

       <section id="about" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-brand inline-block">About Company</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                    <p class="text-gray-600 leading-relaxed mb-4">
                        Di Sinar Mas Agribusiness and Food, kami bertumbuh dengan tujuan. Minyak kelapa sawit menjadi awal dari perjalanan kami. Saat ini, kami menjadi salah satu perusahaan agribisnis berbasis kelapa sawit yang terintegrasi secara vertikal di dunia.
                    </p>
                    <p class="text-gray-600 leading-relaxed">
                        Kami mengelola seluruh rantai pasokan, mulai dari pembibitan hingga pengolahan menjadi produk konsumen yang berkualitas tinggi.
                    </p>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-100">
                    <table class="w-full text-sm">
                        <tr class="border-b border-gray-200"><td class="py-3 font-bold text-red-brand w-1/3">Website</td><td><a href="#" class="text-blue-600">www.smart-tbk.com</a></td></tr>
                        <tr class="border-b border-gray-200"><td class="py-3 font-bold text-red-brand">Phone</td><td>021-50338899</td></tr>
                        <tr class="border-b border-gray-200"><td class="py-3 font-bold text-red-brand">Headquarters</td><td>Jakarta Pusat, DKI Jakarta</td></tr>
                        <tr class="border-b border-gray-200"><td class="py-3 font-bold text-red-brand">Founded</td><td>1962</td></tr>
                        <tr><td class="py-3 font-bold text-red-brand">Industry</td><td>Agribusiness & Food</td></tr>
                    </table>
                </div>
            </div>
        </section>

        <section id="events">
            <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-brand inline-block">Company Events</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:scale-105 transition-transform">
                    <img src="https://via.placeholder.com/400x200" alt="Event" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h4 class="font-bold text-lg mb-2">Seminar Karir USU 2026</h4>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Tips dan trik sukses masuk ke dunia kerja agribisnis global.</p>
                        <button class="text-red-brand font-bold text-sm hover:underline">See More →</button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:scale-105 transition-transform">
                    <img src="https://via.placeholder.com/400x200" alt="Event" class="h-40 w-full object-cover">
                    <div class="p-5">
                        <h4 class="font-bold text-lg mb-2">JOB FAIR</h4>
                        <p class="text-sm text-gray-500 mb-4 line-clamp-2">Tips dan trik sukses masuk ke dunia kerja agribisnis global.</p>
                        <button class="text-red-brand font-bold text-sm hover:underline">See More →</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="course">
            <h3 class="text-2xl font-bold mb-6 border-b-4 border-yellow-brand inline-block">Professional Course</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl overflow-hidden shadow-md border border-gray-100 hover:scale-105 transition-transform flex p-4 gap-4 items-center">
                    <div class="w-20 h-20 bg-yellow-brand rounded-lg flex-shrink-0 flex items-center justify-center text-3xl">🎓</div>
                    <div>
                        <h4 class="font-bold text-md leading-tight">Mechanical Fundamentals</h4>
                        <p class="text-xs text-gray-500 mt-1">3 Minggu Pelatihan</p>
                        <button class="text-red-brand font-bold text-xs mt-2 hover:underline">Enroll Now</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="jobs">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold border-b-4 border-yellow-brand inline-block">Open Positions</h3>
                <span class="text-sm text-gray-500">12 Lowongan Aktif</span>
            </div>
            <div class="space-y-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-brand transition">
                    <div>
                        <h4 class="font-bold text-lg">Maintenance Manager</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                    </div>
    <button class="bg-gray-100 hover:bg-yellow-brand px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</button>
                </div>
            </div>
            <div class="space-y-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-brand transition">
                    <div>
                        <h4 class="font-bold text-lg">Maintenance Manager</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                    </div>
           <button class="bg-gray-100 hover:bg-yellow-brand px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</button>
                </div>
            </div>
            <div class="space-y-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center hover:border-red-brand transition">
                    <div>
                        <h4 class="font-bold text-lg">Maintenance Manager</h4>
                        <p class="text-sm text-gray-500">Medan, Indonesia • Full-time</p>
                    </div>
                    <button class="bg-gray-100 hover:bg-yellow-brand px-6 py-2 rounded-lg font-bold hover:scale-105 transition-transform">Detail</button>
                </div>
            </div>
        </section>
    </main>

    <script>
        function openTab(evt, tabName) {
            // 1. Ambil semua elemen dengan class "tab-content" dan sembunyikan
            var contents = document.getElementsByClassName("tab-content");
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = "none";
            }

            // 2. Ambil semua elemen dengan class "nav-tab" dan hapus class "active"
            var tabs = document.getElementsByClassName("nav-tab");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].className = tabs[i].className.replace(" active", "");
            }

            // 3. Tampilkan section yang dipilih dan tambahkan class "active" ke tab yang diklik
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

</body>
</html>