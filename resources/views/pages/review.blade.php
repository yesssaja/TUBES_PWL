<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Review | LOKER SEEKER</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f4f4f4; }
        .bg-red-brand { background-color: #E74C3C; }
        .text-red-brand { color: #E74C3C; }
        .hero-gradient-bg {
          
            background-image: linear-gradient(to bottom, rgba(244, 208, 63, 0.85), rgba(244, 208, 63, 0.95)), url('{{ asset("perusahaan_1.jpg") }}');
            background-size: cover;
            background-position: center;
        }

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

        .tab-content { display: none; }
        .tab-content.active { display: block; }
        section { scroll-margin-top: 80px; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Hero Section -->
   <header class="bg-red-brand text-white p-4 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold italic tracking-wider">LOKER SEEKER</h1>
        </div>
    </header>

    <section class="hero-gradient-bg py-12">
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
            <div class="w-28 h-28 bg-white rounded-2xl shadow-xl flex items-center justify-center overflow-hidden border-4 border-white">
                <img src="{{ asset('foto_perusahaan/images.png') }}" alt="Logo" class="object-contain w-full p-2">
            </div>
            <div class="text-center md:text-left text-gray-900">
                <h2 class="text-4xl font-extrabold">SHOPEE <i class="fas fa-check-circle text-blue-500 text-2xl"></i></h2>
                <p class="text-xl font-medium opacity-80">Agribusiness, Food & Beverage Manufacturing</p>
            </div>
        </div>
    </section>
    </header>

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto -mt-12 px-4 pb-20">
        
        <!-- Statistics Summary (Tambahan agar lebih oke) -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8 grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            <div class="text-center md:border-r border-gray-100">
                <div class="text-5xl font-bold text-red-brand">4.8</div>
                <div class="flex justify-center my-2 text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-sm text-gray-500">Berdasarkan 124 Ulasan</p>
            </div>
            <div class="md:col-span-2 space-y-2">
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-12">Gaji</span>
                    <div class="flex-1 bg-gray-200 h-2 rounded-full"><div class="bg-green-500 h-2 rounded-full" style="width: 90%"></div></div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-12">Kultur</span>
                    <div class="flex-1 bg-gray-200 h-2 rounded-full"><div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div></div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-medium w-12">Fasilitas</span>
                    <div class="flex-1 bg-gray-200 h-2 rounded-full"><div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div></div>
                </div>
            </div>
        </div>

        <!-- Filter & Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Ulasan Terbaru</h2>
            <button class="bg-red-brand text-white px-5 py-2 rounded-lg font-semibold hover:bg-red-600 transition shadow-sm">
                <i class="fas fa-pen-nib mr-2"></i>Tulis Ulasan
            </button>
        </div>

        <!-- Review List -->
        <div class="space-y-6">
            
            <!-- Contoh Review 1 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex gap-4 italic">
                            <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-red-brand font-bold text-lg">
                                DI
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Dian Indriani</h4>
                                <p class="text-sm text-gray-500">UI/UX Designer • <span class="italic text-xs">14 Mei 2026</span></p>
                            </div>
                        </div>
                        <div class="flex text-yellow-400 text-sm bg-yellow-50 px-3 py-1 rounded-full">
                            <i class="fas fa-star mr-1"></i> 5.0
                        </div>
                    </div>
                    
                    <p class="text-gray-700 leading-relaxed">
                        Lingkungan kerja sangat suportif untuk junior. Teknologi yang digunakan selalu up-to-date, terutama di bagian frontend dan backend-nya. Sangat direkomendasikan untuk yang ingin berkembang!
                    </p>

                    <!-- Balasan Perusahaan (Exclusive) -->
                    <div class="mt-6 ml-4 md:ml-10 p-4 bg-gray-50 border-l-4 border-red-brand rounded-r-lg">
                        <div class="flex items-center gap-2 mb-2">
                            <i class="fas fa-reply text-gray-400"></i>
                            <span class="font-bold text-sm text-gray-800 uppercase tracking-wider">Recruitment Head Division</span>
                        </div>
                        <p class="text-sm text-gray-600">
                            Terima kasih Dian atas ulasannya! Kami senang kamu merasa nyaman berkembang bersama tim kami. Sukses selalu untuk project UI/UX-nya!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contoh Review 2 -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <div class="flex justify-between items-start mb-4">
                    <div class="flex gap-4 italic">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-lg">
                            YM
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Wilson Maryogi</h4>
                            <p class="text-sm text-gray-500">Backend Engineer • <span class="italic text-xs">10 Mei 2026</span></p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 text-sm bg-yellow-50 px-3 py-1 rounded-full">
                        <i class="fas fa-star mr-1"></i> 4.5
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Workflow-nya sangat rapi, penggunaan Laravel di sini sudah sangat advanced. Sistem kerjanya fleksibel tapi tetap target-oriented.
                </p>
                <!-- Jika belum dijawab, bagian balasan tidak muncul -->
            </div>

        </div>

    </main>

    <!-- Simple Footer -->
   <footer class="bg-gray-800 text-white py-6 mt-12 text-center text-sm">
        <p>&copy; 2026 LOKER SEEKER. Dibuat oleh Mahasiswa USU.</p>
    </footer>

</body>
</html>